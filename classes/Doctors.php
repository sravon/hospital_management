<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Doctors
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function allDept(){
		$sql ='SELECT * FROM departments';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function doctorbyDept($id){
		$sql ="SELECT * FROM doctors Where dept_id='{$id}'";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}

	public function doctorAppoitmentList(){
		$sql ="SELECT * FROM doctors JOIN appoitment ON appoitment.doctor_id = doctors.doc_id JOIN customer ON customer.cus_id = appoitment.cmr_id";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}
	
	public function cutomerregister($data){
		$fname = $this->fm->validation($data['fname']);
		$lname = $this->fm->validation($data['lname']);
		$username = $this->fm->validation($data['username']);

		$gender = $this->fm->validation($data['gender']);
		$phone = $this->fm->validation($data['phone']);
		$email = $this->fm->validation($data['email']);
		$password_confirmation = $this->fm->validation($data['password_confirmation']);
		$password = $this->fm->validation($data['password']);

		$email = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,$password);
		if (empty($fname) || empty($lname) || empty($username) || empty($phone) || empty($email) || empty($password)) {
		 	$loginmsg = "Fields must not be empty";
		 }else{
		 	$sql = "INSERT INTO `customer`(`f_name`, `l_name`, `email`, `username`, `gender`, `phone`, `password`) 
			VALUES ('{$fname}','{$lname}','{$email}','{$username}','{$gender}','{$phone}','{$password}')";
		 	$result=$this->db->insert($sql);
		 	if ($result) {
		 			$loginmsg = "<span class='text-success'>Register Success !</span>";
		 	}else{
		 		$loginmsg ="<span class='text-danger'register Failed</span>";
		 	}	
		}
		return $loginmsg;
	}

}