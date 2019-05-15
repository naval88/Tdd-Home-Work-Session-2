<?php
namespace App\Components;

class RawQuery {    
    public function select($table) {
        return "select * from $table";
    }
}