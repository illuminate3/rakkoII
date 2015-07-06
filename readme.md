# Rakko II : Laravel 5.1.x Beta Development

## Packages

* https://github.com/illuminate3/kotoba
```
"illuminate3/kotoba": "dev-master",
Illuminate3\Kotoba\KotobaServiceProvider::class,
```

* https://github.com/caffeinated/flash
```
composer require caffeinated/flash=~2.0
Caffeinated\Flash\FlashServiceProvider::class,
'Flash' => Caffeinated\Flash\Facades\Flash::class,
```

```
vendor:publish --provider="Caffeinated\Flash\FlashServiceProvider"
```

* https://github.com/caffeinated/modules
```
composer require caffeinated/modules=~2.0
Caffeinated\Modules\ModulesServiceProvider::class,
Module' => Caffeinated\Modules\Facades\Module::class,
```

```
vendor:publish --provider="Caffeinated\Modules\ModulesServiceProvider"
```

* https://github.com/caffeinated/plugins
```
composer require caffeinated/plugins=~2.0
Caffeinated\Plugins\PluginsServiceProvider::class,
'Plugin' => Caffeinated\Plugins\Facades\Plugin::class,
```

* https://github.com/caffeinated/themes
```
composer require caffeinated/themes=~2.0
Caffeinated\Themes\ThemesServiceProvider::class,
'Theme' => Caffeinated\Themes\Facades\Theme::class,
```

```
vendor:publish --provider="Caffeinated\Themes\ThemesServiceProvider"
```

<!--
* https://github.com/caffeinated/presenter
```
composer require caffeinated/presenters=~2.0
```
 -->

* http://laravelcollective.com/docs/5.1/html
```
"laravelcollective/html": "5.1.*"
Collective\Html\HtmlServiceProvider::class,
'Form' => Collective\Html\FormFacade::class,
'Html' => Collective\Html\HtmlFacade::class,
```

* https://github.com/wikimedia/composer-merge-plugin
```
composer require wikimedia/composer-merge-plugin
```

* https://github.com/LaravelRUS/localized-carbon
```
"laravelrus/localized-carbon": "dev-master"
<!--
'Laravelrus\LocalizedCarbon\LocalizedCarbonServiceProvider',
'LocalizedCarbon'   => 'Laravelrus\LocalizedCarbon\LocalizedCarbon',
'DiffFormatter'     => 'Laravelrus\LocalizedCarbon\DiffFactoryFacade',
 -->
```

* https://github.com/Intervention/image
```
composer require intervention/image
vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"
```

* https://github.com/Intervention/imagecache
```
composer require intervention/imagecache
'Intervention\Image\ImageServiceProvider'
'Image' => 'Intervention\Image\Facades\Image'
```

* https://github.com/vinkla/translator
```
'Vinkla\Translator\TranslatorServiceProvider'
vendor:publish --provider="Vinkla\Translator\TranslatorServiceProvider"
```


* https://github.com/yajra/laravel-datatables
```
composer require yajra/laravel-datatables-oracle:~5.0
yajra\Datatables\DatatablesServiceProvider
'Datatables' => yajra\Datatables\Datatables::class,
vendor:publish --provider="yajra\Datatables\DatatablesServiceProvider"
```

*

*

*
