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


function fetchDataBYONEhell (  $table,   $table_element ,$attribute  ){
    
  $sql = "SELECT numCommande , numClient , dateCommade  FROM " . $table . " where  " .$table_element . " =  '" . $attribute  ." ' ;";
  $result = $this->cxn->prepare($sql);
  $result->execute();
  $result->setFetchMode(PDO::FETCH_BOTH);
  
  return $result->fetchall();
  
    }


    function fetchDataBYhell (  $table,   $table_element ,$attribute  ){
    
      $sql = "SELECT numCommande , refProduit , qteCommandee  FROM " . $table . " where  " .$table_element . " =  '" . $attribute  ." ' ;";
      $result = $this->cxn->prepare($sql);
      $result->execute();
      $result->setFetchMode(PDO::FETCH_BOTH);
      
      return $result->fetchall();
      
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
    case 'produit':
      # code...

           $data = [
             'NomProduit' => $values[0],
             'PrixUnitaire' => $values[1],
             'qteStockee' => $values[2],
             'indisponible' => $values[3],

           ];
           $sql = "INSERT INTO produit  (NomProduit, PrixUnitaire , qteStockee , indisponible ) VALUES (:NomProduit, :PrixUnitaire , :qteStockee , :indisponible )";
           $this->cxn->prepare($sql)->execute($data);
    break;

    case 'Ligne_Commande':
      # code...
           $data = [
             'refProduit' => $values[0],
             'qteCommandee' => $values[1],
             'numCommande' => $values[2]
           ];
           $sql = "INSERT INTO ligne_commande (refProduit, qteCommandee ,numCommande ) VALUES (:refProduit,:qteCommandee ,:numCommande)";
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


    case 'produit':
      # code...
           $data = [
             'NomProduit' => $values[0],
             'PrixUnitaire' => $values[1],
             'qteStockee' => $values[2],
             'indisponible' => $values[3],

           ];
           $sql = "UPDATE produit set NomProduit = :NomProduit , PrixUnitaire = :PrixUnitaire , qteStockee  = :qteStockee , indisponible = :indisponible 
           where refProduit = $id";
           $this->cxn->prepare($sql)->execute($data);
    break;

    }
  }
  
  function Deletebyid( $table ,  $id ) 
  {
  switch ($table) {
    case 'commande':
      # code...
           $data = [
             'CommandeID' =>$id
             

           ];
           $sql = "DELETE FROM  commande where numCommande  = :CommandeID " ;


           $this->cxn->prepare($sql)->execute($data);
    break;

    case 'Client':
      # code...
           $data = [
             'NumClient' => $id
             

           ];
           $sql = "DELETE from Client Where NumClient = :NumClient ";
           $this->cxn->prepare($sql)->execute($data);
    break;


    case 'produit':
      # code...
           $data = [
             'refProduit' => $id
           ];
           $sql = "DELETE from produit Where refProduit = :refProduit";
           $this->cxn->prepare($sql)->execute($data);
    break;
    }
  }


  function ModifyLcom($id,$ProdP ,$values ) {
$RP = $values[0] ;
    $data = [
             'refProduit' => $values[0],
             'qteCommandee' => $values[1],
    ];
    $sql = "UPDATE Ligne_commande set refProduit  = :refProduit  , qteCommandee = :qteCommandee  
    where numCommande   = $id AND refProduit = $ProdP ";
    $this->cxn->prepare($sql)->execute($data);




  }

  function DeleteLcom($ProdP  , $id ) {
        $data = [
                 'refProduit' => $ProdP,
                 'numCommande' => $id
        ];
        $sql = "DELETE FROM  Ligne_commande where refProduit  = :refProduit AND  numCommande = :numCommande";
        $this->cxn->prepare($sql)->execute($data);
    
      }











  }











?>