<?php
trait CoreP{
	function CrtFrt($name, $desc){
		if ($this->ot_connect()) {
			if ($this->ot_can('owner','main')) {
				if ($this->not_exist($name,)) {
					$this->ot_create($name);
					$this->ot_addchangein('admin','owner','users.json',$name);			
					$this->ot_addchangein($name,$name,'features.json');
					$this->ot_addchangein($name,'owner','features.json','usr/admin');
					$this->ot_array($name,array('Name'=>$desc.' feature','limit'=>0,'OnUse'=>0),'container.json');
					$this->ot_array(array('nick'=>$name,'name'=>$desc.' feature'), 'admin.json', TRUE,$name);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function CallMethod($function, $parameter){
		if (method_exists ( $this , $function )){
			if($this->ot_getinside($function, 'OnTime_Development.tas', 'help')){
				echo $this->retval['parameters'].'<br>';
				echo count ($parameter) .'<br>';
			    $this->ot_show($this->retval);
			    
				$evaluate = '$tmp=$this->'.$function.'(';
				if (is_array($parameter)){
					$tmp=0;
					foreach($parameter as $p){
						if ($tmp==1){
							$evaluate .= ',';
						}
						if (is_string ( $p )){
			 				$evaluate .= "'".$p."'";
					 	} else {
					 		$evaluate .= $p;		 	
					 	}
					 	$tmp=1;
					}							
				} else {
					if (is_string ( $parameter )){
				 		$evaluate .= "'".$parameter."'";
				 	} else {
			 			$evaluate .= $parameter;		 	
			 		}			
				}
				$evaluate .= ');';
				eval($evaluate);
				return($tmp);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function SsnDta(){
		$retval = [];
		$retval['conected'] = $this->conected;
		$retval['id'] = $this->id;
		$retval['id'] = $this->id;
		$retval['id'] = $this->id;
		$retval['leng Read'] = $this->lengR;
		$retval['leng Write'] = $this->lengW;
		$retval['leng Default'] = $this->lengD;
		$retval['Full files'] = $this->lengF;
		$retval['features'] = $this->features;
		$retval['level'] = $this->level;
		$retval['status'] = $this->status;
		$retval['safety'] = $this->safety;
		$retval['groups'] = $this->groups;
		$retval['errors'] = $this->errtext;
		$retval['features'] = $this->features;
		
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $retval;
	}	
}
?>