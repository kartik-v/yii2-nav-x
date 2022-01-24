<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @package yii2-nav-x
 * @version 1.2.6
 */

namespace kartik\nav;

use Exception;
use kartik\bs4dropdown\Dropdown;
use yii\base\InvalidConfigException;
use yii\bootstrap4\Nav;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * An extended nav menu for Bootstrap 4.x that offers submenu drilldown.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class NavXBs4 extends Nav
{
    use NavXTrait;

    /**
     * @var string the class name to render the Dropdown items. Defaults to `kartik\bs4dropdown\Dropdown`.
     */
    public $dropdownClass = 'kartik\bs4dropdown\Dropdown';

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        $this->checkDependency();
        parent::init();
    }

    /**
     * Renders the given items as a dropdown. This method is called to create sub-menus.
     * @param  array  $items  the given items. Please refer to `items` property in the `Dropdown` widget (as set in [[dropdownClass]]) for the array structure.
     * @param  array  $parentItem  the parent item information. Please refer to [[items]] for the structure of this array.
     * @return string the rendering result.
     * @throws Exception
     */
    protected function renderDropdown($items, $parentItem)
    {
        /** @var Dropdown $dropdownClass */
        $dropdownClass = $this->dropdownClass;
        $ddOptions = array_replace_recursive($this->dropdownOptions, [
            'options' => ArrayHelper::getValue($parentItem, 'dropDownOptions', []),
            'items' => $items,
            'encodeLabels' => $this->encodeLabels,
            'clientOptions' => false,
            'view' => $this->getView(),
        ]);

        return $dropdownClass::widget($ddOptions);
    }

    /**
     * Check to see if a child item is active optionally activating the parent.
     * @param  array  $items  the items configuration similar to [[items]]
     * @param  bool  $active  should the parent be active too
     * @return array
     * @see items
     */
    protected function isChildActive($items, &$active)
    {
        foreach ($items as $i => $child) {
            if (ArrayHelper::remove($items[$i], 'active', false) || $this->isItemActive($child)) {
                Html::addCssClass($items[$i]['linkOptions'], 'active');
                if ($this->activateParents) {
                    $active = true;
                }
            }
            if (isset($items[$i]['items']) && is_array($items[$i]['items'])) {
                $childActive = false;
                $items[$i]['items'] = $this->isChildActive($items[$i]['items'], $childActive);
                if ($childActive) {
                    Html::addCssClass($items[$i]['linkOptions'], 'active');
                    $active = true;
                }
            }
        }

        return $items;
    }
}
