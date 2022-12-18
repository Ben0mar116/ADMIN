<?php 
include 'header.php';

if (isset($_GET["id"])) {
//    see if the client exists in DB
$verify_Client = $Connection->fetchDataBYONE('client' , 'numClient' , $_GET["id"])->fetchColumn();
if ($verify_Client == 0 ) {
    include_once 'error.php';
    
}
$Client = $Connection->fetchDataBYONE('client' , 'numClient' , $_GET["id"])->fetch();  // current client
$Commade = $Connection->fetchDataBYONE('commande' , 'commande.numClient' , $_GET["id"])->fetch(); // client's commande 

var_dump($Commade);

// list all commandes of this client







}





?>









<?php include 'footer.php'?>