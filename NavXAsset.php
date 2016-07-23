<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @package yii2-nav-x
 * @version 1.2.1
 */

namespace kartik\nav;
use kartik\base\AssetBundle;

/**
 * Asset bundle for NavX widget. 
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class NavXAsset extends AssetBundle
{
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/nav-x']);
        parent::init();
    }
}
