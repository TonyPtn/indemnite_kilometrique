<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 13/01/2018
 * Time: 21:17
 */

class ObjectSerialization
{
    /** Méthodes **/
    public static function serializeObject($object)
    {
        $serialized = serialize($object);

        return $serialized;
    }

    public static function unserializeObject($serialized)
    {
        $unserialized = unserialize($serialized);

        return $unserialized;
    }
}