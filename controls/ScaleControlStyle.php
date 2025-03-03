<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\controls;

/**
 * ScaleControlStyle
 *
 * Identifiers for scale control ids.
 *
 * For further information please visit its
 * [documentation](https://developers.google.com/maps/documentation/javascript/reference#ScaleControlStyle) at
 * Google.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 *
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps\controls
 */
class ScaleControlStyle
{
    const DEFAULT_STYLE = 'google.maps.ScaleControlStyle.DEFAULT';

    /**
     * Checks whether value is a valid [ScaleControlStyle] constant.
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
                static::DEFAULT_STYLE,
            ]
        );
    }
}
