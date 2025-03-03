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
 * MapTypeControlStyle
 *
 * Identifiers for common MapTypesControls.
 *
 * For further information please visit its
 * [documentation](https://developers.google.com/maps/documentation/javascript/reference#MapTypeControlStyle) at Google.
 *
 * ```
 * use jonaslinderoth\google\maps\controls\MapTypeControlOptions;
 * use jonaslinderoth\google\maps\controls\MapTypeControlStyle;
 * use jonaslinderoth\google\maps\Map;
 *
 * $options = new MapTypeControlOptions(['style' => MapTypeControlStyle::DROPDOWN_MENU]);
 *
 * $map = new Map(['mayTypeControlOptions' => $options]);
 * ```
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps\controls
 */
class MapTypeControlStyle
{
    const DEFAULT_STYLE = 'google.maps.MapTypeControlStyle.DEFAULT';
    const DROPDOWN_MENU = 'google.maps.MapTypeControlStyle.DROPDOWN_MENU';
    const HORIZONTAL_BAR = 'google.maps.MapTypeControlStyle.HORIZONTAL_BAR';

    /**
     * Checks whether the value is a correct [MapTypeControlStyle] constant.
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
                static::DROPDOWN_MENU,
                static::HORIZONTAL_BAR
            ],
            false
        );
    }
}
