<?php 
include 'header.php';


if (isset($_GET['query'])) {
    $get_query = $_GET['query'];
    
    $search_CLients = $Connection->verify_query('client'  , $get_query);
    // var_dump($search_CLientss["numClient"] );
  
    $search_Produits = $Connection->verify_query('produit'  , $get_query);
    
}

?>

<div class='col-md-12 col-lg-12 col-sm-12'>
            <div class='card white-box p-0'>
                    <div class='card-body'>
                        <h3 class='box-title mb-0 ' style='margin-top: 30px;'>Clients</h3>
                    </div>



                                <table id='datatable'>
                                <thead>
                                    <tr>

                                        
                                        <th >#</th>
                                        <th>Nom</th>
                                        <th>Raison Sociale</th>
                                        <th >Adresse</th>
                                        <th>Ville</th>
                                        <th>Pays</th>
                                        <th>telephone</th>
                                        <th style='float: right;'>Actions</th>
                                        
                                    </tr>
                                </thead>
                                    
                    
                       
                                    
                                <!-- CLIENT  INFO--> 
                                <tbody>

                                    <!-- !!!!!  define class ClientNumber !!!!! -->
                                    <?php 
                                    if ($search_CLients == null) {
                                        return;
                                    }
                                        
                                  echo " <tr>
                                  <td>
                                  <div class='circle'>
                                  <h2>".$search_CLients["numClient"] ." </h2>
                                    </div>
                                    </td>
                                    <td>".$search_CLients["NomClient"]." </td>
                                    <td>".$search_CLients["RaisonSociale"]."</td>
                                    <td>".$search_CLients["adresseClient"]."</td>
                                    <td>".$search_CLients["VilleClient"]."</td>
                                    <td>".$search_CLients["Pays"]."</td>
                                    <td>".$search_CLients["Telephone"]."</td>
                                    <td> <h3>
                                        
                                    
                                        <a href = ''data-bs-toggle='modal' data-bs-target='#deleteClient".$search_CLients["numClient"]."'><i class=' trash BLUS fas fa-trash-alt'></i>
                                        <a href = ''data-bs-toggle='modal' data-bs-target='#editClient".$search_CLients["numClient"]."'><i class=' fas BLUS fa-edit'></i></a>
                                        <a href = 'client.php?id=".$search_CLients["numClient"]." '><i class='  fas BLUS fa-external-link-square-alt'></i></a>
                                        </h3>
                                    </td>
                                    
                                    </tr>
                                    
                                    <!-- edit Client -->


    <div class='modal fade' id='editClient".$search_CLients["numClient"]."' tabindex='-1' aria-labelledby='editC' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Modifier un Client # ".$search_CLients["numClient"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form action='homepage.php' method='post'>
            
            <div class='form-floating mb-2'>
    <input type='text'   name='nameCLT' class='form-control' value='".$search_CLients["NomClient"]." ' required id='floatingInput' placeholder=' '/>
    <label for='floatingInput'>Nom du Client<span class='required'>*</span></label>
</div>


    <div class='form-floating mb-2'>
    <input type='text'  name='RaisonSociale'  value = '".$search_CLients["RaisonSociale"]." ' required class='form-control' id='RS' placeholder=' '/>
    <label for='RS'>Raison Sociale <span class='required'>*</span></label>
    </div>
    <div class='form-floating mb-2'>
    <input class='form-control' name='adresseClient'  value = '".$search_CLients["adresseClient"]." ' required rows='3' id='comment' placeholder=' '/>
    <label for='comment'>Adresse<span class='required'>*</span></label>
    </div>
    <div style='display: grid; grid-template-columns: 1fr 1fr;'>

        <div class='form-floating mb-2'>
            
            <input type='text' style='width:220px;' value = '".$search_CLients["Pays"]." '  name='Pays' class='form-control' id='floatingInput' placeholder='Maroc'  value='Maroc'  />
            <label for='comment'>Pays</label>
        </div>
        <div class='form-floating mb-2' style='margin-left: 15px;'>
            
            <input type='text' style='width:220px;' value = '".$search_CLients["VilleClient"]." '  name='VilleClient' required class='form-control' id='floatingInput' placeholder=' '  />
            <label for='comment'>Ville<span class='required'>*</span></label>
        </div>
      
    </div>
    
    <div class='form-floating mb-2'>
            
            <input type='tel'   name='Telephone' value = '".$search_CLients["Telephone"]." ' class='form-control'  required id='floatingInput' placeholder=' '  />
            <label for='comment'>Telephone<span class='required'>*</span></label>
            </div>
            <input type='hidden'   name='ID' value = '".$search_CLients["numClient"]." ' />
        
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

                                                <!-- Delete Client -->

<div class='modal fade' id='deleteClient".$search_CLients["numClient"]."' tabindex='-2' aria-labelledby='deleteP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Are you sure you want to delete client # ".$search_CLients["numClient"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='homepage.php' method='post'>
        <input type='hidden'   name='DELCLT' value = '".$search_CLients["numClient"]."' />
        <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary'>Confirmer</button>
                </div>
        </form>
    </div>
  </div>
</div>



";?>
</tbody>
</table>
                          
                                        
                            
                                       

                            
    
                        </div>
                        </div>
   
<div class='col-md-12 col-lg-12 col-sm-12'>
            <div class='card white-box p-0'>
                    <div class='card-body'>
                        <h3 class='box-title mb-0 ' style='margin-top: 30px;'>Produit</h3>
                    </div>
                    <table id='productTABLE' >
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
                                 if ($search_Produits == null) {
                                    return;
                                }
                                        
                                        
                                  echo " <tr>
                                    <td>
                                  <div class='circle'>
                                  <h2>".$search_Produits["refProduit"] ." </h2>
                                  </div>
                                    </td>
                                    <td>".$search_Produits["NomProduit"]." </td>
                                    <td>".$search_Produits["PrixUnitaire"]."</td>
                                    <td>".$search_Produits["qteStockee"]."</td>";

                                    if($search_Produits["indisponible"] == 1){
                                        echo "<td> <h3><i style='margin-right: 100px;' class='  fas BLUS fa-solid fa-check'></i></h3> </td>";
                                    }
                                    if($search_Produits["indisponible"] == 0){
                                        echo"<td> <h3><i  style='margin-right: 100px;' class='fas BLUS fa-sharp fa-solid fa-exclamation'></i></h3> </td>";
                                    }


                                    echo "
                                    <td> <h3>
                            
                                    <a href = ' class=' data-bs-toggle='modal'' data-bs-target='#deletsearch_Produitsuit".$search_Produits["refProduit"]."''><i class=' trash BLUS fas fa-trash-alt'></i>
                                    
                                    <a  href = ' class=' data-bs-toggle='modal'' data-bs-target='#editProduit".$search_Produits["refProduit"]."''><i class=' fas BLUS fa-edit'></i></a>

                                    </h3>
                                </td>
                                
                                </tr>";

                                echo"
                                
                                <!-- edit Produit -->


    <div class='modal fade' id='editProduit".$search_Produits["refProduit"]."' tabindex='-1' aria-labelledby='editP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Modifier un Produit # ".$search_Produits["refProduit"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='produit.php' method='post'>
            
<div class='form-floating mb-2'>
    <input type='text'   name='namePrd' class='form-control' value='".$search_Produits["NomProduit"]." ' required id='floatingInput' placeholder=' '/>
    <label for='floatingInput'>Nom du Produit<span class='required'>*</span></label>
</div>
    <div class='form-floating mb-2'>
    <input type='text' id='postfix'  name='prixUnitaire'  value = '".$search_Produits["PrixUnitaire"]." $' required class='form-control' id='RS' placeholder=' '/>
    <label for='RS'>Prix Unitaire <span class='required'>*</span></label>
</div>
    <div class='form-floating mb-2'>
    <input class='form-control'  type='number' name='QteStocke'  value = '".$search_Produits["qteStockee"]." ' required  id='comment' placeholder=' '/>
    <label for='comment'>Quantite du Stock<span class='required'>*</span></label>
</div>
  

    <div  class='custom-control custom-switch'>
    <input  name='Dispo' type='checkbox' value='".$search_Produits["indisponible"]."' class='custom-control-input'  id='ss'/>
    <label  class='custom-control-label'for='ss'>Disponible</label>
    </div>
    </div>
    <input type='hidden'   name='REF' value = '".$search_Produits["refProduit"]."' />
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

<div class='modal fade' id='deletsearch_Produitsuit".$search_Produits["refProduit"]."' tabindex='-2' aria-labelledby='deleteP' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Are you sure you want to delete product # ".$search_Produits["refProduit"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

        <form action='produit.php' method='post'>
        <input type='hidden'   name='DELREF' value = '".$search_Produits["refProduit"]."' />
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
                                    ?>

                                     </tbody>
                                </table>
                        </div>
                        </div>
  











<?php 
include 'footer.php';?>