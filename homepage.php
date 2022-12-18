<?php include 'header.php'; ?>
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
                                
                                <table id="datatable" >
                                <thead>
                                    <tr>

                                        
                                        <th >#</th>
                                        <th>Nom</th>
                                        <th>Raison Sociale</th>
                                        <th >Adresse</th>
                                        <th>Ville</th>
                                        <th>Pays</th>
                                        <th>telephone</th>
                                        <th style="float: right;">Actions</th>
                                        
                                    </tr>
                                </thead>
                                    
                    
                       
                                    
                                <!-- CLIENT  INFO--> 
                                <tbody>

                                    <!-- !!!!!  define class ClientNumber !!!!! -->
                                    <?php foreach  ($Clients as $SingleClnt) {
                                        
                                  echo " <tr>
                                  <td>
                                  <div class='circle'>
                                  <h2>".$SingleClnt['numClient'] ." </h2>
                                    </div>
                                    </td>
                                <td>".$SingleClnt['NomClient']." </td>
                                    <td>".$SingleClnt['RaisonSociale']."</td>
                                    <td>".$SingleClnt['adresseClient']."</td>
                                    <td>".$SingleClnt['VilleClient']."</td>
                                    <td>".$SingleClnt['Pays']."</td>
                                    <td>".$SingleClnt['Telephone']."</td>
                                    <td> <h3>
                                        
                                    
                                        <i class=' trash BLUS fas fa-trash-alt'></i>
                                        
                                        
                                        <i class=' fas BLUS fa-edit'></i>

                                        <a href = '/client.php?id=".$SingleClnt['numClient']." '><i class='  fas BLUS fa-external-link-square-alt'></i></a>
                                        </h3>
                                    </td>
                                    
                                    </tr>";
                                    
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