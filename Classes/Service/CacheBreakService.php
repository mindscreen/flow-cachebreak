<?php
namespace Mindscreen\Flow\CacheBreak\Service;

/*                                                                        *
 * This script belongs to the Flow framework.                             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the MIT license.                                          *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cli\CommandController;

/**
 * Command controller for Fluid documentation rendering
 *
 * @Flow\Scope("singleton")
 */
class CacheBreakService
{

    /**
     * The cache key that is used to store and retrieve the cache breaking string
     *
     * @const string
     */
    const STORAGE_KEY = 'cache_breaking_string';

    /**
     * @var \TYPO3\Flow\Cache\Frontend\StringFrontend
     * @Flow\Inject
     */
    protected $storage;

    /**
     * Updates the cache breaking string
     */
    public function update()
    {
        $this->storage->set(self::STORAGE_KEY, md5(time()));
    }

    /**
     * Returns the cache breaking string
     *
     * @return mixed
     */
    public function get()
    {
        if (!$this->storage->has(self::STORAGE_KEY)) {
            $this->update();
        }
        return $this->storage->get(self::STORAGE_KEY);
    }

}
