<?php



$con = mysqli_connect("localhost","mahmoud","mahmoud.rabie","medics");
if(!$con) {
    die("not connected". mysqli_error($con) );
} else {
       //echo "database connected";
}

$user   = "mahmoud";
$db_name = 'medics';
$pass   = 'mahmoud.rabie';


$dsn= 'mysql:host=localhost;dbname='.$db_name.';charset=utf8';

try {
    $db = new PDO($dsn,$user,$pass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
echo "no connected".$e->getMessage();
die();
}
  


