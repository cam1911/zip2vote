<?php
namespace Zip2Vote\VoteBundle\Common;

/**
 * Helper class for manipulating and standardizing objects.
 */
class ObjectUtils
{
    /**
     * 
     * @param mixed &$value
     * @param string $class
     * @param string $method
     * @return mixed Returns an instance of $class
     * @throws \LogicException
     */
    public static function standardize(&$value, $class, $method = '__construct')
    {
        if (!class_exists($class)) {
            throw new \LogicException("'$class' class doesn't exist.");
        } else if (!method_exists($class, $method)) {
            throw new \LogicException("'$class::$method' doesn't exist.");
        }
        
        if ($value instanceof $class) {
            return $value;
        } else if ($method !== '__construct') {
            return $value = $class::$method($value);
        } else {
            return $value = new $class($value);
        }
    }
}