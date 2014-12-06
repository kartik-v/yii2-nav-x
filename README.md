yii2-nav-x
==========

An extended bootstrap Nav widget for Yii Framework 2 with submenu drilldown. This widget extends the `\yii\bootstrap\Nav` widget
with some additional controls and adding the CSS Styles for enabling a submenu drilldown. The dropdown menu style is optimized for both 
desktop and mobile devices. The drilldown is triggered on `active` instead of `hover` so that it works equally well on mobile devices. The
extension uses the `\kartik\dropdown\DropdownX` extension by default for rendering dropdown navigation, but this can be overridden.

### Demo
You can see detailed [documentation](http://demos.krajee.com/nav-x) on usage of the extension.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> NOTE: Check the [composer.json](https://github.com/kartik-v/yii2-nav-x/blob/master/composer.json) for this extension's requirements and dependencies. Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require kartik-v/yii2-nav-x "dev-master"
```

or add

```
"kartik-v/yii2-nav-x": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

### NavX

```php
use kartik\nav\NavX;
echo NavX::widget([
    'options' => ['class' => 'nav nav-pills'],
    'items' => [
        ['label' => 'Action', 'url' => '#'],
        ['label' => 'Submenu', 'items' => [
            ['label' => 'Action', 'url' => '#'],
            ['label' => 'Another action', 'url' => '#'],
            ['label' => 'Something else here', 'url' => '#'],
        ]],
        ['label' => 'Something else here', 'url' => '#'],
        '<li class="divider"></li>',
        ['label' => 'Separated link', 'url' => '#'],
    ],
    'encodeLabels' => false
]);
```

## License

**yii2-nav-x** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.