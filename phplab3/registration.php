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
    <form action="">
        <fieldset>
            <legend>RESISTRATION</legend>
            <tr>
                <td>Name</td>
                <td>:<input type="text"></td>
                <hr>
            </tr>

            <tr>
                <td>Email</td>
                <td>:<input type="email"></td>
                <hr>
            </tr>

            <tr align="right">
                <td>User Name</td>
                <td>:<input type="text"></td>
                <hr>
            </tr>

            <tr>
                <td>Password</td>
                <td>:<input type="password"></td>
                <hr>
            </tr>



        </fieldset>
    </form>
  </div>

 
  <div class="footer">
    Copyright @ 2017
  </div>

</div>

</body>
</html>