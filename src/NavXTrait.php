<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-nav-x
 * @version 1.2.4
 */

namespace kartik\nav;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

/**
 * Trait for [[NavX]] methods
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
trait NavXTrait
{
    /**
     * @var array the dropdown widget options
     */
    public $dropdownOptions = [];

    /**
     * Renders the given items as a dropdown.
     * This method is called to create sub-menus.
     * @param array $items the given items. Please refer to [[Dropdown::items]] for the array structure.
     * @param array $parentItem the parent item information. Please refer to [[items]] for the structure of this array.
     * @return string the rendering result.
     * @throws \Exception
     */
    protected function renderDropdown($items, $parentItem)
    {
        /** @var \yii\base\Widget $dropdownClass */
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
     * @param array $items @see items
     * @param bool $active should the parent be active too
     * @return array @see items
     */
    protected function isChildActive($items, &$active)
    {
        foreach ($items as $i => $child) {
            if (ArrayHelper::remove($items[$i], 'active', false) || $this->isItemActive($child)) {
                Html::addCssClass($items[$i]['options'], 'active');
                if ($this->activateParents) {
                    $active = true;
                }
            }
            if (isset($items[$i]['items']) && is_array($items[$i]['items'])) {
                $childActive = false;
                $items[$i]['items'] = $this->isChildActive($items[$i]['items'], $childActive);
                if ($childActive) {
                    Html::addCssClass($items[$i]['options'], 'active');
                    $active = true;
                }
            }
        }
        return $items;
    }

    /**
     * Check dependency
     * @throws InvalidConfigException
     */
    protected function checkDependency()
    {
        if (!class_exists($this->dropdownClass)) {
            throw new InvalidConfigException("The dropdownClass '{$this->dropdownClass}' was not found. Please ensure the '{$this->dropdownClass}' extension is installed and accessible.");
        }
    }
}
