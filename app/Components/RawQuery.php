<?php
namespace App\Components;

class RawQuery {    
    public function select($table, array $data = []) {
    	$fields  =  "*";
    	if (!empty($data['column'])) {
          $fields = implode(', ', $data['column']);
       	}
       	if (!empty($data['orderby'])) {   			
       		$orderby = implode(' ', $data['orderby']);       		
       		return "select $fields from $table order by $orderby";	
       	}
		if (!empty($data['orderbycap'])) {   			
		$orderby = implode(' ', $data['orderbycap']);       		
		return "SELECT $fields FROM $table ORDER BY $orderby";	
		}
	   	if (!empty($data['limit'])) {
	   		return "select $fields from $table limit ".$data['limit'];
	   	}
        return "select $fields from $table";
    }
}