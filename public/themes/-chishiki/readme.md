# Chishiki : Laravel 5.1.x


## Status / Version

Beta Development


## Description

Chishiki is a module that provides basic and overall functionality to the Rakko platform system.
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
php artisan module:migrate Chishiki
php artisan module:seed Chishiki
```


### publish commands

General Publish "ALL" method
```
php artisan vendor:publish --provider="App\Modules\Chishiki\Providers\ChishikiServiceProvider"
```

Specific Publish tags
```
php artisan vendor:publish --provider="App\Modules\Chishiki\Providers\ChishikiServiceProvider" --tag="configs"
php artisan vendor:publish --provider="App\Modules\Chishiki\Providers\ChishikiServiceProvider" --tag="images"
php artisan vendor:publish --provider="App\Modules\Chishiki\Providers\ChishikiServiceProvider" --tag="views"
```


## Packages

Intended to be used with:
https://github.com/illuminate3/rakkoII

The Following are packages that are specific to this module:

* https://github.com/etrepat/baum
* https://github.com/vespakoen/menu


## Screen Shots
## Thanks
