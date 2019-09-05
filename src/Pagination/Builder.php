<?php

namespace Fhulu\Pagination;

use Fhulu\Pagination\Meta;
use Fhulu\Pagination\Result;


/**
 * summary
 */
class Builder
{

    /**
     * summary
     */
	protected $builder;
    /**
     * summary
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

     /**
     * summary
     */
    function paginate($page = 1, $perpage = 10)
    {
    	$page = max(1, $page);

    	$total =  $this->totalRows();

    	$result = $this->builder
    		->setFirstResult($this->getFirstResultIndex($page,$perpage))
    		->setMaxResults($perpage)
    		->execute()
    		->fetchAll();

    	return new Result($result, new Meta($page, $perpage, $total));	

    }

     /**
     * summary
     */
    protected function getFirstResultIndex($page, $perpage)
    {
    	return ($page - 1) * $perpage;
    }


    /**
     * summary
     */
    protected function totalRows()
    {
    	return $this->builder->execute()->rowCount();
    }


}