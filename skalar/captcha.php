<?php 

require "class/captcha_class.php"; 

$captcha = new Captcha();

$_SESSION['keystring'] = $captcha->getKeyString();

echo $captcha->draw();

?>