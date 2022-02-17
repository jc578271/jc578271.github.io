<?php
$dbc=mysqli_connect('localhost','root','','tropical_treats');
if(!$dbc){
    echo "connect fail!";
}
else{
    mysqli_set_charset($dbc,'utf8');
}