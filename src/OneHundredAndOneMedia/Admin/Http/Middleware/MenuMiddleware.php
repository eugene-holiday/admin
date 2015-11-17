<?php

namespace OneHundredAndOneMedia\Admin\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class MenuMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        \Menu::make('Sidebar', function($menu){
            $menu->group(array('prefix' => config('admin.prefix')), function($m){
                $m->raw('<span>Настройки</span>', ['class' => 'header']);
                $m->add('<span>Пользователи</span>', 'users')->prepend('<i class="fa fa-link"></i>');
                $m->add('<span>Роли</span>', 'roles')->prepend('<i class="fa fa-users"></i>');
                $m->add('<span>Документооборот</span>',  'workflow')->prepend('<i class="fa fa-random"></i>');
                $m->add('<span>Права доступа</span>',  'access')->prepend('<i class="fa fa-wrench"></i>');
                $m->add('<span>Настройки</span>',  'settings')->prepend('<i class="fa fa-gears"></i>');
                $m->add('<span>Внешний вид</span>',  'themes')->prepend('<i class="fa fa-flag"></i>');
            });
        });

        return $next($request);
    }
}
