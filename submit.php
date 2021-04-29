<?php

$name= filter_input(INPUT_POST, 'name');
$email= filter_input(INPUT_POST, 'email');

if(!empty($name))
{
	if(!empty($email))
	{
		$host= "localhost";
		$dbusername= "root";
		$dbpassword= "";
		$dbname= "form";


		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

		if( mysqli_connect_error() )
		{
			die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
		}

		else
		{
			$sql= "INSERT INTO registration (name, email) values ('$name', '$email')";
			if($conn->query($sql))
			{
				echo "Submitted Successfully";
			}
			else
			{
				echo "Error: ".$sql. "<br>". $conn->error;
			}
			$conn->close();
		}



	}



	else
	{
		echo "email should not me empty";
		die();
	}
}
else
{
	"name should not be empty";
	die();
}

?>