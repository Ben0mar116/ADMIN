<div class="modal fade" id="LCOModal" tabindex="-1" aria-labelledby="modalCommandeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCommandeLabel">Ajouter une Ligne de Commande </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="LigneCommande.php?id=<?php echo $_GET["id"]?>" method="post">
        <div class="form-floating mb-2">
        <input type="text"  name="ProdRef"  required class="form-control" id="RS" placeholder=" "/>
            <label for="RS">Numero du Produit <span class="required">*</span></label></div>
            <div class="form-floating mb-2">
        <input type="text"  name="QteProd"  required class="form-control" id="RS" placeholder=" "/>
            <label for="RS">Quantite du Produit<span class="required">*</span></label></div>
            
           
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
include 'header.php';
?>


<?php 




if (isset($_GET["id"])) {
$verify_Com = $Connection->fetchDataBYONE('commande' , 'numCommande ' , $_GET["id"])->fetchColumn();
if ($verify_Com == 0 ) {
    include_once 'error.php';
    return;
}


// verify integrity ie verify product 


if(isset($_POST["ProdRef"])){
 $insertVerify =  $Connection->fetchDataBYONE('produit' , 'refProduit' ,$_POST["ProdRef"] )->fetchColumn();
  if ($insertVerify == 0 ) {
    include_once 'error.php';
    return;
}







    $values =array($_POST["ProdRef"], $_POST["QteProd"] ,$_GET["id"]);
    $Connection->InsertValues('Ligne_Commande' , $values);


}

if(isset($_POST["Edit"])){
  $insertVerify =  $Connection->fetchDataBYONE('produit' , 'refProduit' ,$_POST["RefProduct"] )->fetchColumn();
  if ($insertVerify == 0 ) {
    include_once 'error.php';
    return;
}

    $values =array($_POST["RefProduct"], $_POST["QuantCom"]);
    $Connection->ModifyLcom($_GET["id"],$_POST["ProdP"],$values);


}
if(isset($_POST["Delete"])){
    $Connection->DeleteLcom($_POST["ProRef"],$_GET["id"]);


}

$Client = $Connection->fetchDataBYONE('commande' , 'numCommande' , $_GET["id"])->fetch();  // current Commande
$LComs = $Connection->fetchDataBYhell('ligne_commande' , 'ligne_commande.numCommande' , $_GET["id"]); // Commande's Lcommandes
$idcom = $_GET["id"];
}
?>

<div class='col-md-12 col-lg-12 col-sm-12'>
                        <div class='card white-box p-0'>
                                <div class='card-body'>
                                    <h6 class='box-title mb-0 ' style='margin-top: 30px;'>Command Numero #<?php  echo $idcom ?> </div>
                                <table id='datatable' >
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>refProduit </th>
                                        <th>qteCommandee</th>
                                        
                                        <th style='float: right;'>Actions</th>
                                        
                                    </tr>
                                </thead>
                                 <!-- Product  INFO--> 
                                 <tbody>

                                    
<?php 

if (is_array($LComs)){
  foreach  ($LComs as $LCom) {
    echo " <tr>
    <td>
    <div class='circle'>
    <h2>".$LCom["numCommande"]." </h2></div></td>
    <td>".$LCom["refProduit"]." </td>
    <td>".$LCom["qteCommandee"]."</td>";

    echo "
    <td> <h3>
    
    <a href = 'class= 'data-bs-toggle='modal' data-bs-target='#deleteLCOM".$LCom["refProduit"]."''><i class=' trash BLUS fas fa-trash-alt'></i>
    
    <a href = 'class= 'data-bs-toggle='modal' data-bs-target='#editLCom".$LCom["refProduit"]."''><i class=' fas BLUS fa-edit'></i></a>
    </h3></td></tr>";


    echo"
                                
    <!-- edit LCommande -->


<div class='modal fade' id='editLCom".$LCom["refProduit"]."' tabindex='-1' aria-labelledby='editP' aria-hidden='true'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header'>
<h5 class='modal-title' id='editC'>Modifier la Ligne de commande ".$LCom["refProduit"]." </h5>
<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
</div>
<div class='modal-body'>

<form action='LigneCommande.php?id=".$idcom."' method='POST'>

<div class='form-floating mb-2'>
<input type='text'   name='RefProduct' class='form-control' value='".$LCom["refProduit"]." ' required id='floatingInput' placeholder=' '/>
<label for='floatingInput'>Numero du Product<span class='required'>*</span></label>
</div>

<div class='form-floating mb-2'>
<input type='text'   name='QuantCom' class='form-control' value='".$LCom["qteCommandee"]." ' required id='floatingInput' placeholder=' '/>
<label for='floatingInput'>Quantite du Commande<span class='required'>*</span></label>
</div>
<input type='hidden'   name='ProdP' value = '".$LCom["refProduit"]."' />
<input type='hidden'   name='Edit' value = 'Hell' />
<!-- zwa9 -->

</div>
<div class='modal-footer'>
<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
<button type='submit' class='btn btn-primary'>Confirmer</button>
</div>
</form>
</div>
</div>
</div>

<!-- Delete Commande -->

<div class='modal fade' id='deleteLCOM".$LCom["refProduit"]."' tabindex='-1' aria-labelledby='deleteP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Are you sure you want to delete Ligne Commande ".$LCom["refProduit"]." ? </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='LigneCommande.php?id=".$idcom." ' method='post'>
        <input type='hidden'   name='ProRef' value = '".$LCom["refProduit"]."' />
        <input type='hidden'   name='Delete' value = 'Hell' />
        <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary'>Confirmer</button>
                </div>
        </form>
    </div>
  </div>
</div>


";








  };}
                                    ?>

                                     </tbody>
                                </table>
                        </div>
                        </div>
  
                    </div>
                </div>
                                    
                </div>
                </div>






<?php include 'footer.php'?>

