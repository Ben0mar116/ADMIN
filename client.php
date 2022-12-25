
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
//                                        INSERT 

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
$Commades = $Connection->fetchDataBYONEhell('commande' , 'commande.numClient' , $_GET["id"]); // client's commande 
$idclt = $_GET["id"];
}


//                                        MODIFY 

if(isset($_POST["REF"])){


  $values=array($_POST["NumberClient"], $_POST["DateCom"]);

  $Connection->ModifyValues( 'commande' ,  $_POST["REFPROD"] , $values);

$Commades = $Connection->fetchDataBYONEhell('commande' , 'commande.numClient' , $_POST["REF"]); // client's commande 
$idclt = $_POST["REF"];
}

//                                        DELETE 

if(isset($_POST["DELCOM"])){

  $Connection->Deletebyid( 'commande' ,  $_POST["DELCOM"]);

$Commades = $Connection->fetchDataBYONEhell('commande' , 'commande.numClient' , $_POST["REFIAL"]); // client's commande 
$idclt = $_POST["REFIAL"];
}
?>

<div class='col-md-12 col-lg-12 col-sm-12'>
                        <div class='card white-box p-0'>
                                <div class='card-body'>
                                    <h6 class='box-title mb-0 ' style='margin-top: 30px;'>Commands of client <?php  echo $idclt ?> </div>
                                <table id='datatable' >
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>numClient</th>
                                        <th>dateCommade</th>
                                        
                                        <th style='float: right;'>Actions</th>
                                        
                                    </tr>
                                </thead>
                                 <!-- Product  INFO--> 
                                 <tbody>

                                    
<?php 

if (is_array($Commades)){
  foreach  ($Commades as $Commade) {
    echo " <tr>
    <td>
    <div class='circle'>
    <h2>".$Commade["numCommande"]." </h2></div></td>
    <td>".$Commade["numClient"]." </td>
    <td>".$Commade["dateCommade"]."</td>";
    
    
    
    
    echo "
    <td> <h3>
    
    <a href = 'class=' data-bs-toggle='modal' data-bs-target='#deleteCOM".$Commade["numCommande"]."''><i class=' trash BLUS fas fa-trash-alt'></i>
    
    <a href = '  class=' data-bs-toggle='modal' data-bs-target='#editCom".$Commade["numCommande"]."''><i class=' fas BLUS fa-edit'></i></a>

    <a href = 'LigneCommande.php?id=".$Commade["numCommande"]."'> <i class=' fas fa-shopping-cart'></i></a>

    </h3>
    </td>
    
    </tr>";


    echo"
                                
                                <!-- edit Commande -->


    <div class='modal fade' id='editCom".$Commade["numCommande"]."' tabindex='-1' aria-labelledby='editP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Modifier la commande ".$Commade["numCommande"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='client.php?id=".$idclt." ' method='POST'>
            
<div class='form-floating mb-2'>
    <input type='Select date'   name='DateCom' class='form-control' value='".$Commade["dateCommade"]." ' required id='floatingInput' placeholder=' '/>
    <label for='floatingInput'>Nom du Produit<span class='required'>*</span></label>
</div>

<div class='form-floating mb-2'>
    <input type='text'   name='NumberClient' class='form-control' value='".$Commade["numClient"]." ' required id='floatingInput' placeholder=' '/>
    <label for='floatingInput'>Numero du Client<span class='required'>*</span></label>
</div>
    <input type='hidden'   name='REFPROD' value = '".$Commade["numCommande"]."' />
    <input type='hidden'   name='REF' value = '".$idclt."' />
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

<div class='modal fade' id='deleteCOM".$Commade["numCommande"]."' tabindex='-2' aria-labelledby='deleteP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Are you sure you want to delete product # # ".$Commade["numCommande"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='client.php?id=".$idclt." ' method='post'>
        <input type='hidden'   name='DELCOM' value = '".$Commade["numCommande"]."' />
        <input type='hidden'   name='REFIAL' value = '".$Commade["numClient"]."' />
        <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary'>Confirmer</button>
                </div>
        </form>
    </div>
  </div>
</div>



" 
;





}
;}
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
