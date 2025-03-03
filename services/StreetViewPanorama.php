<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\services;

use jonaslinderoth\google\maps\LatLng;
use yii\base\InvalidConfigException;

/**
 * StreetViewPanorama
 *
 * Displays the panorama for a given LatLng or panorama ID. A StreetViewPanorama object provides a Street View "viewer"
 * which can be stand-alone within a separate <div> or bound to a Map.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class StreetViewPanorama extends StreetViewPanoramaOptions
{
    /**
     * @var string the HTML element id where to render the street panorama. Avoid the use of '#'
     * (jquery element selector)
     */
    public $nodeId;

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        if ($this->nodeId == null) {
            throw new InvalidConfigException('"nodeId" cannot be null');
        }
    }

    /**
     * Sets the coordinate object of the marker. Required.
     *
     * @param LatLng $coord
     */
    public function setPosition(LatLng $coord)
    {
        $this->options['position'] = $coord;
    }

    /**
     * The constructor js code for the Marker object
     * @return string
     */
    public function getJs()
    {
        $js = [];

        $js[] = "var {$this->getName()} = " .
            "new google.maps.StreetViewPanorama(document.getElementById('{$this->nodeId}'),{$this->getEncodedOptions()});";

        foreach ($this->events as $event) {
            /** @var \jonaslinderoth\google\maps\Event $event */
            $js[] = $event->getJs($this->getName());
        }

        return implode("\n", $js);
    }
}
