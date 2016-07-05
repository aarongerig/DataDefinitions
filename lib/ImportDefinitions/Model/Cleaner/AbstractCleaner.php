<?php

namespace ImportDefinitions\Model\Cleaner;
use ImportDefinitions\Model\Log;
use Pimcore\Model\Object\Concrete;

/**
 * Class AbstractCleaner
 * @package ImportDefinitions\Model\Cleaner
 */
abstract class AbstractCleaner {

    /**
     * available Interpreter.
     *
     * @var array
     */
    public static $availableCleaner = array('deleter', 'referenceCleaner', 'unpublisher');

    /**
     * Add Interpreter.
     *
     * @param $cleaner
     */
    public static function addCleaner($cleaner)
    {
        if (!in_array($cleaner, self::$availableCleaner)) {
            self::$availableCleaner[] = $cleaner;
        }
    }

    /**
     * @param Concrete[] $objects
     * @param Log[] $logs
     * @param Concrete[] $notFoundObjects
     * @return mixed
     */
    public abstract function cleanup($objects, $logs, $notFoundObjects);
}