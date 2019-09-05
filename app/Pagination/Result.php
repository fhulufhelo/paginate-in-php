<?php

namespace App\Pagination;

use App\Pagination\Meta;
use App\Pagination\Output\SimpleOutput;

/**
 * summary
 */
class Result
{
	/**
     * summary
     */
	protected $results;

	/**
     * summary
     */
	protected $meta;
    /**
     * summary
     */
    public function __construct(array $results, Meta $meta)
    {
        $this->results = $results;
        $this->meta = $meta;
    }

     /**
     * summary
     */
    public function get()
    {
    	return $this->results;
    }

    /**
     * summary
     */
    public function render()
    {
        return (new SimpleOutput($this->meta))->render();

    }
}