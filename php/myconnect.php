<?php
$dbc=mysqli_connect('localhost','root','','tropical treats');
if(!$dbc){
    echo "connect fail!";
}
else{
    mysqli_set_charset($dbc,'utf8');
}