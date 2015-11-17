<?php namespace	OneHundredAndOneMedia\Admin\Providers;

/**
 *
 * @author kora jai <kora.jayaram@gmail>
 */

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Route;
use Illuminate\Foundation\Http\Kernel;

class BootstrapServiceprovider extends ServiceProvider{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot(Kernel $kernel)
    {

        $kernel->pushMiddleware('OneHundredAndOneMedia\Admin\Http\Middleware\MenuMiddleware');

        $this->loadViewsFrom( __DIR__. '/../../../views', 'admin');

        $this->setupRoutes($this->app->router);
//
        $this->publishes([
            __DIR__.'/../../../config/admin.php' => config_path('admin.php'),
            __DIR__.'/../../../views/' => base_path('resources/views/admin/'),
        ]);

        $this->publishes([
            dirname(__FILE__) . '/../../../../public/' => public_path('packages/one-hundred-and-one-media/admin/'),
        ], 'assets');

        AliasLoader::getInstance()->alias('Menu', 'Lavary\Menu\Facade');


    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group([
            'namespace' => 'OneHundredAndOneMedia\Admin\Http\Controllers',
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
        $this->app->register('Lavary\Menu\ServiceProvider');
    }

    private function registerContact()
    {
//        $this->app->bind('contact',function($app){
//            return new Contact($app);
//        });
    }



    protected function registerMiddleware()
    {
        Route::middleware('admin.auth', 'OneHundredAndOneMedia\Admin\Http\Middleware\Authenticate');
        Route::middleware('admin.menu', 'OneHundredAndOneMedia\Admin\Http\Middleware\MenuMiddleware');
    }
}