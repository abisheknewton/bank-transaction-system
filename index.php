<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMERS</title>
    <style>
        
* {
  box-sizing: border-box;
}
body{
    background-color: #abe9cd;
background-image: linear-gradient(315deg, #abe9cd 0%, #3eadcf 74%);

        }
table {
  border-spacing: 0px;
  border-collapse: collapse;
  width: 100%;
  max-width: 100%;
  margin-top:1cm;
  background-color: transparent; /* Change the background-color of table here */
  text-align: left; /* Change the text-alignment of table here */
}

th {
  font-weight: bold;
  border: 1px solid #cccccc; /* Change the border-color of heading here */
  padding: 8px;
}

td {
  border: 1px solid #cccccc; /* Change the border-color of cells here */
  padding: 8px;
}

/* Stylized */

/* Adding Striped Effect for odd rows */

tr {
  background-color: transparent; /* Change the default background-color of rows here */
}

tr:nth-of-type(2n+1) {
  background-color: #eeeeee; /* Change the background-color of odd rows here */
}

tr th {
  background-color: #dddddd; /* Change the background-color of heading here */
}

/* Adding Hover Effect for rows */

tr {
  -moz-transition: background-color 300ms ease-in-out 0s;
  -ms-transition: background-color 300ms ease-in-out 0s;
  -o-transition: background-color 300ms ease-in-out 0s;
  -webkit-transition: background-color 300ms ease-in-out 0s;
  transition: background-color 300ms ease-in-out 0s;
}

tr:hover {
  background-color: #fff176; /* Change the hover background-color of rows here */
}

/* Removing left and right border of rows for modern UIs */

tr {
  border-top: 1px solid #cccccc;
  border-bottom: 1px solid #cccccc;
}

th, td {
  border: none;
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


a{
    margin-top:2cm;
    
}
    </style>
</head>
<body>
    <h1 style="margin-top:2cm;">
        Customers
    </h1>
<table>
    
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="bank_transaction";



$conn = mysqli_connect($servername, $username, $password,$db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM customers";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<thead><th>id No</th> <th>Customer Name</th> <th> Account balance</th> </thead>";
    while($row = $result->fetch_assoc()) {

    echo "<tbody><tr>"."<td>". $row["id_no"]."</td>"."<td>". $row["name"]."</td>"."<td>". $row["balance"]."</td>". "</tr></tbody>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

    ?>


</table>
    <a style="margin-left:12cm;" href="transfer.php" class="button">Make Transaction</a>

    <a style="margin-left:5cm;" href="history.php" class="button">transaction history</a>

</body>
</html>
