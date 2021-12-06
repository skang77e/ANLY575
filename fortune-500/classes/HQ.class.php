<?php
class HQ extends Base {
	public $id;
	public $city;
	public $state;
	public $company_id;

	function __construct() {
	    $this->table = 'hq_location';
	  }
}