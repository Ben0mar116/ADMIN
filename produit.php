<?php include 'header.php'?>

<?php 
 if ( isset( $_POST["Dispo"])){
    
  $_POST["Dispo"] = 1;

}else{

  $_POST["Dispo"] = 0;
}
// insert produit
if (isset($_POST["NomProduitInsert"])) {
 
 

    $values = array($_POST["NomProduitInsert"] , $_POST["PUnitaire"] ,$_POST["QteStock"] ,$_POST["Dispo"]);

    $Connection->InsertValues('produit' , $values);

    $Products=    $Connection->fetchALL('produit');
    # code...
}
if (isset($_POST["REF"])) {

    $id = $_POST["REF"];
        $values = array($_POST["namePrd"] , $_POST["prixUnitaire"] ,$_POST["QteStocke"] ,$_POST["Dispo"]);
    // var_dump($values);
    $Connection->ModifyValues('produit' ,$id , $values);

    $Clients=    $Connection->fetchALL('produit');

    # code...
}   
//DellREF
if (isset($_POST["DELREF"])) {

    $idd = $_POST["DELREF"];

    $Connection->Deletebyid('produit' , $idd);

    $Products=    $Connection->fetchALL('produit');
    # code...
}

?>





<!-- produit datatable -->

<div class='col-md-12 col-lg-12 col-sm-12'>
                        <div class='card white-box p-0'>
                                <div class='card-body'>
                                    <h6 class='box-title mb-0 ' style='margin-top: 30px;'>Produits</div>
                                
                                <table id='datatable' >
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>NomProduit</th>
                                        <th >PrixUnitaire</th>
                                        <th>qteStocke</th>
                                        <th>Disponibilite</th>
                                        
                                        <th style='float: right;'>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <!-- Product  INFO--> 
                                <tbody>

                                    
                                    <?php 
                                    $Products= $Connection->fetchALL('produit');
                                        
                                    foreach  ($Products as $eProd) {
                                        
                                  echo " <tr>
                                    <td>
                                  <div class='circle'>
                                  <h2>".$eProd["refProduit"] ." </h2>
                                  </div>
                                    </td>
                                    <td>".$eProd["NomProduit"]." </td>
                                    <td>".$eProd["PrixUnitaire"]."</td>
                                    <td>".$eProd["qteStockee"]."</td>";

                                    if($eProd["indisponible"] == 1){
                                        echo "<td> <h3><i style='margin-right: 100px;' class='  fas BLUS fa-solid fa-check'></i></h3> </td>";
                                    }
                                    if($eProd["indisponible"] == 0){
                                        echo"<td> <h3><i  style='margin-right: 100px;' class='fas BLUS fa-sharp fa-solid fa-exclamation'></i></h3> </td>";
                                    }


                                    echo "
                                    <td> <h3>
                            
                                    <a href = ' class=' data-bs-toggle='modal'' data-bs-target='#deleteProduit".$eProd["refProduit"]."''><i class=' trash BLUS fas fa-trash-alt'></i>
                                    
                                    <a  href = ' class=' data-bs-toggle='modal'' data-bs-target='#editProduit".$eProd["refProduit"]."''><i class=' fas BLUS fa-edit'></i></a>

                                    </h3>
                                </td>
                                
                                </tr>";

                                echo"
                                
                                <!-- edit Produit -->


    <div class='modal fade' id='editProduit".$eProd["refProduit"]."' tabindex='-1' aria-labelledby='editP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Modifier un Produit # ".$eProd["refProduit"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='produit.php' method='post'>
            
<div class='form-floating mb-2'>
    <input type='text'   name='namePrd' class='form-control' value='".$eProd["NomProduit"]." ' required id='floatingInput' placeholder=' '/>
    <label for='floatingInput'>Nom du Produit<span class='required'>*</span></label>
</div>
    <div class='form-floating mb-2'>
    <input type='text' id='postfix'  name='prixUnitaire'  value = '".$eProd["PrixUnitaire"]." $' required class='form-control' id='RS' placeholder=' '/>
    <label for='RS'>Prix Unitaire <span class='required'>*</span></label>
</div>
    <div class='form-floating mb-2'>
    <input class='form-control'  type='number' name='QteStocke'  value = '".$eProd["qteStockee"]." ' required  id='comment' placeholder=' '/>
    <label for='comment'>Quantite du Stock<span class='required'>*</span></label>
</div>
  

    <div  class='custom-control custom-switch'>
    <input  name='Dispo' type='checkbox' value='".$eProd["indisponible"]."' class='custom-control-input'  id='ss'/>
    <label  class='custom-control-label'for='ss'>Disponible</label>
    </div>
    </div>
    <input type='hidden'   name='REF' value = '".$eProd["refProduit"]."' />
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





                                                                <!-- Delete Produit -->

<div class='modal fade' id='deleteProduit".$eProd["refProduit"]."' tabindex='-2' aria-labelledby='deleteP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Are you sure you want to delete product # ".$eProd["refProduit"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='produit.php' method='post'>
        <input type='hidden'   name='DELREF' value = '".$eProd["refProduit"]."' />
        <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary'>Confirmer</button>
                </div>
        </form>
    </div>
  </div>
</div>



" 
;}
                                    ?>

                                     </tbody>
                                </table>
                        </div>
                        </div>
  
                  

<?php include 'footer.php' ?>