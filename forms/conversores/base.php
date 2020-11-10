<?php

$numero=substr($_POST['op1'], 0, strpos($_POST['op1'], '/'));
$base=substr($_POST['op1'], strpos($_POST['op1'], '/')+1);

echo "Numero ".$numero." en base ".$base." = ".base_convert($numero, $base, intval($_POST['op2']))." en base ".$_POST['op2'];
?>