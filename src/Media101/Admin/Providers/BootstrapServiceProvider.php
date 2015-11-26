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

        //$kernel->pushMiddleware('Media101\Admin\Http\Middleware\MenuMiddleware');  не хотим меню на каждый реквест

        //хотим только когда сайдбар рендерится
        $this->app['view']->composer('admin::admin.partials.sidebar',function($view){
            \Menu::make('Sidebar', function($menu){
                $menu->group(array('prefix' => config('admin.prefix')), function($m){
                    if (file_exists(app_path('Admin/menu.php'))) {
                        require app_path() . '/Admin/menu.php';
                    }
                    $m->raw('<span>Настройки</span>', ['class' => 'header']);
                    $m->add('<span>Пользователи</span>', 'users')->prepend('<i class="fa fa-link"></i>');
//                $m->add('<span>Роли</span>', 'roles')->prepend('<i class="fa fa-users"></i>');
//                $m->add('<span>Документооборот</span>',  'workflow')->prepend('<i class="fa fa-random"></i>');
//                $m->add('<span>Права доступа</span>',  'access')->prepend('<i class="fa fa-wrench"></i>');
//                $m->add('<span>Настройки</span>',  'settings')->prepend('<i class="fa fa-gears"></i>');
//                $m->add('<span>Внешний вид</span>',  'themes')->prepend('<i class="fa fa-flag"></i>');
                });
            });
        });

        $this->loadViewsFrom( __DIR__. '/../../../views', 'admin');

        $this->publishes([
            __DIR__.'/../../../config/admin.php' => config_path('admin.php'),
           // __DIR__.'/../../../views/' => base_path('resources/views/admin/'),
            __DIR__.'/../../../config/menu.php' => app_path('Admin/menu.php'),
            __DIR__.'/../../../config/entities.php' => app_path('Admin/entities.php'),
            __DIR__.'/../../../config/User.php' => app_path('Admin/User.php'),
        ]);

        $this->publishes([
            dirname(__FILE__) . '/../../../../public/' => public_path('packages/media101/admin/'),
        ], 'assets');

        $this->setupRoutes($this->app->router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        if (file_exists(app_path() . '\Admin\entities.php')) {
            require app_path() . '\Admin\entities.php';
        }
        if(Admin::$entities) {
            $router->pattern('modelId', '[0-9]+');
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
            'prefix' => config('admin.prefix')
        ], function() use ($router)
        {
            $router->group([
                'middleware' => config('admin.middleware'),
            ], function () {
                if (file_exists(base_path('App/Admin/') . 'routes.php')) {
                    require base_path('App/Admin/') . 'routes.php';
                }
            });

        });

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
    }

    protected function registerMiddleware()
    {
        Route::middleware('admin.auth', 'Media101\Admin\Http\Middleware\Authenticate');
        Route::middleware('admin.menu', 'Media101\Admin\Http\Middleware\MenuMiddleware');
    }
}