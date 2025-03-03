<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\controls;

use jonaslinderoth\google\maps\ObjectAbstract;
use jonaslinderoth\google\maps\OptionsTrait;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/**
 * ZoomControlOptions
 *
 * Options for the rendering of the zoom control.
 *
 * For further information please visit its
 * [documentation](https://developers.google.com/maps/documentation/javascript/reference#ZoomControlOptions) at
 * Google.
 *
 * @property string position Position id. Used to specify the position of the control on the map.
 * The default position is [ControlPosition::TOP_LEFT]
 * @property string style Style id. Used to select what style of zoom control to display. Is one of the values of
 * [ZoomControlStyle].
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class ZoomControlOptions extends ObjectAbstract
{
    use OptionsTrait;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->options = ArrayHelper::merge([
                'position' => null,
                'style' => null
            ], $this->options);
    }

    /**
     * Sets the position and makes sure is a valid [ControlPosition] value.
     *
     * @param string $value
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function setPosition($value)
    {
        if (!ControlPosition::getIsValid($value)) {
            throw new InvalidConfigException('Unknown "position" value');
        }
        $this->options['position'] = $value;
    }

    /**
     * @param $value
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function setStyle($value)
    {
        if (!ZoomControlStyle::getIsValid($value)) {
            throw new InvalidConfigException('Unknown "style" value');
        }

        $this->options['style'] = new JsExpression($value);
    }
}
