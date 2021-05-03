<?php

 # Init the MySQL Connection
 $host="localhost";
 $user="root";
 $password="";
 $error="";
 $db="medical_report";

 $conn=mysqli_connect($host,$user,$password,$db);
 if(!$conn)
    {
        echo mysqli_error_list();
    }
     ?>
<html>
<head>
<title>Hospital Details</title>
  <meta charset="utf-8">
 <link rel="shortcut icon" href="hospital.png" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
  table{
    margin-top:80px;
  }
	#b{
  border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
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
#search{
    margin-top:100px;
    margin-left:580px;
}

.back-button{
  border: 1px solid red;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  margin-top: 20px;
  width: 100px;
  margin-left: 80%;
}
.back-button:hover {
  cursor: pointer;
  background: #ffc107;
  color: #000;
}


</style>
 
</head>
<body>
<form method="post">
<select class="mdb-select md-form colorful-select dropdown-primary" name="search" id="search">
<option value=" ">Search Hospital By</option>
  <option value="Name">Hospital Name</option>
  <option value="Location">Hospital Location</option>
 </select>
 <br><br>
 <div class="input-group md-form form-sm form-1 pl-0">
  <div class="input-group-prepend">
    <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
        aria-hidden="true"></i></span>
  </div>
  <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search" name="sos" required>
</div><br>
<input type="submit" class="btn btn-primary" id="b" name="btn" value="Search" >

</form>
<a href="index.php"><button type="button" class="back-button">Go Back</button></a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">HID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
	  <th scope="col">ADDRESS</th>
      
	  
    </tr>
  </thead>
  <tbody>
  <?php
    if(isset($_POST['btn']))
     {
        $selected = $_POST['search'];

       if($selected=="Name")
         {
            
            $var=$_POST['sos'];
          $sql="SELECT h.hid,h.name,h.email,h.phone,hs.location FROM `hospital` as h,`hos_location` as hs WHERE h.hid = hs.hid and h.name like '%$var%'";
          $selectRes=mysqli_query($conn,$sql);
          if( mysqli_num_rows( $selectRes )==0 )
          {
              echo '<tr><td colspan="4">No Rows Returned</td></tr>';
          }
          else{
              while( $row = mysqli_fetch_assoc( $selectRes ) )
              {
                echo "<tr><td>{$row['hid']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['location']}</td></tr>\n";
              }
        }
    }
        else
        {
            $var=$_POST['sos'];
            $sql="SELECT h.hid,h.name,h.email,h.phone,hs.location FROM `hospital` as h,`hos_location` as hs WHERE h.hid = hs.hid and hs.location like '%$var%'";
            $selectRes=mysqli_query($conn,$sql);
            if( mysqli_num_rows( $selectRes )==0 ){
                echo '<tr><td colspan="4">No Rows Returned</td></tr>';
            }
            else{
                while( $row = mysqli_fetch_assoc( $selectRes ) )
                {
                  echo "<tr><td>{$row['hid']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['location']}</td></tr>\n";
                }
            }
        
        }
       
    }
?>
  </tbody>
  </table>
</body>
</html>
