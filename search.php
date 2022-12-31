<?php 
include 'header.php';


if (isset($_GET['query'])) {
    $get_query = $_GET['query'];
    
    $search_CLient = $Connection->verify_query('client'  , $get_query);
    $search_Produit = $Connection->verify_query('produit'  , $get_query);
    $search_Commande = $Connection->verify_query('commande'  , $get_query);
    
}
?>








<?php 
include 'footer.php';?>