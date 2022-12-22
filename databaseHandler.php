<?php 

if (isset($_POST['dateCMD'])) {
  

}







 class Databases {

   protected  $serverUsername= "root";
   protected  $serverName = "localhost";
   protected  $databaseN  = "gestion commerciale";
    public   $cxn;
   function __construct() {
    $this->cxn = new PDO("mysql:host=$this->serverName;dbname=$this->databaseN", $this->serverUsername, "");



  }



 public function getPDO()
 {
  return $this->cxn;
 


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

 function InsertValues( $table , $values) 
  {
    


  switch ($table) {
    case 'commande':
      # code...
      
      
      

           $data = [
             'Client' => $values[0],
             'Date' => $values[1],

           ];
           $sql = "INSERT INTO commande (numClient, dateCommade) VALUES (:Client,:Date)";


           $this->cxn->prepare($sql)->execute($data);
    break;

    case 'Client':
      # code...
      
      
      

           $data = [
             'NomClient' => $values[0],
             'RaisonSociale' => $values[1],
             'adresseClient' => $values[2],
             'VilleClient' => $values[3],
             'Pays' => $values[4],
             'Telephone' => $values[5],

           ];
           $sql = "INSERT INTO client  (NomClient, RaisonSociale , adresseClient , VilleClient , Pays , Telephone) VALUES (:NomClient, :RaisonSociale , :adresseClient , :VilleClient , :Pays , :Telephone)";
           $this->cxn->prepare($sql)->execute($data);
    break;





    }


  }
  
 function ModifyValues( $table ,  $id , $values) 
  {
    


  switch ($table) {
    case 'commande':
      # code...
      
      
      

           $data = [
             'Client' => $values[0],
             'Date' => $values[1],

           ];
           $sql = "UPDATE  commande  SET numClient =  :Client   , dateCommade = :Date where numCommande  = $id " ;


           $this->cxn->prepare($sql)->execute($data);
    break;

    case 'Client':
      # code...
      
      
      

           $data = [
             'NomClient' => $values[0],
             'RaisonSociale' => $values[1],
             'adresseClient' => $values[2],
             'VilleClient' => $values[3],
             'Pays' => $values[4],
             'Telephone' => $values[5],

           ];
           $sql = "UPDATE  client  SET NomClient = :NomClient , RaisonSociale = :RaisonSociale   , adresseClient = :adresseClient  ,
            VilleClient = :VilleClient , Pays = :Pays  , Telephone = :Telephone where numClient = $id ";
           $this->cxn->prepare($sql)->execute($data);
    break;





    }


  }
  

  }











?>