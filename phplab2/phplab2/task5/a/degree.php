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