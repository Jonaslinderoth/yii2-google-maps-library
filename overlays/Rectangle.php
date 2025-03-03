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
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * Rectangle
 *
 * A Google Maps Rectangle.
 *
 * @see https://developers.google.com/maps/documentation/javascript/reference?csw=1#RectangleOptions
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class Rectangle extends RectangleOptions
{
    use OverlayTrait;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (null === $this->bounds) {
            throw new InvalidConfigException('"$bounds" cannot be null');
        }
    }

    /**
     * Sets the options based on a RectangleOptions object
     *
     * @param RectangleOptions $rectangleOptions
     */
    public function setOptions(RectangleOptions $rectangleOptions)
    {
        $options = array_filter($rectangleOptions->options);
        $this->options = ArrayHelper::merge($this->options, $options);
    }

    /**
     * Returns center of bounds
     * @return \jonaslinderoth\google\maps\LatLng|null
     */
    public function getCenterOfBounds()
    {
        return (null !== $this->bounds && $this->bounds instanceof LatLngBounds)
            ? $this->bounds->getCenterCoordinates()
            : null;
    }

    /**
     * Returns the js code to create a rectangle on a map
     * @return string
     */
    public function getJs()
    {
        $js = $this->getInfoWindowJs();

        $js[] = "var {$this->getName()} = new google.maps.Rectangle({$this->getEncodedOptions()});";

        foreach ($this->events as $event) {
            /** @var \jonaslinderoth\google\maps\Event $event */
            $js[] = $event->getJs($this->getName());
        }

        return implode("\n", $js);
    }
}
