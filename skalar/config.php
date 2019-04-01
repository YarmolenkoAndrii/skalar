<?php
$config     = file_get_contents('config.xml');
$configXML  = new SimpleXMLElement($config);	

$dbOptions = array(
	'db_host' => (string)$configXML->db->host,
	'db_name' => (string)$configXML->db->dbname,
	'db_user' => (string)$configXML->db->username,
	'db_pass' => (string)$configXML->db->password	
);

require "class/db_class.php";
DB::init($dbOptions);