<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender Form</title>
</head>
<body>

<form method="post">
    <fieldset>
        <legend>GENDER</legend>

        <input type="radio" name="gender" value="Male"
        <?php if(($_POST['gender'] ?? '')=="Male") echo "checked"; ?>> Male

        <input type="radio" name="gender" value="Female"
        <?php if(($_POST['gender'] ?? '')=="Female") echo "checked"; ?>> Female

        <input type="radio" name="gender" value="Other"
        <?php if(($_POST['gender'] ?? '')=="Other") echo "checked"; ?>> Other

        <br><br>
        <input type="submit" value="submit">
    </fieldset>
</form>

</body>
</html>

<?php
if($_POST){
    echo "Gender: ".$_POST['gender'];
}
?>