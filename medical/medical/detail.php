<?php
session_start();
 # Init the MySQL Connection
 $host="localhost";
 $user="root";
 $password="";
 $error="";
 $db="medical_report";

 $conn=mysqli_connect($host,$user,$password,$db);

 # Prepare the SELECT Query
  $id=$_SESSION['pid'];
  $selectSQL = "SELECT * FROM `patient` WHERE pid='".$id."'";
 # Execute the SELECT Query
  if( !( $selectRes = mysqli_query( $conn,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  } 
  else{
    ?>
<html>
<head>
<title>Patient Deatils</title>
  <meta charset="utf-8">
 <link rel="shortcut icon" href="patient.png" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src=<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
  table{
    margin-top:150px; 
  }
	#b{
  border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
  width:100%;
}

#b:hover {
  cursor: pointer;
  background: #ffc107;
  color: #000;
}

a {
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: blue;
  font-size:large;
}

a:hover {
  color: red;
}
	</style>
 
</head>
<body>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">PID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
	  <th scope="col">DATE OF BIRTH</th>
	  <th scope="col">ADDRESS</th>
      <th scope="col">GENDER</th>
      <th scope="col">BLOOD GROUP</th>
      <th scope="col">AGE</th>
      
	  
    </tr>
  </thead>
  <tbody>

    <?php

      $selectRes = mysqli_query( $conn,$selectSQL );
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $fetch = mysqli_fetch_assoc( $selectRes ) ){
          $row=array();
          foreach($fetch as $product){
            $row[]=$product;
        }
          echo "<tr><td>{$row[0]}</td><td>{$row[2]}</td><td>{$row[3]}</td><td>{$row[4]}</td><td>{$row[6]}</td><td>{$row[5]}</td><td>{$row[7]}</td><td>{$row[8]}</td><td>{$row[9]}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>
<?php
  }

?>


<br><br><br><br><br><br>


  <a href="update.php"><button type="submit" class="btn btn-primary" id="b" name="btn" value="update" >UPDATE</button></a>


  <a href="index.php"><center>Dont want to update!</center></a><br>
</form>
</body>
</html>