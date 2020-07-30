<?php

function Createdb(){
	$servername="localhost";
	$username="root";
	$password="";
	$databasename="pet_shop_CodeReview11";

	$con=mysqli_connect($servername,$username,$password);

	if(!$con){
		die("Connection Failed:".mysqli_connect_error());
	}

	$sql="CREATE DATABASE IF NOT EXISTS $databasename";

	if(mysqli_query($con,$sql)){

		$con=mysqli_connect($servername,$username,$password,$databasename);

		$sql="
		CREATE TABLE IF NOT EXISTS Pet_shop(
					Pet_ID INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(50),
					image VARCHAR(200),
					age INT(20),
					description VARCHAR(100),
					type VARCHAR(25),
					address VARCHAR(100),
					zip_code INT(11),
					city VARCHAR(50),
					hobbies VARCHAR(50),
					price INT(11)

			)";

		





		if(mysqli_query($con,$sql)){

			return $con;
		}else{

			echo "Cannot Create table:" .mysqli_error($con);
		}

				
	
	}else{
		echo "Error while creating database".mysqli_error($con);
	}
}


function CreatedbUser(){
	$servername="localhost";
	$username="root";
	$password="";
	$databasename="pet_shop_CodeReview11";

	$con=mysqli_connect($servername,$username,$password);

	if(!$con){
		die("Connection Failed:".mysqli_connect_error());
	}

	$sql="CREATE DATABASE IF NOT EXISTS $databasename";

	if(mysqli_query($con,$sql)){

		$con=mysqli_connect($servername,$username,$password,$databasename);

		$sql="
		CREATE TABLE IF NOT EXISTS user(
					user_ID INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(50),
					passwort VARCHAR(50),
					email varchar(50),
					image varchar(200)
			)";

		
		/*if(mysqli_query($con,$sql)){

			$sql="INSERT INTO user(name,passwort, email, image)

				VALUES('admin','admin','admin@admin.at',null)";

				if(mysqli_query($GLOBALS['con'],$sql)){
					//TextNode("success","Record Successfully Inserted...!");
					
				}else{
					echo "ERROR";
				}*/

			return $con;
		/*}else{

			echo "Cannot Create table:" .mysqli_error($con);
		}*/

	}else{
		echo "Error while creating database".mysqli_error($con);
	}
}

