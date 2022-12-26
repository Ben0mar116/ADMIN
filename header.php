<?php 
// innitialise variables from database
require_once('databaseHandler.php');
 $Connection = new Databases;

$Clients= $Connection->fetchALL('client');
$ClientsCommandeS= $Connection->fetchALL('commande');
?>


<!DOCTYPE html>
<html dir='ltr' lang='en'>

<head>
    <script>
        
    </script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='keywords'
        content='wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template'>
    <meta name='description'
        content='Ample admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework'>
    <meta name='robots' content='noindex,nofollow'>
    <title>Gestion Commerciale</title>
    <link rel='canonical' href='https://www.wrappixel.com/templates/ample-admin-lite/' />
    <!-- Favicon icon -->
    <link rel='icon' type='image/png' sizes='16x16' href='plugins/images/favicon.png'>
    <!-- Custom CSS -->
    <link href='plugins/bower_components/chartist/dist/chartist.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css'>
    <!-- Custom CSS -->
    <link href='css/style.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.1/sl-1.5.0/datatables.min.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/sl-1.5.0/datatables.min.css"/> -->
 
 
    
    <link href='css/style.css' rel='stylesheet'>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    <!-- MODALS-->



    <!-- CLIENT MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="homepage.php" method="post">
            
            <div class="form-floating mb-2">
    <input type="text"   name="NomClient" class="form-control" required id="floatingInput" placeholder=" "/>
    <label for="floatingInput">Nom du Client<span class="required">*</span></label>
</div>


    <div class="form-floating mb-2">
    <input type="text"  name="RaisonSociale"  required class="form-control" id="RS" placeholder=" "/>
    <label for="RS">Raison Sociale <span class="required">*</span></label>
    </div>
    <div class="form-floating mb-2">
    <textarea class="form-control" name="adresseClient" required rows="3" id="comment" placeholder=" "></textarea>
    <label for="comment">Adresse<span class="required">*</span></label>
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr;">

        <div class="form-floating mb-2">
            
            <input type="text" style="width:220px;"  name="Pays" class="form-control" id="floatingInput" placeholder="Maroc"  value="Maroc"  />
            <label for="comment">Pays</label>
        </div>
        <div class="form-floating mb-2" style="margin-left: 15px;">
            
            <input type="text" style="width:220px;"  name="VilleClient" required class="form-control" id="floatingInput" placeholder=" "  />
            <label for="comment">Ville<span class="required">*</span></label>
        </div>
      
    </div>
    
    <div class="form-floating mb-2">
            
            <input type="tel"   name="Telephone" class="form-control"  required id="floatingInput" placeholder=" "  />
            <label for="comment">Telephone<span class="required">*</span></label>
        </div>
        


            <!-- <input type="text" name="RaisonSociale">
            <input type="text" name="Adresse">
            <input type="text" name="Pays" placeholder="Maroc">
            <input type="text" name="Ville">
            <input type="text" name="Telephone"> -->






<!-- zwa9 -->

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Confirmer</button>
</div>
</form>
    </div>
  </div>
</div>



                                                <!-- PRODUCT MODAL -->

    <div class="modal fade" id="produitMODAL" tabindex="-1" aria-labelledby="Product" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Product">Ajouter un Produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="produit.php" method="post">
            
        <div class="form-floating mb-2">
    <input type="text"   name="NomProduitInsert" class="form-control" required id="floatingInput" placeholder=" "/>
    <label for="floatingInput">Nom du Produit<span class="required">*</span></label>
</div>


    <div class="form-floating mb-2">

    <input id="postfix" value="$" name="PUnitaire"type="text" id="form2" class="form-control"  required placeholder=" "/>
    <label  for="form2" >Prix Unitaire <span class="required">*</span></label>
    </div>
    <div class="form-floating mb-2">
    <input type="number"  name="QteStock"  required class="form-control" id="RS" placeholder=" "/>
    <label for="RS">Quantite du Stock <span class="required">*</span></label>
    </div>


    <div  class="custom-control custom-switch">
  <input  name="Dispo" type="checkbox" value="" class="custom-control-input"  id="customSwitches">
  <label  class="custom-control-label" for="customSwitches">Disponible</label>
</div>
       

<!-- zwa9 -->

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Confirmer</button>
</div>
</form>
    </div>
  </div>
</div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id='main-wrapper' data-layout='vertical' data-navbarbg='skin5' 
      data-header-position='absolute' data-boxed-layout='full'>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class='topbar' data-navbarbg='skin5'>
            <nav class='navbar top-navbar navbar-expand-md navbar-dark'>
                
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class='navbar-collapse collapse' id='navbarSupportedContent' data-navbarbg='skin5'>

    <a href="homepage.php">

        <div class='homeLOGO'>
            
            <h1>
                <i class='fas fa-home'></i>
            </h1>
            
        </div>
    </a>

    <a href="produit.php">

<div class='homeLOGO'>
    
    <h1>
        <i class='fas fa-cubes'></i>
    </h1>
    
</div>
</a>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class='navbar-nav ms-auto d-flex align-items-center'>

                    <div class='position-absolute top-50 start-50 translate-middle'>

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                        
                        <form role='search' class='app-search d-none d-md-block me-3'>
                            <input type='text' placeholder='Search...' class='form-control mt-0' id="mySearchText">
                            <!-- <input type="text" id="mySearchText" placeholder="Search..."> -->

                            <a href='' class='active'>
                                <i class='fa fa-search'></i>
                            </a>
                        </form>
                    </div>
                    <!-- modal pop -->
                    <div class='position-absolute top-50 translate-middle'>
                        <div class="homeLOGO plus">


                    <a  class="" data-bs-toggle="modal" data-bs-target=
                    <?php
                   switch ($_SERVER['PHP_SELF']) {
                    case '/admin/client.php':
                       echo "#CommModal";                           
                        break;
                    case '/admin/homepage.php':
                       echo "#exampleModal";
                        break;
                    case '/admin/produit.php':
                       echo "#produitMODAL";
                        break;

                        case '/admin/LigneCommande.php':
                            echo "#LCOModal";
                             break;
                    
                    default:
                        # code...
                        break;
                        
                   }

                    ?>
                    ><h1>

                            <i class="fas fa-plus-circle" ></i>
                        </h1>
                    </a>
                            
                        </div>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                      
                    </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        