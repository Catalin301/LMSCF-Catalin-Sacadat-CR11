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

?>

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

	<div class="bg-img">
  		<div class="container">
    		<div class="topnav">
      			<a href="index.php">Home</a>
      			<a href="admin.php">Admin</a>
      			<a href="logout.php?logout">LogOut</a>
    		</div>
  		</div>
	</div>
<br>
<br>

<div class="container1 text-left row d-flex justify-content-space-around">
		<?php 
			if(!isset($_POST['read'])){
				
                $result=getData();
              if($result){
                while($row=mysqli_fetch_assoc($result)){?>
	
			<div class="col-lg-3 col-md-8 col-sm-12 m-3">
				<form action="index.php" method="post">
					<div class="card shadow">
						<div>
							<img id="pets"src="<?php echo $row['image'];?>" alt="image" class="img-fluid card-img-top">
						</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $row['name'];?></h5>
						
							<p class="card-text">
								<?php echo $row['description'];?>
							</p>
							<h5>
								<span class="location"><?php echo $row['address'];?></span>
								<br>
								<br>
								<span class="age">Age: <?php echo $row['age'];?></span>
								<br>
								<br>
								<span class="hobbies">Hobbies: <?php echo $row['hobbies'];?></span>
								<br>
								<br>
								<span class="type">Type: <?php echo $row['type'];?></span>
								<br>
								<br>
								<span class="price">Price: <?php echo $row['price'];?>€</span>
								<br>
							</h5>
							
							<button type="submit" class="btn btn-warning my-3" name="add">Adopt</button>
						</div>
					</div>
				</form>
			</div>
					<?php
                			}
              			}
            		}
          			?>
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
    
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

    <script src="./main.js"></script>

  </body>
</html>