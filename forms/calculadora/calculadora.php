<?php

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