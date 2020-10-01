<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204/16";

//JORGE BLAZQUEZ



$ip0=substr($ip, 0,(strpos($ip, ".")));

$ip1=substr($ip, strpos($ip, ".")+1, strpos(substr($ip, strpos($ip, ".")+1), "."));

$ip2=substr($ip, strpos($ip, ".", strpos($ip, ".")+1)+1, strpos(substr($ip, strpos($ip, ".", strpos($ip, ".")+1)+1), "."));

$ip3=substr($ip, strpos($ip, ".", strpos($ip, ".", strpos($ip, ".")+1)+1)+1);

$mask=substr($ip, strpos($ip, "/")+1);





$bip0=(string)decbin($ip0);$bip1=(string)decbin($ip1);$bip2=(string)decbin($ip2);$bip3=(string)decbin($ip3);
$bip0=str_pad($bip0, 8,"0",STR_PAD_LEFT);
$bip1=str_pad($bip1, 8,"0",STR_PAD_LEFT);
$bip2=str_pad($bip2, 8,"0",STR_PAD_LEFT);
$bip3=str_pad($bip3, 8,"0",STR_PAD_LEFT);
$ipbin=$bip0.$bip1.$bip2.$bip3;

//echo "La ip ".$ip." en binario es: ".$bip0.".".$bip1.".".$bip2.".".$bip3."<br/>";

echo "IP: ".$ip."<br/>";
echo "Mascara: ".$mask."<br/>";

//calcular netmask
$netmask="";
$netmask=str_pad($netmask, (int)$mask,"1");
$netmask=str_pad($netmask, 32,"0",STR_PAD_RIGHT);
$netmask=substr_replace($netmask, ".", 8,0);
$netmask=substr_replace($netmask, ".", 17,0);
$netmask=substr_replace($netmask, ".", 26,0);
echo "la mascara de subred es: ".bindec(substr($netmask, 0,8)).".".bindec(substr($netmask, 9,8)).".".bindec(substr($netmask, 18,8)).".".bindec(substr($netmask, 26,8))."<br/>";
//calcular direccion de red
$network=substr($ipbin, 0, (int)$mask);
$network=str_pad($network, 32,"0",STR_PAD_RIGHT);
echo "La direccion de red es: ".bindec(substr($network, 0,8)).".".bindec(substr($network, 8,8)).".".bindec(substr($network, 16,8)).".".bindec(substr($network, 24,8))."/".$mask;

//Broadcast
$broadcast=$network;
$broadcast=substr($broadcast, 0,(int)$mask);
$broadcast=str_pad($broadcast,32,"1",STR_PAD_RIGHT);
echo "<br/>La direccion de broadcast es: ".bindec(substr($broadcast, 0,8)).".".bindec(substr($broadcast, 8,8)).".".bindec(substr($broadcast, 16,8)).".".bindec(substr($broadcast, 24,8));

echo "<br/>Rango: De ".bindec(substr($network, 0,8)).".".bindec(substr($network, 8,8)).".".bindec(substr($network, 16,8)).".".(bindec(substr($network, 24,8))+1)." A ".bindec(substr($broadcast, 0,8)).".".bindec(substr($broadcast, 8,8)).".".bindec(substr($broadcast, 16,8)).".".(bindec(substr($broadcast, 24,8))-1);

?>

</BODY>
</HTML>