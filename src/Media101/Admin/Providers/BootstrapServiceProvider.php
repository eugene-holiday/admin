<?php namespace Media101\Admin\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Route;
use Illuminate\Foundation\Http\Kernel;
use Media101\Admin\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class BootstrapServiceprovider extends ServiceProvider{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot(Kernel $kernel)
    {

        app()->bind('Admin', function()
        {
            return new Admin();
        });

        $kernel->pushMiddleware('Media101\Admin\Http\Middleware\MenuMiddleware');

        $this->loadViewsFrom( __DIR__. '/../../../views', 'admin');

        $this->setupRoutes($this->app->router);
//
        $this->publishes([
            __DIR__.'/../../../config/admin.php' => config_path('admin.php'),
            __DIR__.'/../../../views/' => base_path('resources/views/admin/'),
            __DIR__.'/../../../config/menu.php' => base_path('App/Admin/'),
            __DIR__.'/../../../config/entities.php/' => base_path('App/Admin/'),
        ]);

        $this->publishes([
            dirname(__FILE__) . '/../../../../public/' => public_path('packages/media101/admin/'),
        ], 'assets');

//        AliasLoader::getInstance()->alias('Menu', 'Lavary\Menu\Facade');


    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        require app_path() . '\Admin\entities.php';
        if(Admin::$entities) {
            $router->pattern('entity', implode('|', Admin::entitiesAliases()));
            $router->bind('entity', function ($entity) {
                $class = array_search($entity, Admin::entitiesAliases());
                if ($class === false) {
                    throw new ModelNotFoundException;
                }
                return Admin::entity($class);
            });
        }


        $router->group([
            'namespace' => 'Media101\Admin\Http\Controllers',
            'prefix' => config('admin.prefix')
        ], function()
        {
            require __DIR__ . '/../Http/routes.php';
        });
    }


    public function register()
    {

        $this->registerMiddleware();
//        $this->registerContact();
//        config([
//            'config/contact.php',
//        ]);
        //$this->app->register('Lavary\Menu\ServiceProvider');
    }

    private function registerContact()
    {
//        $this->app->bind('contact',function($app){
//            return new Contact($app);
//        });
    }



    protected function registerMiddleware()
    {
        Route::middleware('admin.auth', 'Media101\Admin\Http\Middleware\Authenticate');
        Route::middleware('admin.menu', 'Media101\Admin\Http\Middleware\MenuMiddleware');
    }
}