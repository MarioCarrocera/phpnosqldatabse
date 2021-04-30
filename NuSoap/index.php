<?php
     session_name ('mg');
	 session_start();
     if (! isset($_SESSION["iniciada"])) 
     {
         echo 'Esta tratando de violar la seguridad';		 
     }
?>