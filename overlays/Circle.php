<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\overlays;

use jonaslinderoth\google\maps\OverlayTrait;
use yii\base\InvalidConfigException;

/**
 * Circle
 *
 * Object to render circles on the map.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 *
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class Circle extends CircleOptions
{
    use OverlayTrait;

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        if ($this->center == null) {
            throw new InvalidConfigException('"center" cannot be null');
        }
    }

    /**
     * Returns the center of bounds
     * @return \jonaslinderoth\google\maps\LatLng
     */
    public function getCenterOfBounds()
    {
        return $this->center;
    }

    /**
     * Returns the js code to create a rectangle on a map
     * @return string
     */
    public function getJs()
    {
        $js = $this->getInfoWindowJs();

        $js[] = "var {$this->getName()} = new google.maps.Circle({$this->getEncodedOptions()});";

        foreach ($this->events as $event) {
            /** @var \jonaslinderoth\google\maps\Event $event */
            $js[] = $event->getJs($this->getName());
        }

        return implode("\n", $js);
    }
}
