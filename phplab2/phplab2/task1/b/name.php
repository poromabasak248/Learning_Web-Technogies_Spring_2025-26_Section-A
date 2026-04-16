<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <form action="name.php" method="post">
            <fieldset>
                <legend>NAME</legend>
                <input type="text" name="name" value=""> <br><br>
                <input type="submit" value="submit">
                

            </fieldset>
            
        </form>
    
</body>
</html>




<?php
if($_POST){

echo "Name: ".$_POST['name'];
}

?>
