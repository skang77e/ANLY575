<?php
class CEO extends Base {
	public $id;
	public $ceo_founder;
	public $ceo_woman;
	public $company_id;

	function __construct() {
	    $this->table = 'ceo_info';
	  }
}