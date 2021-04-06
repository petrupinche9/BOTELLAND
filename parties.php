<?php
require_once "config.php";

$result = "SELECT * from botellon";

if(mysqli_num_rows($result)){
    echo '{"testData":[';

    $first = true;
    $row=mysqli_fetch_assoc($result);
    while($row=mysqli_fetch_row($result)){
        //  cast results to specific data types

        if($first) {
            $first = false;
        } else {
            echo ',';
        }
        echo json_encode($row);
    }
    echo ']}';
} else {
    echo '[]';
}

?>