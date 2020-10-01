<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204";

//JORGE BLAZQUEZ

/*
$ip0=printf('%b', $ip);
echo ".";
$ip1=printf('%b',substr($ip, (strpos($ip, ".")+1)));
echo ".";
$ip2=printf('%b',substr(substr($ip, (strpos($ip, ".")+1)), strpos(substr($ip, (strpos($ip, strpos($ip, ".")))), ".")));
echo ".";
$ip3=printf('%b',substr(substr(substr($ip, (strpos($ip, ".")+1)), strpos(substr($ip, (strpos($ip, strpos($ip, ".")))), ".")),strpos(substr($ip, (strpos($ip, strpos($ip, strpos($ip, "."))))), ".")));
*/





$ip0=substr($ip, 0,(strpos($ip, ".")));

$ip1=substr($ip, strpos($ip, ".")+1, strpos(substr($ip, strpos($ip, ".")+1), "."));

$ip2=substr($ip, strpos($ip, ".", strpos($ip, ".")+1)+1, strpos(substr($ip, strpos($ip, ".", strpos($ip, ".")+1)+1), "."));

$ip3=substr($ip, strpos($ip, ".", strpos($ip, ".", strpos($ip, ".")+1)+1)+1);


$bip0=(string)decbin($ip0);$bip1=(string)decbin($ip1);$bip2=(string)decbin($ip2);$bip3=(string)decbin($ip3);
$bip0=str_pad($bip0, 8,"0",STR_PAD_LEFT);
$bip1=str_pad($bip1, 8,"0",STR_PAD_LEFT);
$bip2=str_pad($bip2, 8,"0",STR_PAD_LEFT);
$bip3=str_pad($bip3, 8,"0",STR_PAD_LEFT);


echo "La ip ".$ip." en binario es: ".$bip0.".".$bip1.".".$bip2.".".$bip3


?>
</BODY>
</HTML>