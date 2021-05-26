<?php
trait DebugP{
	function ot_trace($in,$from,$parameters){
		if ($this->DebugActive){
			$code = uniqid($this->actses , true );				
			$val =  array('kind'=>'trace','in'=>$in,'from'=>$from,'param'=>$parameters);
			if ($this->DebugTo=='screen'){
					echo '<br>'.$code.'<br>';
					$this->ot_show($val);		
			}
			if ($this->DebugTo=='memory'){
				$this->Debughold[$code]=$val;
			}
			if ($this->DebugTo=='disk'){
				$ext = date("Ymd");
				if ($this->DebugFor=='user'){
					$this->dbg_addin($code,$val,'log_'.$this->id.'.'.$ext);
				} else{
					$this->dbg_addin($code,$val,'log_system.'.$ext);	
				}
			}
		}
	}	
	function ot_reg($in,$from,$parameters){
		$this->dbg_addin($from,array('in'=> str_replace('::'.$from,'',$in ),'parameters'=>count ($parameters)),"OnTime_Development.tas","help");
	}		
}
