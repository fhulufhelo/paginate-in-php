<?php

namespace App\Pagination\Output;

use App\Pagination\Meta;

/**
 * summary
 */
class SimpleOut
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
    public function render()
    {
    	$lrCount = 2;

    	$range = range(1, $this->meta->lastPage);

    	$offsetStart = max(1, ($this->meta->page) - $lrCount);

    	$range = array_slice($range, $offsetStart, $this->meta->perPage);

    	$range = array_slice($range, 0, $lrCount * 2);

    	array_unshift($range, 1);

    	$range[] = $this->meta->lastPage;

    	return $range;
    }
}