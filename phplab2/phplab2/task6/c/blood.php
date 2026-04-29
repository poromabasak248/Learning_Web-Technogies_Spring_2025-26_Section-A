<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Group Form</title>
</head>
<body>

<form method="post">
    <fieldset>
        <legend>BLOOD GROUP</legend>

        <select name="blood">
            <option value="">not selected</option>

            <option value="A+"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="A+") echo "selected"; ?>>
            A+</option>

            <option value="A-"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="A-") echo "selected"; ?>>
            A-</option>

            <option value="B+"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="B+") echo "selected"; ?>>
            B+</option>

            <option value="B-"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="B-") echo "selected"; ?>>
            B-</option>

            <option value="AB+"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="AB+") echo "selected"; ?>>
            AB+</option>

            <option value="AB-"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="AB-") echo "selected"; ?>>
            AB-</option>

            <option value="O+"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="O+") echo "selected"; ?>>
            O+</option>

            <option value="O-"
            <?php if(isset($_POST['blood']) && $_POST['blood']=="O-") echo "selected"; ?>>
            O-</option>
        </select>

        <br><br>
        <input type="submit" value="submit">
    </fieldset>
</form>

<?php
if($_POST){
    echo "Blood Group: " . $_POST['blood'];
}
?>
</body>
</html>