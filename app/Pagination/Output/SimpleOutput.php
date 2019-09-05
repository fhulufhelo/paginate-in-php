<?php

namespace App\Pagination\Output;

/**
 * summary
 */
class SimpleOutput extends OutPutAbstract
{

    /**
     * summary
     */
    public function render()
    {
    	return $this->page();
    }
}