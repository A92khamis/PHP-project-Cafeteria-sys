<?php
/**
 * 
 */
 class Product 
 {
 	public $pname;
	public $price;
	public $pid;

 	function __construct($pnum,$pna,$ppr)
 	{
 		$this->pid = $pnum;
 		$this->pname = $pna;
 		$this->price = $ppr;

 	}

 } 
 ?>