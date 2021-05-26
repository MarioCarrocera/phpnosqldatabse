<?php
trait Criptex{	

function cripto($string,$action='e',$username){
	$secret_iv='Soy1GatoEncriptado';
	$content='';
	$file="../config/script/code.js";
		if(file_exists($file)){
			$archivo=fopen($file,"r");
			while(! feof($archivo)) {
				$content.=fgets($archivo);}
				fclose($archivo);
				$secret_iv = $content;
		}
		$secret_key=str_replace('@','_',$username);
		$secret_key=str_replace ( '.' , '_' , 
		$secret_key );
		$secret_key=str_replace('-','_',$secret_key);
		$output='error';
		$encrypt_method="AES-256-CBC";
		$key=hash('sha256',$secret_key );
		$iv=substr(hash('sha256',$secret_iv),0,16);
	if($action=='e'){
		$output=base64_encode(openssl_encrypt($string,$encrypt_method,$key,0,$iv));}
		else if(
			$action=='d'){
				$output=openssl_decrypt( base64_decode( $string ),$encrypt_method,$key,0,$iv);}
	return $output;}

}	
