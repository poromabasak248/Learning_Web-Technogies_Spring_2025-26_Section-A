<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>xCompany</title>
  <style>
    
    .page {
      width: 750px;
      margin: 30px auto;
      border: 1px solid;
      background: white;
    }

    
    .navbar {
      display: flex;
      justify-content: space-between;
      padding: 10px;    
      border-bottom: 1px solid;
    }

    .logo {
      font-size: 20px;
      color: black;
    }

    .logo span {
      color: green;
      font-weight: bold;
    }

    .links a {
      color: purple;   
      margin-left: 5px;
    }

   
    .content {
      padding: 40px;
     
    }

    
    .footer {
      text-align: center;
      padding: 10px;
      border-top: 1px solid;
      color: gray;

      
    }
  </style>
</head>
<body>

<div class="page">

  
  <div class="navbar">
    <p class="logo"><b><span>X</span> Company</b></p>
    <div class="links">
      <a href="index.php">Home</a> |
      <a href="login.php">Login</a> |
      <a href="register.php">Registration</a>
    </div>
  </div>


  <div class="content">
    <b>Welcome to xCompany</b>
  </div>

 
  <div class="footer">
    Copyright @ 2017
  </div>

</div>

</body>
</html>