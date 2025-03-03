<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\layers;

use jonaslinderoth\google\maps\ObjectAbstract;
use jonaslinderoth\google\maps\OptionsTrait;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/**
 * PanoramioLayerOptions
 *
 * @property boolean $clickable If true, the layer receives mouse events. Default value is true.
 * @property string $map The map on which to display the layer.
 * @property boolean $suppressInfoWindows Suppress the rendering of info windows when layer features are clicked.
 * @property string $tag A panoramio tag used to filter the photos which are displayed. Only photos which have been
 * tagged with the supplied string will be shown.
 * @property string $userId A Panoramio user ID. If provided, only photos by this user will be displayed on the map. If
 * both a tag and user ID are provided, the tag will take precedence.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 *
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps\layers
 */
class PanoramioLayerOptions extends ObjectAbstract
{
    use OptionsTrait;

    /**
     * @inheritdoc
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->options = ArrayHelper::merge(
            [
                'clickable' => null,
                'map' => null,
                'tag' => null,
                'userId' => null,
                'suppressInfoWindows' => null,
            ],
            $this->options
        );

        parent::__construct($config);
    }

    /**
     * Sets the map making sure it is not converted into a js string when encoding.
     *
     * @param $value
     */
    public function setMap($value)
    {
        $this->options['map'] = new JsExpression($value);
    }
}
