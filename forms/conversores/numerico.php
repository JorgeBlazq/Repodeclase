<?php

	
		
		echo '<label for="operando1">Operando 1: <input type="text" name="operando1" value="'.$_POST['op1'].'"/></br></br>';
		echo "<table style='border: 1px solid black;'>";
switch ($_POST['base']) {
	case 'bin':
		echo '<tr style=" border: 1px solid black;"><td style=" border: 1px solid black;">binario</td><td style=" border: 1px solid black;">'.decbin($_POST['op1']).'</td></tr>';
		break;
	case 'oct':
		echo '<tr style=" border: 1px solid black;"><td style=" border: 1px solid black;">octal</td><td style=" border: 1px solid black;">'.decoct($_POST['op1']).'</td></tr>';
		break;
	case 'hex':
		echo '<tr style=" border: 1px solid black;"><td style=" border: 1px solid black;">Hexadecimal</td><td style=" border: 1px solid black;">'.dechex($_POST['op1']).'</td></tr>';
		break;
	case 'todos':
		echo '<tr style=" border: 1px solid black;"><td style=" border: 1px solid black;">binario</td><td style=" border: 1px solid black;">'.decbin($_POST['op1']).'</td></tr><tr style=" border: 1px solid black;"><td style=" border: 1px solid black;">Octal</td><td style=" border: 1px solid black;">'.decoct($_POST['op1']).'</td></tr><tr style=" border: 1px solid black;"><td style=" border: 1px solid black;">Hexadecimal</td><td style=" border: 1px solid black;">'.dechex($_POST['op1']).'</td></tr>';
		break;
	default:
		#No deberias estar aqui 
		break;
}
		echo "</table>"

?>