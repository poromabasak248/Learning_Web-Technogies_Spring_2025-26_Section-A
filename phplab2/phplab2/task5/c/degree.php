<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Degree Form</title>
</head>
<body>

<form method="post">
    <fieldset>
        <legend>DEGREE</legend>

        <input type="checkbox" name="degree[]" value="SSC"
        <?php if(isset($_POST['degree']) && isset($_POST['degree'][0]) && $_POST['degree'][0]=="SSC") echo "checked"; ?>>
        SSC

        <input type="checkbox" name="degree[]" value="HSC"
        <?php if(isset($_POST['degree']) && isset($_POST['degree'][1]) && $_POST['degree'][1]=="HSC") echo "checked"; ?>>
        HSC

        <input type="checkbox" name="degree[]" value="BSc"
        <?php if(isset($_POST['degree']) && isset($_POST['degree'][2]) && $_POST['degree'][2]=="BSc") echo "checked"; ?>>
        BSc

        <input type="checkbox" name="degree[]" value="MSc"
        <?php if(isset($_POST['degree']) && isset($_POST['degree'][3]) && $_POST['degree'][3]=="MSc") echo "checked"; ?>>
        MSc

        <br><br>
        <hr>
        <input type="submit" value="submit">
    </fieldset>
</form>

<?php
if($_POST){
    if(isset($_POST['degree'])){
        echo "Selected Degrees: <br>";
        foreach($_POST['degree'] as $d){
            echo $d . "<br>";
        }
    } else {
        echo "<br>No degree selected";
    }

}
?>

</body>
</html>