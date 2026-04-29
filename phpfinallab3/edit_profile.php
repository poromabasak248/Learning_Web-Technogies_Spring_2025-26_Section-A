<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['logged_in'];
$user = $_SESSION['users'][$username];

$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $_SESSION['users'][$username]['name'] = $name;
    $_SESSION['users'][$username]['email'] = $email;
    $_SESSION['users'][$username]['gender'] = $gender;
    $_SESSION['users'][$username]['dob'] = $dob;

    $user = $_SESSION['users'][$username];
    $success = "Profile updated successfully!";
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

    input[type="text"],
    input[type="email"] {
      width: 160px;
      padding: 3px;
      border: 1px solid #aaa;
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
      <a href="change_picture.php">Change Profile Picture</a>
      <a href="change_password.php">Change Password</a>
      <a href="logout.php">Logout</a>
    </div>

    <div class="content">

      <?php if ($success != "") { echo "<p class='success'>$success</p>"; } ?>

      <fieldset>
        <legend><b>EDIT PROFILE</b></legend>

        <form action="edit_profile.php" method="POST">
          <table>

            <tr>
              <td>Name</td>
              <td>: <input type="text" name="name" value="<?php echo $user['name']; ?>"></td>
            </tr>
            <tr><td colspan="2"><hr class="line"></td></tr>

            <tr>
              <td>Email</td>
              <td>: <input type="email" name="email" value="<?php echo $user['email']; ?>"></td>
            </tr>
            <tr><td colspan="2"><hr class="line"></td></tr>

            <tr>
              <td>Gender</td>
              <td>:
                <input type="radio" name="gender" value="Male" <?php if ($user['gender'] == 'Male') echo 'checked'; ?>> Male
                <input type="radio" name="gender" value="Female" <?php if ($user['gender'] == 'Female') echo 'checked'; ?>> Female
                <input type="radio" name="gender" value="Other" <?php if ($user['gender'] == 'Other') echo 'checked'; ?>> Other
              </td>
            </tr>
            <tr><td colspan="2"><hr class="line"></td></tr>

            <tr>
              <td>Date of Birth</td>
              <td>: <input type="text" name="dob" value="<?php echo $user['dob']; ?>">
                <i style="color:gray; font-size:12px;">(dd/mm/yyyy)</i>
              </td>
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