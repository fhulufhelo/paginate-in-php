<?php

namespace App\Pagination\Output;

use App\Pagination\Meta;

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

    	return array_unique($range);
    }

    /**
     * summary
     */
    abstract public function render();
}