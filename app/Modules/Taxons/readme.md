# Core : Laravel 5.1.x


## Status / Version

Beta Development


## Description

Core is a module that provides basic and overall functionality to the Rakko platform system.
The code in this module could be placed directly within the Rakko main package but makes more sense to be put into a consolidated package.


## Functionality


### Locales
Supplements the main Rakko app's locale functionality.
Ability to control Locales through the database.


### Settings
Settings allow you to set key/values to the database or to a .json file


## Routes

* /admin/locales
* /admin/settings


## Install

### migration commands

```
php artisan module:migrate Core
php artisan module:seed Core
```


### publish commands

General Publish "ALL" method
```
php artisan vendor:publish --provider="App\Modules\Core\Providers\CoreServiceProvider"
```

Specific Publish tags
```
php artisan vendor:publish --provider="App\Modules\Core\Providers\CoreServiceProvider" --tag="configs"
php artisan vendor:publish --provider="App\Modules\Core\Providers\CoreServiceProvider" --tag="images"
php artisan vendor:publish --provider="App\Modules\Core\Providers\CoreServiceProvider" --tag="views"
```


## Packages

Intended to be used with:
https://github.com/illuminate3/rakkoII

The Following are packages that are specific to this module:

* https://github.com/anlutro/laravel-settings


## Screen Shots
## Thanks

I used the config file for the seeds.
* https://github.com/mcamara/laravel-localization/blob/master/src/config/config.php

Originally, I intended to use the mcamara/laravel-localization package but ended up with going with my own solution.
