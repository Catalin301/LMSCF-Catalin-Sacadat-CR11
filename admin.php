<?php
require_once("database.php");
require_once("component.php");

$con=Createdb();

if(isset($_POST['create'])){
	createData();
}

if(isset($_POST['update'])){
	UpdateData();
}

if(isset($_POST['delete'])){
	deleteRecord();
}


function createData(){

	$P_name=textboxValue("name");
	$P_image=textboxValue("image");
	$P_age=textboxValue("age");
	$P_description=textboxValue("description");
	$P_type=textboxValue("type");
	$P_address=textboxValue("address");
	$P_zip_code=textboxValue("zip_code");
	$P_city=textboxValue("city");
	$P_hobbies=textboxValue("hobbies");
	$P_price=textboxValue("price");

	if($P_name && $P_image && $P_age && $P_description && $P_type && $P_address && $P_zip_code && $P_city && $P_hobbies && $P_price){

		$sql="INSERT INTO pet_shop(name,image,age,description,type,address,zip_code,city,hobbies,price)

				VALUES('$P_name','$P_image','$P_age','$P_description','$P_type','$P_address','$P_zip_code','$P_city','$P_hobbies','$P_price')";

	if(mysqli_query($GLOBALS['con'],$sql)){
		TextNode("success","Record Successfully Inserted...!");
		
	}else{
		echo "ERROR";
	}

	}else{
		TextNode("error","Every Textbox has to have Data");
	}
}

function textboxValue($value){
	$textbox=mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));

	if(empty($textbox)){
		return false;
	}else{
		return $textbox;
	}
}

function TextNode($classname,$msg){
	$element="<h6 class='$classname'>$msg</h6>";

	echo "$element";
}

function getData(){
	$sql="SELECT * FROM pet_shop";

	$result=mysqli_query($GLOBALS['con'],$sql);

	if(mysqli_num_rows($result)>0){
		return $result;
	}
}

function UpdateData(){
	$pet_id=textboxValue("Pet_ID");
	$pet_name=textboxValue("name");
	$pet_image=textboxValue("image");
	$pet_age=textboxValue("age");
	$pet_shortd=textboxValue("description");
	$pet_type=textboxValue("type");
	$pet_address=textboxValue("address");
	$pet_zip=textboxValue("zip_code");
	$pet_city=textboxValue("city");
	$pet_hobbies=textboxValue("hobbies");
	$pet_price=textboxValue("price");


	if($pet_name && $pet_image && $pet_age && $pet_shortd && $pet_type && $pet_address && $pet_zip && $pet_city && $pet_hobbies && $pet_price){

		$sql="
			UPDATE pet_shop SET	name ='$pet_name', 
								          image ='$pet_image',
								          age  ='$pet_age',
								          description ='$pet_shortd',
								          type='$pet_type',
								          address='$pet_address',
								          zip_code='$pet_zip',
								          city='$pet_city',
								          hobbies='$pet_hobbies', 
								          price='$pet_price' WHERE Pet_ID='$pet_id';
		";
		if(mysqli_query($GLOBALS['con'],$sql)){
			TextNode("success","Data Successfully Updated");
		}else{
			TextNode("error","Unable to Update Data");
		}

	}else{
			TextNode("error","Select Data Using Edit Icon");
	}
}

function deleteRecord(){
	$media_id=(int)textboxValue("Pet_ID");

	$sql="DELETE FROM pet_shop WHERE Pet_ID = $pet_id";

	if(mysqli_query($GLOBALS['con'],$sql)){
		TextNode("success","Record Deleted");
	}else{
		TextNode("error","Unable to delete Record");
	}

}

function setID(){
	$getid = getData();
	$id=0;
	if($getid){
		while($row=mysqli_fetch_assoc($getid)){
		$id=$row['Pet_ID'];	
		}
	}
	return($id + 1);
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    

    <link rel="stylesheet" href="style.css">

    <title>Code-Review-11</title>
  </head>
  <body>




	<div class="bg-imgA">
  		<div class="container">
    		<div class="topnav">
      			<a href="indexadmin.php">Home</a>
      			<a href="admin.php">Admin</a>
      			<a href="login.php">LogOut</a>
    		</div>
  		</div>
	

    <main>
        <div class="d-flex justify-content-center ">
          <form action="" method="post" class="w-50" >
            <div class="pt-2">
              <?php inputElement("<i class='fas fa-id-badge'></i>","ID","Pet_ID",setID());?>
            </div>
            <div class="pt-2">
              <?php inputElement("<i class='fas fa-book'></i>","Name","name","");?>
            </div>
            <div class="pt-2">
              <?php inputElement("<i class='fas fa-image'></i>","Image","image","");?>
            </div>
            <div class="pt-2">
              <?php inputElement("<i class='fas fa-code'></i>","Age","age","");?>
            </div>
            <div class="pt-2">
              <?php inputElement("<i class='fas fa-align-justify'></i>","description","description","");?>
            </div>
         
            <div class="row pt-2">
              <div class="col">
                <?php inputElement("<i class='fas fa-user-secret'></i>","Type","type","");?>
              </div>
              <div class="col">
                <?php inputElement("<i class='fas fa-users'></i>","Address","address","");?>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <?php inputElement("<i class='fa fa-gg'></i>","Zip-Code","zip_code","");?>
              </div>
              <div class="col">
                <?php inputElement("<i class='fab fa-old-republic'></i>","City","city","");?>
              </div>
            </div>

              <div class="row">
              <div class="col">
                <?php inputElement("<i class='far fa-calendar-alt'></i>","Hobbies","hobbies","");?>
              </div>
              <div class="col">
                <?php inputElement("<i class='fab fa-old-republic'></i>","Price","price","");?>
              </div>
            </div>

            <div class="d-flex justify-content-center">

              <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create' "); ?>

              <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read' "); ?>

              <?php buttonElement("btn-update","btn btn-ligth border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update' "); ?>

              <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete' "); ?>
            
            </div>
          </form>
        </div>


        <div class="d-flex justify-content-center table-data">
          <table class="table table-striped table-dark">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Age</th>
                <th>description</th>
                <th>Type</th>
                <th>Address</th>
                <th>Zip-Code</th>
                <th>City</th>
                <th>Hobbies</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody id="tbody">
          <?php
          
          if(isset($_POST['read'])){
                $result=getData();

              if($result){
                while($row=mysqli_fetch_assoc($result)){?>

              <tr>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['Pet_ID'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['name'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><img id="img-admin" src="<?php echo $row['image'];?>"></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['age'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['description'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['type'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['address'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['zip_code'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['city'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['hobbies'];?></td>
                <td data-id="<?php echo $row['Pet_ID'];?>"><?php echo $row['price'];?></td>

                <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['Pet_ID'];?>"></i></td>
              </tr>

            <?php
                }
              }
            }

            ?>
            </tbody>
          </table>
        </div>
    </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="./main.js"></script>

  </body>
</html>