<HTML>
<HEAD><TITLE> DNI </TITLE></HEAD>
<BODY>
<?php
$dni="51230073";

//JORGE BLAZQUEZ

$resto = $dni%23;

switch ($resto) {
	case '0':
		echo "La letra del dni ".$dni." es la T";
		break;
	
	case '1':
		echo "La letra del dni ".$dni." es la R";
		break;
	case '2':
		echo "La letra del dni ".$dni." es la W";
		break;
	case '3':
		echo "La letra del dni ".$dni." es la A";
		break;
	case '4':
		echo "La letra del dni ".$dni." es la G";
		break;
	case '5':
		echo "La letra del dni ".$dni." es la M";
		break;
	case '6':
		echo "La letra del dni ".$dni." es la Y";
		break;
	case '7':
		echo "La letra del dni ".$dni." es la F";
		break;
	case '8':
		echo "La letra del dni ".$dni." es la P";
		break;
	case '9':
		echo "La letra del dni ".$dni." es la D";
		break;
	case '10':
		echo "La letra del dni ".$dni." es la X";
		break;
	case '11':
		echo "La letra del dni ".$dni." es la B";
		break;
	case '12':
		echo "La letra del dni ".$dni." es la N";
		break;
	case '13':
		echo "La letra del dni ".$dni." es la J";
		break;
	case '14':
		echo "La letra del dni ".$dni." es la Z";
		break;
	case '15':
		echo "La letra del dni ".$dni." es la S";
		break;
	case '16':
		echo "La letra del dni ".$dni." es la Q";
		break;
	case '17':
		echo "La letra del dni ".$dni." es la V";
		break;
	case '18':
		echo "La letra del dni ".$dni." es la H";
		break;
	case '19':
		echo "La letra del dni ".$dni." es la L";
		break;
	case '20':
		echo "La letra del dni ".$dni." es la C";
		break;
	case '21':
		echo "La letra del dni ".$dni." es la K";
		break;
	case '22':
		echo "La letra del dni ".$dni." es la E";
		break;
	
	
	default:
		# code...
		break;
}



?>

</BODY>
</HTML>