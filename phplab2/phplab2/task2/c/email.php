<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="email.php" method="post">
        <fieldset>
            <legend>EMAIL</legend>

            <input type="email" name="email" 
            value="<?php echo $_POST['email'] ?? ''; ?>"> 
            
            <br><br>

            <input type="submit" value="submit">

        </fieldset>
    </form>

</body>
</html>


<?php
if($_POST){
    echo "Email: ".$_POST['email'];
}
?>

