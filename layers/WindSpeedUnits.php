<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\layers;

/**
 * WindSpeedUnits
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps\layers
 */
class WindSpeedUnits
{
    const KILOMETERS_PER_HOUR = 'google.maps.weather.WindSpeedUnit.KILOMETERS_PER_HOUR';
    const METERS_PER_SECOND = 'google.maps.weather.WindSpeedUnit.METERS_PER_SECOND';
    const MILES_PER_HOUR = 'google.maps.weather.WindSpeedUnit.MILES_PER_HOUR';

    /**
     * Checks whether a value is a valid [WindSpeedUnits] constant.
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
                static::KILOMETERS_PER_HOUR,
                static::METERS_PER_SECOND,
                static::MILES_PER_HOUR
            ],
            false
        );
    }
}
