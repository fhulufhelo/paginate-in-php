<?php

namespace Fhulu\Pagination;

/**
 * summary
 */
class Meta
{
	/**
     * summary
     */
	protected $page;

	/**
     * summary
     */
	protected $perPage;

	/**
     * summary
     */
	protected $total;


    /**
     * summary
     */
    public function __construct($page, $perPage, $total)
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->total = $total;
    }

    /**
     * summary
     */
    public function page()
    {
    	return (int) $this->page;
    }

    /**
     * summary
     */
    public function perPage()
    {
    	return (int) $this->perPage;
    }

     /**
     * summary
     */
    public function total()
    {
    	return (int) $this->total;
    }


    /**
     * summary
     */
    public function lastPage()
    {
    	return (int) ceil($this->total() / $this->perPage());
    }


    /**
     * summary
     */
    public function __get($property)
    {
    	if (method_exists($this, $property)) {
    		return $this->{$property}();
    	}

    	return null;
    }




}