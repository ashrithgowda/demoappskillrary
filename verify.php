<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		// if ($_POST['email'] == "user" && $_POST['password'] == "user") {
		// 	$email = "harry@den.com";
		// 	$password = "code0";
		// } else if ($_POST['email'] == "admin" && $_POST['password'] == "admin") {
		// 	$email = "admin@admin.com";
		// 	$password = "password";
		// } else {
		// 	$email = "wrong@wrong.com";
		// 	$password = "password";
		// }

		switch($_POST['email']) {

			case "user" : $email = "harry@den.com";
					 break;

			case "admin" : $email = "admin@admin.com";
						break;

			default: $email = "wrong@wrong.com";

		}
		
		switch($_POST['password']) {

			case "user" : $password = "code0";
					 break;

			case "admin" : $password = "password";
						break;

			default: $password = "password";

		}

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email GROUP BY id");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type']){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							$_SESSION['user'] = $row['id'];
						}
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				}
				else{
					$_SESSION['error'] = 'Account not activated.';
				}
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	header('location: login.php');

?>