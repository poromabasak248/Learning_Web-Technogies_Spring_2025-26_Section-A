<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Degree Form</title>
</head>
<body>

<form action="degree.php" method="post">
    <fieldset>
        <legend>DEGREE</legend>

        <input type="checkbox" name="degree[]" value="SSC"> SSC
        <input type="checkbox" name="degree[]" value="HSC"> HSC
        <input type="checkbox" name="degree[]" value="BSc"> BSc
        <input type="checkbox" name="degree[]" value="MSc"> MSc

        <br><br>
        <hr>
        <input type="submit" value="submit">
    </fieldset>
</form>

</body>
</html>

<?php
if($_POST){
    if(isset($_POST['degree'])){
        echo "Selected Degrees: <br>";
        foreach($_POST['degree'] as $d){
            echo $d . "<br>";
        }
    } else {
        echo "No degree selected";
    }

 
}
?>