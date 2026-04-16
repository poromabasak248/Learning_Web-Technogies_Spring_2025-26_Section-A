<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOB Form</title>
</head>
<body>

<form action="dob.php" method="post">
    <fieldset>
        <legend>DATE OF BIRTH</legend>

        DD: <input type="text" name="dd" value="<?php echo $_POST['dd'] ?? ''; ?>">
        MM: <input type="text" name="mm" value="<?php echo $_POST['mm'] ?? ''; ?>">
        YYYY: <input type="text" name="yy" value="<?php echo $_POST['yy'] ?? ''; ?>">

        <br><br>
        <input type="submit" value="submit">
    </fieldset>
</form>

</body>
</html>

<?php
if($_POST){
    echo "Date of Birth: ".$_POST['dd']."-".$_POST['mm']."-".$_POST['yy'];
}
?>