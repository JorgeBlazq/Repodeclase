<?php

	
		
		echo '<label for="operando1">IP notaci&oacuten decimal: <input type="text" name="operando1" value="'.$_POST['op1'].'"/></br></br>';

		echo '<label for="operando2">IP notaci&oacuten binaria: <input style="width: 300px;" type="text" name="operando2" value="'.str_pad(decbin(substr($_POST['op1'], 0,(strpos($_POST['op1'], ".")))),8,"0",STR_PAD_LEFT).".".str_pad(decbin(substr($_POST['op1'], strpos($_POST['op1'], ".")+1, strpos(substr($_POST['op1'], strpos($_POST['op1'], ".")+1), "."))),8,"0",STR_PAD_LEFT).".".str_pad(decbin(substr($_POST['op1'], strpos($_POST['op1'], ".", strpos($_POST['op1'], ".")+1)+1, strpos(substr($_POST['op1'], strpos($_POST['op1'], ".", strpos($_POST['op1'], ".")+1)+1), "."))),8,"0",STR_PAD_LEFT).".".str_pad(decbin(substr($_POST['op1'], strpos($_POST['op1'], ".", strpos($_POST['op1'], ".", strpos($_POST['op1'], ".")+1)+1)+1)),8,"0",STR_PAD_LEFT).'"/></br></br></br></br>';



?>