<?php

namespace App\Models;

class order_detail 
{
    public $id = null;
    public $quantity = 0;

    public function __construct($id,$q)
    {
        $this -> id = $id;
        $this -> quantity =$q;
    }

  /*  public function add_quantity($id,$q)
    {
        $this -> id = $id;
        $this -> quantity +=$q;
    }*/


}
