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
 * EventType
 *
 * Describes the different valid event types supported.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 *
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class EventType
{
    const DEFAULT_EVENT = 'DEFAULT';
    const DEFAULT_ONCE = 'DEFAULT_ONCE';
    const DOM = 'DOM';
    const DOM_ONCE = 'DOM_ONCE';

    /**
     * Checks whether value is a valid [EventType] constant.
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
                static::DEFAULT_EVENT,
                static::DEFAULT_ONCE,
                static::DOM,
                static::DOM_ONCE
            ]
        );
    }
}
