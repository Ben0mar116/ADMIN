
 <div class="modal fade" id="CommModal" tabindex="-1" aria-labelledby="modalCommandeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCommandeLabel">Ajouter une Commande </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="client.php?id=<?php echo $_GET["id"]?>" method="post">

            <div class="md-form md-outline input-with-post-icon datepicker">
            <label for="example">Date de Commande</label>
             <input placeholder="Select date"  name="dateCMD"type="date" id="example" class="form-control">
                </div>
           
<!-- zwa9 -->

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Confirmer</button>
</div>
</form>
</div>
    </div>
  </div>
</div>
<?php 
//  this is an edit 
include 'header.php';


if (isset($_GET["id"])) {
if (isset($_POST["dateCMD"])) {
  
    $values =array($_GET["id"], $_POST["dateCMD"]);
$Connection->InsertValues('commande' , $values);




}
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
