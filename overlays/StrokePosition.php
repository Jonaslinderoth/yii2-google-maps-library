<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\overlays;

/**
 * StrokePosition
 *
 * Specifies the possible positions of the stroke on a polygon.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps\overlays
 */
class StrokePosition
{
    const CENTER = 'google.maps.StrokePosition.CENTER';
    const INSIDE = 'google.maps.StrokePosition.INSIDE';
    const OUTSIDE = 'google.maps.StrokePosition.OUTSIDE';

    /**
     * Checks whether the value is a valid [StrokePosition] constant.
     *
     * @param $value
     *
     * @return bool
     */
    public static function getIsValid($value)
    {
        return in_array(
            $value,
            [
                static::CENTER,
                static::INSIDE,
                static::OUTSIDE,
            ],
            false
        );
    }
}
