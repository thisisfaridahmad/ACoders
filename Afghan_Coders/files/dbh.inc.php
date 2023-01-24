<?php
$servername = 'localhost';
$dBUsername = 'root';
$dBpassword = '';
$databaseName = 'afghan_coders';

$conn = mysqli_connect($servername,$dBUsername,$dBpassword,$databaseName);
if(!$conn){
	die("Connection failed ".mysqli_connect_error());
}
// class connection {
//   private $name;
//   private $pwd;
//   private $server;
//   private $dbname;
//   public $conn;
 
//   function __construct($server, $name, $pwd, $dbname) {
//   	$this->server = $server;
//   	$this->name = $name;
//   	$this->pwd = $pwd;
//   	$this->dbname = $dbname;  
//   	$conn = mysqli_connect($this->server,$this->name,$this->pwd,$this->dbname);
//   	if(!$conn){
//   		die("Connection failed ".mysqli_connect_error());
//   	}
//   }
// }

// $connect = new connection('localhost','root','','afghan_coders');
?>