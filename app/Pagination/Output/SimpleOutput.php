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
    	$iterator = $this->page();

    	$html = "<ul>";

    	foreach ($iterator as $page) {

    		if ($iterator->isCurrentPage()) {
    			$html .= "<li class=\"is__current\"> <a href=\"{$this->query($page)}\">$page </a> </li>";
    			
    		}else {
    			$html .= "<li> <a href=\"{$this->query($page)}\">$page</a> </li>";
    		}

    		
    	}

    	$html .= "</ul>";

    	return $html;
    }

    /**
     * summary
     */
    public function query($page) {
        
        return "?page={$page}";
    }
}

