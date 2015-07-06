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

<!--
* https://github.com/caffeinated/presenter
```
composer require caffeinated/presenters=~2.0
```
 -->

*
