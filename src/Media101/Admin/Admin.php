<?php

namespace	Media101\Admin;

class Admin
{
    public static $entities = [];

    public static function addEntity($entity)
    {
        if( is_string($entity)){
            $entity = new $entity();

            if($entity instanceof Entity)
                self::$entities[$entity->getAlias()] = $entity;
        }
    }

    /**
     * @return string[]
     */
    public static function entitiesAliases()
    {
        return array_map(function ($entity)
        {
            return $entity->getAlias();
        }, static::$entities);
    }

    public static function entity($class)
    {
        return self::$entities[$class];
    }
}