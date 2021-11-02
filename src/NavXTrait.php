<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2021
 * @package yii2-nav-x
 * @version 1.2.5
 */

namespace kartik\nav;

use yii\base\InvalidConfigException;

/**
 * Base Trait for [[NavX]] methods
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
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        $this->checkDependency();
        parent::init();
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
