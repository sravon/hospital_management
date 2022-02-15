<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Oxygen
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	function getcylinderByName($pharid){
		$sql ='SELECT * FROM cylinder WHERE cylinder_type="'.$pharid.'"';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function allCylinder(){
		$sql ='SELECT * FROM cylinder_type';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}


}