<?php 

 class Databases {

   protected  $serverUsername= "root";
   protected  $serverName = "localhost";
   protected  $databaseN  = "gestion commerciale";
    public   $cxn;
   function __construct() {
    $this->cxn = new PDO("mysql:host=$this->serverName;dbname=$this->databaseN", $this->serverUsername, "");



  }

  function fetchDataBYONE (  $table,   $table_element ,$attribute  ){
    
$sql = "SELECT *  FROM " . $table . " where  " .$table_element . " =  '" . $attribute  ." ' ;";
$result = $this->cxn->query($sql);

return $result;

  }
  function fetchALL (  $table  ){
    
$sql = "SELECT *  FROM " . $table .";";

$result = $this->cxn->query($sql);

return $result;

  }
  









  }













?>