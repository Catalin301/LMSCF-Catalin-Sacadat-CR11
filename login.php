<?php
	ob_start();
	session_start();
	require_once("./database.php");

	$con=Createdb();


function getData(){
	$sql="SELECT * FROM pet_shop";

	$result=mysqli_query($GLOBALS['con'],$sql);

	if(mysqli_num_rows($result)>0){
		return $result;
	}
}


if( isset($_SESSION['user'])!="" ){
 header("Location: index.php" ); // redirects to home.php
}
include_once 'database.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $sql = "SELECT email FROM user WHERE email='$email'";
  $result = mysqli_query($con, $sql);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if( !$error ) {
 
  $sql = "INSERT INTO user(name,passwort,email) VALUES('$name','$password','$email')";
  $res = mysqli_query($con, $sql);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }

}

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" && $_SESSION['user' ] == 1) {
 header("Location: indexadmin.php");
 exit;
} else if ( isset($_SESSION['user' ])!="" ) {
 header("Location: index.php");
 exit;
}  

$error = false;

if( isset($_POST['btn-login']) ) {


 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 

 if(empty($email)){
  $error = true;

 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }


 if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($con, "SELECT user_ID, name, passwort FROM user WHERE email='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 
  if( $count == 1 && $row['passwort' ]==$password && $email == "admin@admin.at") {
   $_SESSION['user'] = $row['user_ID'];

   header( "Location: indexadmin.php");
  } else if( $count == 1 && $row['passwort' ]==$password) {
   $_SESSION['user'] = $row['user_ID'];
   header( "Location: index.php");
  }else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}

?>

<!--SELECT * FROM pet_shop WHERE age >= 8

SELECT * FROM pet_shop WHERE age < 8 -->


<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-control" content="no-cache">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Code-Review-11</title>

  </head>
  	<body>

<div class="bg-imgL">      
<div class="logreg">
	<div>
    <div>
      <h2 class="hText">Adopt a pet! Save a life!</h2>
    </div>
		<div class="header">
			<h2>Login</h2>
		</div>
		
		<form id="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">

			   <?php
			  if ( isset($errMSG) ) {
					echo  $errMSG; ?>
			             
	            <?php
			  		}
			  	?>
			<div class="input-group">
				<label>Email</label>
				<input id="log_user" type="email" name="email" value="">
			</div>
		
			<div class="input-group">
				<label>Password</label>
				<input id="log_password"type="password" name="pass">
			</div>
			
			<div class="input-group">
				<button type="submit" name="btn-login" class="btnL" id="btnLog">Login</button>
			</div>
				<p>
					Not yet a member? <a href="login.php">Sign up</a>
				</p>
		</form>
	</div>
	<div>
		<div class="header">
			<h2>Register</h2>
		</div>
		
		<form id="form2" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off">

			    <?php
   					if ( isset($errMSG) ) {
 
   				?>
           <div  class="alert m-0 text-center alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       		</div>
       			<?php
  					}
  				?>
			<div class="input-group">
				<label>Username</label>
				<input id ="reg_user"type="name" name="name" value = "" maxlength ="50" >
			</div>

			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email"  value = "" maxlength = "40">
			</div>

			<div class="input-group">
				<label>Password</label>
				<input type="password" name="pass">
			</div>
				
			<div class="input-group">
				<button type="submit" name="btn-signup" class="btnR">Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	
	</div>
</div>
</div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
    
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

    <script src="./main.js"></script>

  </body>
</html>

<?php  ob_end_flush(); ?>