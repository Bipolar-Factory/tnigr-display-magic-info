<?php

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
class Register
{
	// Connection
	private $conn;
	// Table
	private $db_table = "register_details";


	// Columns

	public $token_no;
	public $token_name;
	public $token_name_tamil;
	public $speak_status;


	// Db connection
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function getRegister()
	{
		echo $this->token_name;
		//================================field name may change.. starts here===================================//
		$sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id!='' ORDER BY id DESC";
		//============================================ends here====================================================//
		$data = [];
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	// CREATE
	public function createRegister()
	{
		$sqlQuery = "INSERT INTO
                    " . $this->db_table . "
            SET
                token_no    =:token_no,
                token_name = :token_name,
                token_name_tamil = :token_name_tamil,
				speak_status = :speak_status";


		$stmt = $this->conn->prepare($sqlQuery);

		// sanitize
		$this->token_no     = htmlspecialchars(strip_tags($this->token_no));
		$this->token_name  = htmlspecialchars(strip_tags($this->token_name));
		$this->token_name_tamil  = htmlspecialchars(strip_tags($this->token_name_tamil));


		// bind data
		$stmt->bindParam(":token_no", $this->token_no);
		$stmt->bindParam(":token_name", $this->token_name);
		$stmt->bindParam(":token_name_tamil", $this->token_name_tamil);
		$stmt->bindParam(":speak_status", $this->speak_status);

		// bind data

		if ($stmt->execute()) {

			return true;
		}
		return false;
	}

	// READ single
	// public function getSingleDepartment(){
	//   $sqlQuery = "SELECT COUNT(DepartmentId) as DepartmentId FROM " . $this->db_table . " WHERE DepartmentId = ?";
	//     $stmt = $this->conn->prepare($sqlQuery);
	//         $stmt->bindParam(1, $this->DepartmentId);
	//         $stmt->execute();
	//         $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
	//         $this->DepartmentId         = $dataRow['DepartmentId'];
	// }

	// UPDATE
	public function updateRegister()
	{

		$sqlQuery = "UPDATE
                    " . $this->db_table . "
                SET
                    speak_status = :speak_status 
                    
                WHERE 
                    id != '' order by id DESC limit 1 ";

		$stmt = $this->conn->prepare($sqlQuery);

		$this->speak_status     = htmlspecialchars(strip_tags($this->speak_status));


		// bind data
		$stmt->bindParam(":speak_status", $this->speak_status);


		if ($stmt->execute()) {
			return true;
		}
		return false;
	}
}
