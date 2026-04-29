<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['logged_in'];
$user = $_SESSION['users'][$username];

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_FILES['picture']['error'] == 0) {

        $file_name = $_FILES['picture']['name'];
        $file_tmp = $_FILES['picture']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($file_ext, $allowed)) {
            if (!is_dir('uploads')) {
                mkdir('uploads');
            }

            $new_name = $username . "_" . time() . "." . $file_ext;
            $destination = "uploads/" . $new_name;

            move_uploaded_file($file_tmp, $destination);

            $_SESSION['users'][$username]['picture'] = $destination;
            $user = $_SESSION['users'][$username];
            $success = "Profile picture updated!";
        } else {
            $error = "Only jpg, jpeg, png, gif allowed!";
        }
    } else {
        $error = "Please choose a file!";
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

    .success {
      color: green;
      margin-bottom: 10px;
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }

    .profile-pic {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
    }

    .default-pic {
      width: 100px;
      height: 100px;
      background: gray;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 50px;
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
      <a href="change_password.php">Change Password</a>
      <a href="logout.php">Logout</a>
    </div>

    <div class="content">

      <?php if ($success != "") { echo "<p class='success'>$success</p>"; } ?>
      <?php if ($error != "") { echo "<p class='error'>$error</p>"; } ?>

      <fieldset>
        <legend><b>PROFILE PICTURE</b></legend>

        <?php if ($user['picture'] != "") { ?>
          <img src="<?php echo $user['picture']; ?>" class="profile-pic">
        <?php } else { ?>
          <div class="default-pic">&#128100;</div>
        <?php } ?>

        <br><br>

        <form action="changepic.php" method="POST" enctype="multipart/form-data">
          <input type="file" name="picture">
          <hr>
          <br>
          <button type="submit">Submit</button>
        </form>

      </fieldset>
    </div>
  </div>

  <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>