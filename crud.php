<?php 

    include_once 'database.php';
    include_once 'register_office.php';
    
    $database = new Database();
    $db = $database->getConnection();
    $item = new Register($db);
    
    $actions = $_POST['action'];

    switch ($actions) {


	case 'insert':
		//================================field and variable may change.. starts here==============================//

		$item->token_no     = $_POST['token_no'];
		$item->token_name   = $_POST['token_name'];
		$item->token_name_tamil   = $_POST['token_name_tamil'];
		$item->speak_status   = $_POST['speak_status'];

		//========================================== ends here=====================================================//
		if ($item->createRegister()) {
			echo 'Registration created successfully.';
		} else {
			echo 'Registration could not be created.';
		}
		break;

	case 'list':

		$stmt = $item->getRegister();
		$itemCount = $stmt;
		$result = json_encode($itemCount);

		$output = '';
		if ($itemCount > 0) {
			$employeeArr = array();
			$employeeArr["body"] = array();
			$employeeArr["itemCount"] = $itemCount;
			foreach ($itemCount as $row => $value) {
				//================================field and variable may change.. starts here==============================//
				$output .= '
                        <tr>

                            <td>' . $value['token_no'] . '</td>
                            <td>' . $value['token_name'] . '</td>
                            <td>' . $value['token_name_tamil'] . '</td>
                        </tr>
                    ';
				//========================================== ends here=====================================================//
			}
		} else {
			$output .= '
                    <tr>
                        <td colspan="2" align="center">No Data Found</td>
                    </tr>
                ';
		}
		echo $output;
		break;

	case 'update':
		//================================field and variable may change.. starts here==============================//

		$item->speak_status         = $_POST['speak_status'];

		//========================================== ends here=====================================================//
		if ($item->updateRegister()) {
			echo 'Register updated successfully.';
		} else {
			echo 'Register could not be updated.';
		}
		break;

	default:
		// code...
		break;
}
?>