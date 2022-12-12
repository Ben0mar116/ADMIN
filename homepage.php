<?php 
// innitialise variables from database
require_once('databaseHandler.php');
 $Connection = new Databases;

$Clients=    $Connection->fetchALL('client');
$ClientsCommandeS=    $Connection->fetchALL('commande');
?>


<!DOCTYPE html>
<html dir='ltr' lang='en'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='keywords'
        content='wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template'>
    <meta name='description'
        content='Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework'>
    <meta name='robots' content='noindex,nofollow'>
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel='canonical' href='https://www.wrappixel.com/templates/ample-admin-lite/' />
    <!-- Favicon icon -->
    <link rel='icon' type='image/png' sizes='16x16' href='plugins/images/favicon.png'>
    <!-- Custom CSS -->
    <link href='plugins/bower_components/chartist/dist/chartist.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css'>
    <!-- Custom CSS -->
    <link href='css/style.min.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    
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


                    <div class='homeLOGO'>
                        
                        <h1>
                            <i class='fas fa-home'></i>
                            </h1>
                            
                    </div>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class='navbar-nav ms-auto d-flex align-items-center'>






                    <div class='position-absolute top-50 start-50 translate-middle'>

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                        
                        <form role='search' class='app-search d-none d-md-block me-3'>
                            <input type='text' placeholder='Search...' class='form-control mt-0'>
                            <a href='' class='active'>
                                <i class='fa fa-search'></i>
                            </a>
                        </form>
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
                                    <h3 class='box-title mb-0 ' style="margin-top: 50px;">Clients</h3>
                                </div>
                                <?php 
                                foreach ($Clients as $SingleClnt) {
                                    # code...
                                    echo "<div class='comment-widgets'>
                                    
                                    
                                    <div class='d-flex flex-row comment-row p-3 mt-0'>
                                    <div class='p-2'><img src='plugins/images/users/varun.jpg' alt='user' width='50' class='rounded-circle'></div>
                                    <div class='comment-text ps-2 ps-md-3 w-100'>
                                        
                                    <!-- CLIENT  INFO--> 
                                    
                                    <h5 class='font-medium'>".$SingleClnt['NomClient']. " &nbsp ".$SingleClnt['RaisonSociale']." <span class = 'ClientNumber'> ".$SingleClnt['numClient']." </span> </h5>  
                                    
                                            <!-- !!!!!  define class ClientNumber !!!!! -->



                                    <span class='mb-3 d-block'>Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                    <div class='comment-footer d-md-flex align-items-center'>
                                    
                                    
                                    <div class='text-muted fs-2 ms-auto mt-2 mt-md-0'>April 14, 2021</div>
                                    </div>
                                </div>
                            </div>
                        
                            </div>";
                        }
                            ?>
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
    <script src='plugins/bower_components/jquery/dist/jquery.min.js'></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src='bootstrap/dist/js/bootstrap.bundle.min.js'></script>
    <script src='js/app-style-switcher.js'></script>
    <script src='plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js'></script>
    <!--Wave Effects -->
    <script src='js/waves.js'></script>
    <!--Menu sidebar -->
    
    <!--Custom JavaScript -->
    <script src='js/custom.js'></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src='plugins/bower_components/chartist/dist/chartist.min.js'></script>
    <script src='plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js'></script>
    <script src='js/pages/dashboards/dashboard1.js'></script>
</body>

</html>