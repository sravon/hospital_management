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

	function insertIntoCart($pid,$cmrid, $quantity){
		$sql ='SELECT * FROM cart WHERE cmr_id="'.$cmrid.'" AND product_id ="'.$pid.'" AND type=1';
		$value = $this->db->select($sql);
		if ($value) {
			$msg = 0;
		}else{
			$sql ="insert into cart(cmr_id, quantity,product_id,type) 
			value('".$cmrid."', '".$quantity."','".$pid."' ,1)";
			$insert = $this->db->insert($sql);
			if ($insert) {
				$msg = 1;
			}
		}
		return $msg;
	}


}