<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps;

use yii\base\BaseObject;
use yii\base\InvalidConfigException;

/**
 * Size
 *
 * Two-dimensional size, where width is the distance on the x-axis, and height is the distance on the y-axis.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 *
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class Size extends BaseObject
{
    /**
     *
     * The height along the y-axis, in pixels.
     * @var integer height
     */
    private $_height;
    /**
     *
     * The width along the x-axis, in pixels.
     * @var integer width
     */
    private $_width;

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        if (empty($this->_height) || empty($this->_width)) {
            throw new InvalidConfigException('"width" and "height" cannot be null.');
        }
        if (!is_numeric($this->_height) || !is_numeric($this->_width)) {
            throw new InvalidConfigException('"width" and "height" must be a numeric string or a number!');
        }
        parent::init();
    }

    /**
     * Sets Height of the Size
     * @param $value
     * @throws \yii\base\InvalidConfigException
     */
    public function setHeight($value)
    {
        if (!is_numeric($value)) {
            throw new InvalidConfigException('"Height" must be a numeric string or a number!');
        }

        $this->_height = $value;
    }

    /**
     * Sets the Width of the Size
     * @param $value
     * @throws \yii\base\InvalidConfigException
     */
    public function setWidth($value)
    {
        if (!is_numeric($value)) {
            throw new InvalidConfigException('"Width" must be a numeric string or a number!');
        }

        $this->_width = $value;
    }

    /**
     *
     * returns array representation of the size
     */
    public function asArray()
    {
        return ['width' => $this->_width, 'height' => $this->_height];
    }

    /**
     * @return string Javascript code to return the Size
     */
    public function getJs()
    {
        return "new google.maps.Size({$this->_width}, {$this->_height})";
    }
}
