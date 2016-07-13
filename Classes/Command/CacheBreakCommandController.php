<?php
namespace Mindscreen\CacheBreak\Command;

/*                                                                        *
 * This script belongs to the Flow framework.                             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the MIT license.                                          *
 *                                                                        */

use Mindscreen\CacheBreak\Service\CacheBreakService;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cli\CommandController;
use TYPO3\Fluid\Service;

/**
 * Command controller for breaking resource caches
 *
 * @Flow\Scope("singleton")
 */
class CacheBreakCommandController extends CommandController
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
