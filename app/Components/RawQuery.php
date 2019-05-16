<?php
namespace App\Components;

class RawQuery {    
    public function select($table, array $data = [], array $orderBy = []) {
    	$fields  =  "*";
    	if (!empty($data)) {
          $fields = implode(', ', $data);
       	}
       	if($orderBy){
       		return "select $fields from $table order by $orderBy[0] $orderBy[1]";	
       	}
        return "select $fields from $table";
    }
}