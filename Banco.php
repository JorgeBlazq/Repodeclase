<HTML>
<HEAD><TITLE> Banco </TITLE></HEAD>
<BODY>
<?php
$entidad="1234";
$oficina="5678";
$ncuenta="1234567890";
//JORGE BLAZQUEZ
$dc0="";
$dc1="";

$resto=(((int)substr($entidad, 0, 1)*4)+((int)substr($entidad, 1, 1)*8)+((int)substr($entidad, 2, 1)*5)+((int)substr($entidad, 3, 1)*10)+((int)substr($oficina, 0, 1)*9)+((int)substr($oficina, 1, 1)*7)+((int)substr($oficina, 2, 1)*3)+((int)substr($oficina, 3, 1)*6))%11;

switch ($resto) {
	case '11';
		$dc0="0";
		break;
	case '10';
		$dc0="1";
		break;
	
	default:
		$dc0=strval($resto);
		break;
}
$resto=(((int)substr($ncuenta, 0, 1)*1)+((int)substr($ncuenta, 1, 1)*2)+((int)substr($ncuenta, 2, 1)*4)+((int)substr($ncuenta, 3, 1)*8)+((int)substr($ncuenta, 4, 1)*5)+((int)substr($ncuenta, 5, 1)*10)+((int)substr($ncuenta, 6, 1)*9)+((int)substr($ncuenta, 7, 1)*7)+((int)substr($ncuenta, 8, 1)*3)+((int)substr($ncuenta, 9, 1)*6))%11;
$resto=11-$resto;
switch ($resto) {
	case '11';
		$dc1="0";
		break;
	case '10';
		$dc1="1";
		break;
	
	default:
		$dc1=strval($resto);
		break;
}

echo "Entidad: ".$entidad." Oficina: ".$oficina." Codigo: ".$dc0.$dc1." Numero de Cuenta: ".$ncuenta;


?>

</BODY>
</HTML>