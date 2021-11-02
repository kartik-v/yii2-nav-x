<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2021
 * @package yii2-nav-x
 * @version 1.2.5
 */

namespace kartik\nav;

use kartik\base\Widget;
use yii\base\InvalidConfigException;

/**
 * An extended nav menu for Bootstrap 3.x, 4.x, and 5.x that offers submenu drilldown.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class NavX extends Widget
{
    /**
     * @var array list of items in the nav widget. Each array element represents a single
     * menu item which can be either a string or an array with the following structure:
     *
     * - label: string, required, the nav item label.
     * - url: optional, the item's URL. Defaults to "#".
     * - visible: bool, optional, whether this menu item is visible. Defaults to true.
     * - linkOptions: array, optional, the HTML attributes of the item's link.
     * - options: array, optional, the HTML attributes of the item container (LI).
     * - active: bool, optional, whether the item should be on active state or not.
     * - dropDownOptions: array, optional, the HTML options that will passed to the [[Dropdown]] widget.
     * - items: array|string, optional, the configuration array for creating a [[Dropdown]] widget,
     *   or a string representing the dropdown menu. Note that Bootstrap does not support sub-dropdown menus.
     * - encode: bool, optional, whether the label will be HTML-encoded. If set, supersedes the $encodeLabels option for only this item.
     *
     * If a menu item is a string, it will be rendered directly without HTML encoding.
     */
    public $items = [];

    /**
     * @var bool whether the nav items labels should be HTML-encoded.
     */
    public $encodeLabels = true;

    /**
     * @var bool whether to automatically activate items according to whether their route setting
     * matches the currently requested route.
     * @see isItemActive
     */
    public $activateItems = true;

    /**
     * @var bool whether to activate parent menu items when one of the corresponding child menu items is active.
     */
    public $activateParents = false;

    /**
     * @var string the route used to determine if a menu item is active or not.
     * If not set, it will use the route of the current request.
     * @see params
     * @see isItemActive
     */
    public $route;

    /**
     * @var array the parameters used to determine if a menu item is active or not.
     * If not set, it will use `$_GET`.
     * @see route
     * @see isItemActive
     */
    public $params;

    /**
     * @var string name of a class to use for rendering dropdowns within this widget. Defaults to [[Dropdown]].
     */
    public $dropdownClass;

    /**
     * @var array the dropdown widget options
     */
    public $dropdownOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $opts = [
            'items' => $this->items,
            'encodeLabels' => $this->encodeLabels,
            'activateItems' => $this->activateItems,
            'activateParents' => $this->activateParents,
            'dropdownOptions' => $this->dropdownOptions,
            'options' => $this->options,
            'clientOptions' => $this->pluginOptions,
        ];
        $props = ['route', 'params', 'dropdownClass'];
        foreach ($props as $prop) {
            if (isset($this->$prop)) {
                $opts[$prop] = $this->$prop;
            }
        }
        /**
         * @var Widget $widget
         */
        $ver = $this->getBsVer();
        $widget = '\\'.__NAMESPACE__.'\\NavXBs'.$ver;
        if (!class_exists($widget)) {
            throw new InvalidConfigException("The NavX widget has not been implemented for Bootstrap {$ver}.x release.");
        }
        echo $widget::widget($opts);
    }
}
