# admin

composer.json

```
"require": {

...

"media101/admin": "@dev",
"lavary/laravel-menu": "dev-master"
}

...
 
"repositories": [
	{
	    "type": "vcs",
	    "url": "https://github.com/eugene-holiday/admin"
	}
],
```

```

composer update 

```

config/app.php

```php
<?php

'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
	
	...
        
        Lavary\Menu\ServiceProvider::class,
        Media101\Admin\Providers\BootstrapServiceProvider::class,
       
        
        ...

],

'aliases' => [

	...
	
        'Menu'      => 'Lavary\Menu\Facade',
        'Admin'     => \Media101\Admin\Admin::class,
        
	...
];

?>

```


```

php artisan vendor:publish

```


