<?php
session_start();

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $found = false;
    foreach ($_SESSION['users'] as $u) {
        if ($u['email'] == $email) {
            $found = true;
            $success = "Your password is: " . $u['password'];
            break;
        }
    }

    if (!$found) {
        $error = "This email does not exist!";
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

    .success {
      color: green;
      margin-bottom: 10px;
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
    <?php if ($success != "") { echo "<p class='success'>$success</p>"; } ?>

    <fieldset style="width: 350px;">
      <legend><b>FORGOT PASSWORD</b></legend>
      <form action="forgot_password.php" method="POST">
        <table>
          <tr>
            <td>Enter Email</td>
            <td>: <input type="email" name="email"></td>
          </tr>
          <tr>
            <td colspan="2">
              <br>
              <button type="submit">Submit</button>
            </td>
          </tr>
        </table>
      </form>
    </fieldset>

  </div>

  <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>