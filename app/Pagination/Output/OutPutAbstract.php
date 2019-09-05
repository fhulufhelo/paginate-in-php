<?php

namespace App\Pagination\Output;

use App\Pagination\Meta;
use App\Pagination\PageIterator;

/**
 * summary
 */
abstract class OutPutAbstract
{
	/**
     * summary
     */
	protected $meta;
    /**
     * summary
     */
    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * summary
     */
    public function page()
    {
    	$lrCount = 2;

    	$endDifference = max(1, $this->meta->page - ($this->meta->lastPage - $lrCount) + 1);

    	$range = range(1, $this->meta->lastPage);

    	$offsetStart = max(1, ($this->meta->page) - $lrCount) - $endDifference;

    	$range = array_slice($range, $offsetStart, $this->meta->perPage);

    	$range = array_slice($range, 0, $lrCount * 2);

    	array_unshift($range, 1);

    	$range[] = $this->meta->lastPage;

    	return new PageIterator(array_unique($range), $this->meta);
    }

    /**
     * summary
     */
    abstract public function render();
}