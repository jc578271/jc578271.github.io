<?php
function check_querry($result,$query)
{
    global  $dbc;
    if(!$result)
    {
        die("Query {$query} \n<br/> MYSQL Error:".mysqli_error($dbc));
    }
}

function is_name($str) {
    return (!preg_match("/^[a-zA-Z ]*$/", $str)) ? FALSE : TRUE;
}
?>
