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
 $id=$_SESSION['did'];
  $selectSQL = "SELECT d.name,d.email,d.phone,did,department,disignation,specialize,h.name as hname,hs.location FROM `hospital` as h, `doctor` as d,`hos_location` as hs WHERE h.hid=hs.hid and d.did='".$id."' and d.hid=h.hid";
 # Execute the SELECT Query
  if( !( $selectRes = mysqli_query( $conn,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  } 
  else{
    ?>
<html>
<head>
<title>Doctor Details</title>
  <meta charset="utf-8">
 <link rel="shortcut icon" href="doctor.jpg" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
    <th scope="col">DOCTOR</th>
      <th scope="col">DID</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">DEPARTMENT</th>
      <th scope="col">SPECIALIZE</th>
      <th scope="col">DESIGNATION</th>
      <th scope="col">HOSPITAL NAME</th>
	  <th scope="col">ADDRESS</th>
      
      
	  
    </tr>
  </thead>
  <tbody>

    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['name']}</td><td>{$row['did']}</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['department']}</td><td>{$row['specialize']}</td><td>{$row['disignation']}</td><td>{$row['hname']}</td><td>{$row['location']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>
<?php
  }

?>

<hr>
<br><br><br><br><br><br>


</form>
</body>
</html>