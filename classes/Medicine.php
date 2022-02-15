<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Medicine
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	function getMedicineByName($pharid){
		$sql ='SELECT * FROM medicine WHERE phar_id="'.$pharid.'"';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function allPharmacy(){
		$sql ='SELECT * FROM pharmacy';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}


}