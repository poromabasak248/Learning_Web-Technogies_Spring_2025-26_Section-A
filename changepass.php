<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['logged_in'];
$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $current = $_POST['current'];
    $new_pass = $_POST['new_pass'];
    $retype = $_POST['retype'];

    if ($_SESSION['users'][$username]['password'] != $current) {
        $error = "Current password is wrong!";
    }
    elseif ($new_pass != $retype) {
        $error = "New passwords do not match!";
    }
    elseif (empty($new_pass)) {
        $error = "New password cannot be empty!";
    }
    else {
        $_SESSION['users'][$username]['password'] = $new_pass;
        $success = "Password changed successfully!";
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

    .footer {
      text-align: center;
      padding: 10px;
      border-top: 1px solid;
      color: gray;
    }

    .main {
      display: flex;
    }

    .sidebar {
      width: 200px;
      border-right: 1px solid;
      padding: 20px;
    }

    .sidebar h4 {
      margin-bottom: 10px;
    }

    .sidebar a {
      display: block;
      color: purple;
      margin-bottom: 6px;
    }

    .content {
      padding: 30px;
      flex: 1;
    }

    table td {
      padding: 6px 4px;
    }

    .line {
      border: none;
      border-top: 1px solid #ddd;
      margin: 2px 0;
    }

    input[type="password"] {
      width: 160px;
      padding: 3px;
      border: 1px solid #aaa;
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
      Logged in as <a href="view_profile.php"><?php echo $username; ?></a> |
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <div class="main">

    <div class="sidebar">
      <h4>Account</h4>
      <hr>
      <a href="dashboard.php">Dashboard</a>
      <a href="view_profile.php">View Profile</a>
      <a href="edit_profile.php">Edit Profile</a>
      <a href="changepic.php">Change Profile Picture</a>
      <a href="changepass.php">Change Password</a>
      <a href="logout.php">Logout</a>
    </div>

    <div class="content">

      <?php if ($error != "") { echo "<p class='error'>$error</p>"; } ?>
      <?php if ($success != "") { echo "<p class='success'>$success</p>"; } ?>

      <fieldset style="width: 380px;">
        <legend><b>CHANGE PASSWORD</b></legend>

        <form action="changepass.php" method="POST">
          <table>

            <tr>
              <td>Current Password</td>
              <td>: <input type="password" name="current"></td>
            </tr>
            <tr><td colspan="2"><hr class="line"></td></tr>

            <tr>
              <td style="color: green;">New Password</td>
              <td>: <input type="password" name="new_pass"></td>
            </tr>
            <tr><td colspan="2"><hr class="line"></td></tr>

            <tr>
              <td style="color: red;">Retype New Password</td>
              <td>: <input type="password" name="retype"></td>
            </tr>
            <tr><td colspan="2"><hr class="line"></td></tr>

            <tr>
              <td colspan="2">
                <button type="submit">Submit</button>
              </td>
            </tr>

          </table>
        </form>
      </fieldset>

    </div>
  </div>

  <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>