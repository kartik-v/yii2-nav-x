<h1 align="center">
    <a href="http://demos.krajee.com" title="Krajee Demos" target="_blank">
        <img src="http://kartik-v.github.io/bootstrap-fileinput-samples/samples/krajee-logo-b.png" alt="Krajee Logo"/>
    </a>
    <br>
    yii2-nav-x
    <hr>
    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DTP3NZQ6G2AYU"
       title="Donate via Paypal" target="_blank">
        <img src="http://kartik-v.github.io/bootstrap-fileinput-samples/samples/donate.png" alt="Donate"/>
    </a>
</h1>

[![Stable Version](https://poser.pugx.org/kartik-v/yii2-nav-x/v/stable)](https://packagist.org/packages/kartik-v/yii2-nav-x)
[![Unstable Version](https://poser.pugx.org/kartik-v/yii2-nav-x/v/unstable)](https://packagist.org/packages/kartik-v/yii2-nav-x)
[![License](https://poser.pugx.org/kartik-v/yii2-nav-x/license)](https://packagist.org/packages/kartik-v/yii2-nav-x)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-nav-x/downloads)](https://packagist.org/packages/kartik-v/yii2-nav-x)
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-nav-x/d/monthly)](https://packagist.org/packages/kartik-v/yii2-nav-x)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-nav-x/d/daily)](https://packagist.org/packages/kartik-v/yii2-nav-x)

An extended bootstrap Nav widget for Yii Framework 2 with submenu drilldown. This widget extends the `\yii\bootstrap\Nav` widget for Bootstrap 3.x and 
`\yii\bootstrap4\Nav` widget for Bootstrap 4.x with some additional controls and adding the CSS Styles for enabling a submenu drilldown. The dropdown menu style 
is optimized for both desktop and mobile devices. The drilldown is triggered on `active` instead of `hover` so that it works equally well on mobile devices. The
extension uses the one of the following Dropdown Class extensions by default for rendering dropdown navigation, but this can be overridden:

- `\kartik\dropdown\DropdownX`  for Bootstrap 3.x
- `\kartik\bs4dropdown\Dropdown`  for Bootstrap 4.x

### Demo
You can see detailed [documentation](http://demos.krajee.com/nav-x) on usage of the extension.

## Installation

Install the dependencies depending on the Bootstrap version used in your app:

1. For Bootstrap 3.x install `kartik-v/yii2-dropdown-x`

```
$ php composer.phar require kartik-v/yii2-dropdown-x "@dev"
```

2. For Bootstrap 4.x install `kartik-v/yii2-bootstrap4-dropdown`
```
$ php composer.phar require kartik-v/yii2-bootstrap4-dropdown "@dev"
```

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> NOTE: Check the [composer.json](https://github.com/kartik-v/yii2-nav-x/blob/master/composer.json) for this extension's requirements and dependencies. Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require kartik-v/yii2-nav-x "@dev"
```

or add

```
"kartik-v/yii2-nav-x": "@dev"
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

**yii2-nav-x** is released under the BSD-3-Clause License. See the bundled `LICENSE.md` for details.