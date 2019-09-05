<?php

namespace Fhulu\Pagination;

use Fhulu\Pagination\Meta;
use Iterator;


/**
 * summary
 */
class PageIterator implements Iterator
{
	/**
     * summary
     */
	protected $position = 0;

	/**
     * summary
     */
	protected $pages;

	/**
     * summary
     */
	protected $meta;
    /**
     * summary
     */
    public function __construct(array $pages, Meta $meta)
    {
        $this->meta = $meta;
         $this->pages = $pages;
         $this->position = 0;
    }

    /**
     * summary
     */
    public function isCurrentPage()
    {
    	return $this->current() === $this->meta->page;
    }

    /**
     * summary
     */
    public function hasPrevious()
    {
    	if ($this->meta->page <= 0) {
    		return false;
    	}

    	return $this->meta->page > 1;
    }

    /**
     * summary
     */
    public function hasNext()
    {
    	return $this->meta->page < $this->meta->lastPage;
    }

    /**
     * summary
     */
    public function rewind()
    {
    	$this->position = 0;
    }

    /**
     * summary
     */
    public function current()
    {
    	return $this->pages[$this->position];
    }

     /**
     * summary
     */
    public function key()
    {
    	return $this->position;
    }

    /**
     * summary
     */
    public function next()
    {
    	++$this->position;
    }

    /**
     * summary
     */
    public function valid()
    {
    	return isset($this->pages[$this->position]);
    }
}