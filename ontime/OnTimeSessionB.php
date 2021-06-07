<?php
trait SessionB{	

/*
		$_SESSION['VURL']= substr($_SERVER["SERVER_NAME"],-10);				
	} else {
		$_SESSION['VURL']= substr($_SERVER["SERVER_NAME"],-11);			
	}
	$_SESSION['ip'] = file_get_contents('https://api.ipify.org');
	$_SESSION['ip6'] = file_get_contents('https://api6.ipify.org');
*/

	function StartSss(){
		$this->retval=[];
		foreach ($this->features as $clave => $valor) {
    		if ($this->ot_qexist('index.bas',$clave)){
    			$tmp = $this->ot_read('admin.json',$clave);
				$this->retval=[];
    			$this->retval[$clave]='('.$tmp['nick'].')'.$tmp['name'];
    		}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	

}
?>