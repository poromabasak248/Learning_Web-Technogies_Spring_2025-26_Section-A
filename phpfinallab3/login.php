<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); 
    if (isset($_SESSION['users'][$username])) {

       
        if ($_SESSION['users'][$username]['password'] == $password) {

            $_SESSION['logged_in'] = $username;

           
            if ($remember) {
                setcookie('remember_user', $username, time() + (7 * 24 * 60 * 60));
            }

            
            header('Location: dashboard.php');
            exit();

        } else {
            $error = "Error Password";
        }

    } else {
        $error = "Username not found";
    }
}

if (isset($_COOKIE['remember_user'])) {
    $u = $_COOKIE['remember_user'];
    if (isset($_SESSION['users'][$u])) {
        $_SESSION['logged_in'] = $u;
        header('Location: dashboard.php');
        exit();
    }
}
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

    .error { 
        color: red; 
        margin-bottom: 10px; 
    }

    table { 
        width: 100%; 
    }
    td { 
        padding: 6px 4px; 
    }

   
  </style>
</head>
<body>

<div class="page">

  
  <div class="navbar">
    <p class="logo"><b><span>X</span> Company</b></p>
    <div class="links">
      <a href="home.php">Home</a> |
      <a href="login.php">Login</a> |
      <a href="registration.php">Registration</a>
    </div>
  </div>

  
  <div class="content">

    <?php if ($error != "") { echo "<p class='error'>$error</p>"; } ?>

    <fieldset style="width: 350px;">
      <legend><b>LOGIN</b></legend>

      <form action="login.php" method="POST">

        <table>

          <tr>
            <td>User Name</td>
            <td>: <input type="text" name="username"></td>
          </tr>
          <tr><td colspan="2"><hr></td></tr>

          <tr>
            <td>Password</td>
            <td>: <input type="password" name="password"></td>
          </tr>
          <tr><td colspan="2"><hr></td></tr>

          
          <tr>
            <td colspan="2">
              <input type="checkbox" name="remember"> Remember Me
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <button type="submit">Submit</button>
              <a href="forgot_password.php">Forgot Password?</a>
            </td>
          </tr>

        </table>

      </form>
    </fieldset>

  </div>

 
  <div class="footer">
    Copyright @ 2017
  </div>

</div>

</body>
</html>