<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\services;

use jonaslinderoth\google\maps\ObjectAbstract;
use yii\helpers\ArrayHelper;

/**
 * DirectionsWayPoint
 *
 * A DirectionsWaypoint represents a location between origin and destination through which the trip should be routed.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class DirectionsWayPoint extends ObjectAbstract
{
    /**
     * Sets the location of the way point
     * @param $value
     */
    public function setLocation($value)
    {
        $this->options['location'] = $value;
    }

    /**
     * Returns the location of the direction way point
     * @return \jonaslinderoth\google\maps\LatLng|string
     */
    public function getLocation()
    {
        return ArrayHelper::getValue($this->options, 'location');
    }

    /**
     * If true, indicates that this waypoint is a stop between the origin and destination. This has the effect of
     * splitting the route into two. This value is true by default. Optional.
     * @param boolean $value
     */
    public function setStopOver($value)
    {
        $this->options['stopover'] = (bool)$value;
    }

    /**
     * @return mixed
     */
    public function getStopOver()
    {
        return ArrayHelper::getValue($this->options, 'stopover');
    }

    /**
     * Returns the encoded directions way point configuration object
     * @return string
     */
    public function getJs()
    {
        return $this->getEncodedOptions();
    }
}
