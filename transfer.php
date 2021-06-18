<!DOCTYPE html>
  <html>
  <head>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<title></title>
  	<style type="text/css">
body{
    background-color: #abe9cd;
background-image: linear-gradient(315deg, #abe9cd 0%, #3eadcf 74%);

}
h1, h2, h3, h4, h5, h6 {
  font-family: Arial, Helvetica, sans-serif;
  color:#000066;
}
.button {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

  	</style>
  </head>
  <h1 style="text-align: center;">Transaction Page</h1>
  <body>
  	<div class="container">
		<div class="jumbotron">




<?php

$pdo = new PDO("mysql:host=localhost;dbname=bank_transaction;port=3306",'root','' );


	if(isset($_POST['name']) && (isset($_POST['id'])) && (isset($_POST['amt'])))
	{

	$stmt = $pdo->prepare("select balance from customers where id_no=:id;");
	$stmt->execute([':id' => $_POST['id']]); 
	$user = $stmt->fetch();
	if($user === false)
{
	
    echo '<script>alert("trd")</script>';
	header("location:index.php");
	return;
}


	$amt1=$user['balance'];
	$amt2=$_POST['amt'];
	$amt3=$amt1-$amt2;
	if($amt3<0)
	{
		echo '<script>alert("transrred")</script>';
		header("location:index.php");
		return;
	}

	$sql="update customers
		  set balance = :amt
		  where id_no= :id";
  	$stmt=$pdo->prepare($sql);
  	$stmt->execute(array(':amt' => $amt3,':id'=> $_POST['id']));
  	

  	$amt4=$_POST['name'];
  	$stmt = $pdo->prepare("select balance  from customers where name=:name;");
	$stmt->execute([':name' => $_POST['name']]); 
	$user1 = $stmt->fetch();
	if($user1 === false)
{
	
    echo '<script>alert("transferred")</script>';
	header("location:index.php");
}
	$amt5=$user1['balance'];
	$amt6=$_POST['amt'];
	$amt7=$amt5+$amt6;

	$sql="update customers
		  set balance = :amt
		  where name= :name";
  	$stmt=$pdo->prepare($sql);
  	$stmt->execute(array(':amt' => $amt7,':name'=> $_POST['name']));
  	if($stmt->rowCount() != 0)
  	{
  		echo '<script>alert("tsferred")</script>';
		header("location:index.php");
  	}

	  $sql="insert into history(id,name,amount) values (:id,:name,:amou)";

  	$stmt=$pdo->prepare($sql);
  	$stmt->execute(array(':id' =>$_POST["id"],':amou' => $_POST["amt"],':name'=> $_POST["name"]));
  	if($stmt->rowCount() != 0)
  	{
  		echo '<script>alert("tsferred")</script>';
		header("location:index.php");
  	}

      
  }


?>



<form method='post' style="text-align: center;">

<p style="margin-left: 0.2cm;">Sender id:<input type='text' name='id' style="margin-left: 3cm;" ></p>
<br>

<p> Recipient Name:<input type='text' name='name' style="margin-left:2cm;"></p>
<br>

<p>Transfer amount: <input type='text' name='amt' style="margin-left: 1.7cm;"></p>
<br>

<input type="Submit" name="submit" value="Transfer" class="button" onclick="alert('transfer completed successfully !!!')">

<a href="index.php" class="button" onclick="alert('transaction cancelled ')">cancel</a>
</form>
</div>
</div>
</body>
</html>
