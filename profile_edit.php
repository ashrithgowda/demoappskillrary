<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['edit'])){
		 $curr_password = $_POST['curr_password'];
		 $email = $_POST['email'];
		 $password = $_POST['password'];
		 $firstname = $_POST['firstname'];
		 $lastname = $_POST['lastname'];
		 $contact = $_POST['contact'];
		 $address = $_POST['address'];
		 $photo = $_FILES['photo']['name'];
		 $gender = $_POST['gender'];
		 $addresstype = $_POST['addresstype'];
		 $birthday = $_POST['birthday'];



		if(($password == $user['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($curr_password, PASSWORD_DEFAULT);
			}

			try{
				$stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, firstname=:firstname, lastname=:lastname, contact_info=:contact, address=:address, photo=:photo,  gender=:gender, addresstype=:addresstype, birthday=:birthday  WHERE id=:id");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'contact'=>$contact, 'address'=>$address, 'photo'=>$filename , 'gender'=>$gender, 'addresstype'=>$addresstype, 'birthday'=>$birthday, 'id'=>$user['id']]);

				$_SESSION['success'] = 'Account updated successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	$pdo->close();

	header('location: index.php');

?>