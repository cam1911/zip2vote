<?php
namespace Zip2Vote\VoteBundle\Doctrine\Types;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Zip2Vote\VoteBundle\Enum\AppEnum;

/**
 * Maps an AppEnum to a database value.
 */
class AppEnumType extends \Doctrine\DBAL\Types\StringType
{
    public function convertToPHPValue($raw, AbstractPlatform $platform)
    {
        $base = strstr($raw, ':', true);
        $key = substr($raw, strlen($base) + 1);
        $class = '\Zip2Vote\VoteBundle\Enum\\' . $base;
        return $class::lookup($key);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        assert($value instanceof AppEnum);
        return $value->encode();
    }

    public function getName()
    {
        return 'AppEnum';
    }
}