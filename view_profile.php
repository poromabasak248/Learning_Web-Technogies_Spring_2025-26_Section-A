<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['logged_in'];
$user = $_SESSION['users'][$username];
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

    .profile-pic {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      float: right;
    }

    .default-pic {
      width: 80px;
      height: 80px;
      background: gray;
      border-radius: 50%;
      float: right;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 40px;
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
      <a href="change_picture.php">Change Profile Picture</a>
      <a href="change_password.php">Change Password</a>
      <a href="logout.php">Logout</a>
    </div>

    <div class="content">
      <fieldset>
        <legend><b>PROFILE</b></legend>

        <?php if ($user['picture'] != "") { ?>
          <img src="<?php echo $user['picture']; ?>" class="profile-pic">
        <?php } else { ?>
          <div class="default-pic">&#128100;</div>
        <?php } ?>

        <table>
          <tr>
            <td>Name</td>
            <td>: <?php echo $user['name']; ?></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td>Email</td>
            <td>: <?php echo $user['email']; ?></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td>Gender</td>
            <td>: <?php echo $user['gender']; ?></td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td>Date of Birth</td>
            <td>: <?php echo $user['dob']; ?>
              &nbsp;&nbsp; <a href="change_picture.php">Change</a>
            </td>
          </tr>
          <tr><td colspan="2"><hr class="line"></td></tr>

          <tr>
            <td colspan="2"><a href="edit_profile.php">Edit Profile</a></td>
          </tr>
        </table>

      </fieldset>
    </div>

  </div>

  <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>