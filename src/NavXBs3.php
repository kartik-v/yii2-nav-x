<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-nav-x
 * @version 1.2.4
 */

namespace kartik\nav;

use yii\base\InvalidConfigException;
use yii\bootstrap\Nav;

/**
 * An extended nav menu for Bootstrap 3.x and 4.x - that offers submenu drilldown
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class NavXBs3 extends Nav
{
    use NavXTrait;
    /**
     * @var string the class name to render the Dropdown items. Defaults to `\kartik\dropdown\DropdownX`.
     */
    public $dropdownClass = 'kartik\dropdown\DropdownX';

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        $this->checkDependency();
        parent::init();
    }
}
