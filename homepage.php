<?php include 'header.php'; ?>



<?php 
if (isset($_POST["NomClient"])) {
    $values = array($_POST["NomClient"] , $_POST["RaisonSociale"] ,$_POST["adresseClient"] ,$_POST["VilleClient"] ,$_POST["Pays"] ,$_POST["Telephone"]);
    // var_dump($values);
    $Connection->InsertValues('Client' , $values);
    





    $Clients=    $Connection->fetchALL('client');

    # code...
}
if (isset($_POST["ID"])) {
    $id = $_POST["ID"];
        $values = array($_POST["nameCLT"] , $_POST["RaisonSociale"] ,$_POST["adresseClient"] ,$_POST["VilleClient"] ,$_POST["Pays"] ,$_POST["Telephone"]);
    // var_dump($values);
    $Connection->ModifyValues('Client' ,$id , $values);
    





    $Clients=    $Connection->fetchALL('client');

    # code...
}

?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        
                    <!-- .col -->
                
                    <div class='col-md-12 col-lg-12 col-sm-12'>
                        <div class='card white-box p-0'>
                                <div class='card-body'>
                                    <h3 class='box-title mb-0 ' style='margin-top: 30px;'>Clients</h3>
                                </div>
                                
                                <table id='datatable' >
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
                                    <?php foreach  ($Clients as $SingleClnt) {
                                        
                                  echo " <tr>
                                  <td>
                                  <div class='circle'>
                                  <h2>".$SingleClnt["numClient"] ." </h2>
                                    </div>
                                    </td>
                                    <td>".$SingleClnt["NomClient"]." </td>
                                    <td>".$SingleClnt["RaisonSociale"]."</td>
                                    <td>".$SingleClnt["adresseClient"]."</td>
                                    <td>".$SingleClnt["VilleClient"]."</td>
                                    <td>".$SingleClnt["Pays"]."</td>
                                    <td>".$SingleClnt["Telephone"]."</td>
                                    <td> <h3>
                                        
                                    
                                        <i class=' trash BLUS fas fa-trash-alt'></i>
                                        
                                        
                                        <a href = ''data-bs-toggle='modal' data-bs-target='#editClient".$SingleClnt["numClient"]."'><i class=' fas BLUS fa-edit'></i></a>

                                        <a href = '/client.php?id=".$SingleClnt["numClient"]." '><i class='  fas BLUS fa-external-link-square-alt'></i></a>
                                        </h3>
                                    </td>
                                    
                                    </tr>
                                    
                                    <!-- edit Client -->
    <div class='modal fade' id='editClient".$SingleClnt["numClient"]."' tabindex='-1' aria-labelledby='editC' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='editC'>Modifier un Client # ".$SingleClnt["numClient"]." </h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form action='homepage.php' method='post'>
            
            <div class='form-floating mb-2'>
    <input type='text'   name='nameCLT' class='form-control' value='".$SingleClnt["NomClient"]." ' required id='floatingInput' placeholder=' '/>
    <label for='floatingInput'>Nom du Client<span class='required'>*</span></label>
</div>


    <div class='form-floating mb-2'>
    <input type='text'  name='RaisonSociale'  value = '".$SingleClnt["RaisonSociale"]." ' required class='form-control' id='RS' placeholder=' '/>
    <label for='RS'>Raison Sociale <span class='required'>*</span></label>
    </div>
    <div class='form-floating mb-2'>
    <input class='form-control' name='adresseClient'  value = '".$SingleClnt["adresseClient"]." ' required rows='3' id='comment' placeholder=' '/>
    <label for='comment'>Adresse<span class='required'>*</span></label>
    </div>
    <div style='display: grid; grid-template-columns: 1fr 1fr;'>

        <div class='form-floating mb-2'>
            
            <input type='text' style='width:220px;' value = '".$SingleClnt["Pays"]." '  name='Pays' class='form-control' id='floatingInput' placeholder='Maroc'  value='Maroc'  />
            <label for='comment'>Pays</label>
        </div>
        <div class='form-floating mb-2' style='margin-left: 15px;'>
            
            <input type='text' style='width:220px;' value = '".$SingleClnt["VilleClient"]." '  name='VilleClient' required class='form-control' id='floatingInput' placeholder=' '  />
            <label for='comment'>Ville<span class='required'>*</span></label>
        </div>
      
    </div>
    
    <div class='form-floating mb-2'>
            
            <input type='tel'   name='Telephone' value = '".$SingleClnt["Telephone"]." ' class='form-control'  required id='floatingInput' placeholder=' '  />
            <label for='comment'>Telephone<span class='required'>*</span></label>
            </div>
            <input type='hidden'   name='ID' value = '".$SingleClnt["numClient"]." ' />
        


          





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


                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    " ;
                                    
                                } ?>
                        </tbody>
                            </table>
                          
                                        
                            
                                       

                            
                            
                        </div>
                        </div>


















                                   
                                                
                          
                    </div>
                </div>
                
                <!-- /.col -->
             
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
  <?php 
  include 'footer.php';
  ?>