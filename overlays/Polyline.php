<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\overlays;

use jonaslinderoth\google\maps\LatLngBounds;
use jonaslinderoth\google\maps\OverlayTrait;
use yii\helpers\ArrayHelper;

/**
 * Polyline
 *
 * Object to render polylines on the map.
 *
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class Polyline extends PolylineOptions
{
    use OverlayTrait;

    /**
     * Sets the options based on a PolylineOptions object
     *
     * @param PolylineOptions $polylineOptions
     */
    public function setOptions(PolylineOptions $polylineOptions)
    {
        $options = array_filter($polylineOptions->options);
        $this->options = ArrayHelper::merge($this->options, $options);
    }

    /**
     * Returns the center of bounds of the
     * @return \jonaslinderoth\google\maps\LatLng
     */
    public function getCenterOfBounds()
    {
        $path = ArrayHelper::getValue($this->options, 'path');

        return is_array($path) && !empty($path)
            ? LatLngBounds::getBoundsOfCoordinates($path)->getCenterCoordinates()
            : null;
    }

    /**
     * Returns the js code to create a rectangle on a map
     * @return string
     */
    public function getJs()
    {
        $js = $this->getInfoWindowJs();

        $js[] = "var {$this->getName()} = new google.maps.Polyline({$this->getEncodedOptions()});";

        foreach ($this->events as $event) {
            /** @var \jonaslinderoth\google\maps\Event $event */
            $js[] = $event->getJs($this->getName());
        }

        return implode("\n", $js);
    }
}
