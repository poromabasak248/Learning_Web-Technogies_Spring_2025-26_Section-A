<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    header('Location: dashboard.php');
    exit();
}

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $gender = $_POST['gender'];
    $dd = $_POST['dd'];
    $mm = $_POST['mm'];
    $yyyy = $_POST['yyyy'];

    $dob = $dd . "/" . $mm . "/" . $yyyy;

    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($gender) || empty($dd) || empty($mm) || empty($yyyy)) {
        $error = "please, fill all the feild";
    }
    elseif ($password != $confirm) {
        $error = "Error Password";
    }
    elseif (isset($_SESSION['users'][$username])) {
        $error = " Username already exist!";
    }
    else {
        $_SESSION['users'][$username] = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'gender' => $gender,
            'dob' => $dob,
            'picture' => ''
        ];
        $success = "Registration Successful!";
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

    table {
      width: 100%;
    }

    td {
      padding: 6px 4px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 160px;
      padding: 3px;
      border: 1px solid #aaa;
    }

    .line {
      border: none;
      border-top: 1px solid #ddd;
      margin: 2px 0;
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

    <form action="registration.php" method="POST">
      <fieldset>
        <legend><b>REGISTRATION</b></legend>

        <table>

          <tr>
            <td>Name</td>
            <td>: <input type="text" name="name"></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td>Email</td>
            <td>: <input type="email" name="email"></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td>User Name</td>
            <td>: <input type="text" name="username"></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td>Password</td>
            <td>: <input type="password" name="password"></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td>Confirm Password</td>
            <td>: <input type="password" name="confirm"></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td colspan="2">
              <fieldset>
                <legend>Gender</legend>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
                <input type="radio" name="gender" value="Other"> Other
              </fieldset>
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <fieldset>
                <legend>Date of Birth</legend>
                <input type="text" name="dd" placeholder="dd" maxlength="2" style="width:35px"> /
                <input type="text" name="mm" placeholder="mm" maxlength="2" style="width:35px"> /
                <input type="text" name="yyyy" placeholder="yyyy" maxlength="4" style="width:50px">
                <i style="color:gray; font-size:12px;">(dd/mm/yyyy)</i>
              </fieldset>
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <button type="submit">Submit</button>
              <button type="reset">Reset</button>
            </td>
          </tr>

        </table>
      </fieldset>
    </form>

  </div>

  <div class="footer">
    Copyright @ 2017
  </div>

</div>

</body>
</html>