<?php
session_start();
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
<title>Insert Details</title>
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
  .back-button{
  border: 1px solid red;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  margin-top: 20px;
  margin-left: 80%;
  width: 100px;
}
.back-button:hover {
  cursor: pointer;
  background: #ffc107;
  color: #000;
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

#enter{
    margin-top:80px;
    margin-left:580px;
}

</style>
 
</head>
<body>

<form method="post">

<select class="mdb-select md-form colorful-select dropdown-primary" name="enter" id="enter" required>
<option value=" ">Enter Patient Documents Of</option>
  <option value="TEST">Test</option>
  <option value="REPORT">Report</option>
 </select>
 <br><br>
 <input type="submit" class="btn btn-primary" id="b" name="btn" value="ENTER" >
 </form>
 <a href="hindex.php"><button type="button" class="back-button">Go Back</button></a>
 <?php
   if(isset($_POST['btn']))
   {
        $select=$_POST['enter'];
         if($select=='TEST')
   {
     ?>
    <h2><center>ENTER <?php echo $select; ?></center></h2><br>
<form id='a'  method='POST'>
  <div class='form-row'>
  <div class="form-group col-md-6">
                  <label>Patient ID</label>
                  <input type="text" class="form-control" id="pid" name="pid" placeholder="Enter PID..." required>
              </div>
    <div class='form-group col-md-6'>
      <label >Doctor ID</label>
      <input type='text' class='form-control' id='did' name='did' placeholder='Enter Doctor ID...' required>
    </div>
    <div class='form-group col-md-6'>
      <label>Test Type</label>
      <input type='text' class='form-control' id='typ' name='typ' placeholder='Enter test type...' required>
    </div>
    <div class='form-group col-md-6'>
    <label >Test Name</label>
    <input type='text' class='form-control' id='tnm' name='tnm' placeholder='Enter test name...' required>
  </div>
  
  <div class='form-group col-md-6'>
    <label>Test Description</label>
    <input type='text' class='form-control' id='tds' name='tds' placeholder='Test Description...' required>
  </div>
  <div class='form-group col-md-6'>
    <label>Date</label>
    <input type='text' class='form-control' id='dt' name='dt' placeholder='yyyy-mm-dd' required>
  </div>
  </div>
  <input type='submit' class='btn btn-primary' id='b' name='up1' value='UPLOAD' >
  </form>
<?php 
}
if( $select=='REPORT')
  {
    ?>
        <h2><center>ENTER <?php echo $select;?></center></h2><br>
    <form id='a'  method='POST'>
      <div class='form-row'>
      <div class="form-group col-md-6">
            <label>Patient ID</label>
            <input type="text" class="form-control" id="pid" name="pid" placeholder="Enter PID..." required>
        </div>
        <div class='form-group col-md-6'>
          <label >Doctor ID</label>
          <input type='text' class='form-control' id='did' name='did' placeholder='Enter Doctor ID...' required>
        </div>
        <div class='form-group col-md-6'>
          <label>Report Type</label>
          <input type='text' class='form-control' id='typ' name='typ' placeholder='Enter report type...' required>
        </div>
        <div class='form-group col-md-6'>
        <label >Report Name</label>
        <input type='text' class='form-control' id='tnm' name='tnm' placeholder='Enter report name...' required>
      </div>
      
      <div class='form-group col-md-6'>
        <label>Report Description</label>
        <input type='text' class='form-control' id='tds' name='tds' placeholder='Report Description...' required>
      </div>
      <div class='form-group col-md-6'>
        <label>Date</label>
        <input type='text' class='form-control' id='dt' name='dt' placeholder='yyyy-mm-dd' required>
      </div>
      </div>
      <input type='submit' class='btn btn-primary' id='b' name='up2' value='UPLOAD' >
      </form>
     
      <?php 
  } 

}
    ?>
    

  
</body>
</html>

<?php
if(isset($_POST['up1']))
{
  
  if(!empty($_POST['pid']) && !empty($_POST['did']) && !empty($_POST['typ']) && !empty($_POST['tnm']) && !empty($_POST['tds'])&& !empty($_POST['dt']))
  {
      
          $n= $_POST['pid'];
          $e= $_POST['did'];
          $pa= $_POST['typ'];
          $a=$_POST['tnm'];
          $p=$_POST['tds'];
          $pho=$_POST['dt'];
          $sq="INSERT INTO test (test_type,test_name,test_description,pid,did,date) VALUES ('$pa','$a','$p','$n','$e','$pho')";
          $res=$conn->query($sq);
          if(!$res)
          {
            echo "<SCRIPT> //not showing me this
            alert('Does not Upload!')
            </SCRIPT>";
          }
          else
          {

            echo "<SCRIPT> //not showing me this
            alert('Test Uploaded Successfully!')
            </SCRIPT>";
              
          }
  }
}
if(isset($_POST['up2']))
{
  
  if(!empty($_POST['pid']) && !empty($_POST['did']) && !empty($_POST['typ']) && !empty($_POST['tnm']) && !empty($_POST['tds'])&& !empty($_POST['dt']))
  {
      
          $n= $_POST['pid'];
          $e= $_POST['did'];
          $pa= $_POST['typ'];
          $a=$_POST['tnm'];
          $p=$_POST['tds'];
          $pho=$_POST['dt'];
          $sq="INSERT INTO report_paper(report_type,report_name,report_description,pid,did,date) VALUES ('$pa','$a','$p','$n','$e','$pho')";
          $res=$conn->query($sq);
          if(!$res)
          {

            echo "<SCRIPT> //not showing me this
            alert('Does not Upload!')
            </SCRIPT>";

          }
          else
          {

            echo "<SCRIPT> //not showing me this
            alert('Report Uploaded Successfully!')
            </SCRIPT>";
          }
  }
}

?>
