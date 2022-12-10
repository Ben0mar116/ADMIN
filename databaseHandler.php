<?php 

 class Databases {

   protected  $serverUsername= "root";
   protected  $serverName = "localhost";
   protected  $databaseN  = "gestion commerciale";
    public   $cxn;
   function __construct() {
       $this->cxn = new mysqli($this->serverName ,$this-> serverUsername , "" , $this->databaseN);
    
if ($this->cxn->connect_error) {
    die("Connection failed " . $this->cxn->connect_error);
    # code...
}  


  }

  function fetchDataBYONE (  $table,   $table_element ,$attribute , ){
    
$sql = "SELECT *  FROM " . $table . " where  " .$table_element . " =  '" . $attribute  ." ' ;";
$result = $this->cxn->query($sql);
var_dump($result);
return $result;

  }









  }













?>