<?php
class Financial extends Base {
	public $id;
	public $company;
	public $rank;
	public $revenue;
	public $profit;
	public $newcomer;

	function __construct() {
	    $this->table = 'key_financials';
	  }
}