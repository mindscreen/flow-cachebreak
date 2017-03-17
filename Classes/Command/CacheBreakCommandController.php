<?php
namespace Mindscreen\Flow\CacheBreak\Command;

/*                                                                        *
 * This script belongs to the Flow framework.                             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the MIT license.                                          *
 *                                                                        */

use Mindscreen\Flow\CacheBreak\Service\CacheBreakService;
use Neos\Flow\Annotations as Flow;

/**
 * Command controller for breaking resource caches
 *
 * @Flow\Scope("singleton")
 */
class CacheBreakCommandController extends \Neos\Flow\Cli\CommandController
{

    /**
     * @Flow\Inject
     * @var CacheBreakService
     */
    protected $cacheBreakService;

    /**
     * Updates the timestamp that is added to resources in order to break client side caching
     * of static resources.
     * Be sure to flush frontend caches afterwards (if applicable).
     */
    public function updateCommand()
    {
        $this->cacheBreakService->update();
    }

}