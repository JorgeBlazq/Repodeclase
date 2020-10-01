<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204";

//JORGE BLAZQUEZ



$ip0=substr($ip, 0,(strpos($ip, ".")));

$ip1=substr($ip, strpos($ip, ".")+1, strpos(substr($ip, strpos($ip, ".")+1), "."));

$ip2=substr($ip, strpos($ip, ".", strpos($ip, ".")+1)+1, strpos(substr($ip, strpos($ip, ".", strpos($ip, ".")+1)+1), "."));

$ip3=substr($ip, strpos($ip, ".", strpos($ip, ".", strpos($ip, ".")+1)+1)+1);


printf('La ip '.$ip.' en binario es: %08b.%08b.%08b.%08b', $ip0, $ip1, $ip2, $ip3);
/*
echo "La ip ".$ip." en binario es: ";
printf('%08b',$ip0);
echo ".";
printf('%08b',$ip1);
echo ".";
printf('%08b',$ip2);
echo ".";
printf('%08b',$ip3);
*/
?>
</BODY>
</HTML>