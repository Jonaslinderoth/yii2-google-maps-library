<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\overlays;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 *
 * InfoWindow
 *
 * Google maps info window object.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class InfoWindow extends InfoWindowOptions
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->content == null) {
            throw new InvalidConfigException('"$content" cannot be null');
        }
    }

    /**
     * Returns the js to initialize the info window object
     * @return string
     */
    public function getJs()
    {
        $js = [];

        $js[] = "var {$this->getName()} = new google.maps.InfoWindow({$this->getEncodedOptions()});";

        foreach ($this->events as $event) {
            /** @var \jonaslinderoth\google\maps\Event $event */
            $js[] = $event->getJs($this->getName());
        }

        return implode("\n", $js);
    }

    /**
     * Sets the options based on a InfoWindowOptions object
     *
     * @param InfoWindowOptions $infoWindowOptions
     */
    public function setOptions(InfoWindowOptions $infoWindowOptions)
    {
        $options = array_filter($infoWindowOptions->options);
        $this->options = ArrayHelper::merge($this->options, $options);
    }
}
