<?php
	/**
	 * Object represents table 'categories'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2015-03-01 15:03	 
	 */
	class Categorie{
		
		var $id;

		var $name;

		var $parent;
                
                // for hierarchy
                var $lev1;
                var $lev2;
                var $lev3;

		
	}
?>