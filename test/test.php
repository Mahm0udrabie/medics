<!DOCTYPE html>
<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

 
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
     echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
     echo "Cookie '" . $cookie_name . "' is set!<br>";
     echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<p><strong>Note:</strong> You might have to reload the page to see the value of the cookie.</p>

</body>
</html>




<?php
require_once '../init.php';


class Box {
  private $width = 10;

  public function setWidth() {
      $this->width = 10;
  }
  
  public function getWidth() {
       echo $this->width;
  }
  
}
class AplleDevice {
  public $type = "Iphone <br>";

}

$phone = new AplleDevice();

echo $phone->type;

$arrValues = array("Mahmoud", "m@er.com","12345");
$arrKeys   = array("username", "email", "password");

$compine   = array_combine($arrKeys, $arrValues);

print_r($compine);
echo "<br>";
?>


<form action='test.php' method ='post'>
<input type='text' name='key' >
<input type='text' name='value' >

<button type="submit">Insert</button>
<br>
<pre>
<?php

if(isset($_POST['key']) || isset($_POST['value'])){
$key = $_POST['key'];
$value = $_POST['value'];
$compine[$key] = $value;
}
print_r($compine); 



?>
</pre>