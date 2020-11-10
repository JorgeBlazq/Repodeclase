<?php

	
		
		echo '<label for="operando1">Operando 1: <input type="text" name="operando1" value="'.$_POST['op1'].'"/></br></br>';
		echo '<label for="operando2">Operando 2: <input type="text" name="operando2" value="'.$_POST['op2'].'"/></br></br></br></br>';
	
switch ($_POST['operacion']) {
	case 'suma':

		echo 'Resultado operaci&oacuten: '.$_POST['op1'].' + '.$_POST['op2'].' = '.($_POST['op1']+$_POST['op2']);
		break;
	case 'resta':
		echo 'Resultado operaci&oacuten: '.$_POST['op1'].' - '.$_POST['op2'].' = '.($_POST['op1']-$_POST['op2']);
		break;
	case 'prod':
		echo 'Resultado operaci&oacuten: '.$_POST['op1'].' * '.$_POST['op2'].' = '.($_POST['op1']*$_POST['op2']);
		break;
	case 'div':
		echo 'Resultado operaci&oacuten: '.$_POST['op1'].' / '.$_POST['op2'].' = '.($_POST['op1']/$_POST['op2']);
		break;
	default:
		#No deberias estar aqui 
		break;
}


?>