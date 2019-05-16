<?php
namespace App\Components;

class RawQuery {    
    public function select($table, array $data = []) {
    	$fields  =  "*";
    	if (!empty($data)) {
          $fields = implode(', ', $data);
       	}
        return "select $fields from $table";
    }
}