<html>
<head>
<title>Home Page</title>
<meta charset="utf-8">
 <link rel="shortcut icon" href="panel.png" type="image/x-icon">
<style>
body {
  margin-top:250px ;
  margin-left: 250px;
  padding:50px;
  background-repeat:no-repeat;
  font-family: sans-serif;
  background-size:100% 100%;
  background-image: url('b.jpg');
}
.login-box a input[type="submit"] {
  border: none;
  outline: none;
  width:250px;
  height: 60px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
 

}

.login-box input[value="PATIENT"]:hover {
  
  cursor: pointer;
  background: #205BE5;
  color: #000;
}
.login-box input[value="DOCTOR"]:hover {
  
  cursor: pointer;
  background: #ffc107;
  color: #000;
}
.login-box input[value="ADMIN"]:hover {
  
  cursor: pointer;
  background: #1C9D29;;
  color: #000;
}
.aa{
  margin-top:50px;
  margin-left: 340px;
}
.dot {
  height: 25px;
  width: 25px;
  background-color: #205BE5;
  border-radius: 50%;
  display: inline-block;
}
.dot1 {
  height: 25px;
  width: 25px;
  background-color:#FEFE01;
  border-radius: 50%;
  display: inline-block; 
}
.dot2 {
  height: 25px;
  width: 25px;
  background-color: #1C9D29;
  border-radius: 50%;
  display: inline-block; 
}

h1{
  margin-left:60px;
  font-weight:900;
  
}
</style>
</head>
<body>
<h1 >Medical Report Management System</h1>
<div class="login-box">
  <a href="login.php"><input type="submit" value="PATIENT"></a> 
  <a href="dlogin.php"><input type="submit" value="DOCTOR"></a>
  <a href="hlogin.php"><input type="submit" value="ADMIN"> </a>
<div class="aa">
  <span class="dot"></span>
  <span class="dot1"></span>
  <span class="dot2"></span>
</div>
</body>
</html>