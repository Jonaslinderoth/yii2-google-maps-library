<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps;

/**
 * MapTypeId
 *
 * Identifiers for common MapTypes.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 *
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class MapTypeId
{
    const HYBRID = 'google.maps.MapTypeId.HYBRID';
    const ROADMAP = 'google.maps.MapTypeId.ROADMAP';
    const SATELLITE = 'google.maps.MapTypeId.SATELLITE';
    const TERRAIN = 'google.maps.MapTypeId.TERRAIN';

    /**
     * Checks whether value is a valid [MapTypeId] constant.
     * @param $value
     *
     * @return bool
     */
    public static function getIsValid($value)
    {
        return in_array(
            $value,
            [
                static::HYBRID,
                static::ROADMAP,
                static::SATELLITE,
                static::TERRAIN
            ],
            false
        );
    }
}
