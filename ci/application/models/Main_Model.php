<?php

class Main_Model extends CI_MODEL {

	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}	
	

	public function get_quote_currency_names()
	{		

		$result = $this->db->query("SELECT quote_currency FROM exchange_rates where base_currency = 'btc'");

		return $result->result_array();

	}

	public function get_data($type)
	{
		$query = "select date from exchange_rates GROUP BY date ORDER BY date DESC";
		$result = $this->db->query($query)->result_array();
		if (count($result) == 0) return array();

		$date = $result[0]['date'];

		$query = "SELECT * FROM exchange_rates WHERE date='".$date."' and upper(quote_currency)='".$type."'";
		$result = $this->db->query($query);

		return $result->result_array();
	}

}

?>