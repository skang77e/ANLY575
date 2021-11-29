<?php
class Sector extends Base {
	public $id;
	public $sector;
	public $company_id;

	function __construct() {
	    $this->table = 'sec_records';
	  }
}