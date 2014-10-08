<?php
namespace Zip2Vote\VoteBundle\Enum;

class AppEnum
{
    private $key;
    
    private static $instances = array();
    
    protected final function __construct($key)
    {
        $this->key = $key;
        $this->value = static::$key;
    }
    
    public static function lookup($key)
    {
        if (empty(static::$instances[$key])) {
            static::$instances[$key] = new static($key);
        }
        
        return static::$instances[$key];
    }
    
    public static function reverseLookup($value)
    {
        $class = new \ReflectionClass(self);
        foreach ($class->getConstants() as $k => $v) {
            if ($value === $v) {
                return static::lookup($k);
            }
        }
    }
    
    public function key()
    {
        return $this->key;
    }
    
    public function value()
    {
        $key = $this->key;
        return static::$key;
    }
    
    public function encode()
    {
        return $this->key . ':' . $this->value();
    }
    
    public function __toString()
    {
        return $this->value();
    }
}