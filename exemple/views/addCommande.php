<?php
include "../core/paniers.class.c.php";
include "../entities/commande.class.php";
$panier= new panier();
$listeC1=array();
$listeC=array();
if (isset($_POST["panier"]["qte"])) {
//var_dump($_POST);
 $totalPrix=$panier->recalculer($_POST["panier"]["qte"]);

 $nbProduit=$panier->Total_nb($_POST["panier"]["qte"]);
 $totalQTE=(int)$panier->Total_QTE($_POST["panier"]["qte"]) ;
 $IDClient=1;
  $NomProduit= $panier->listeNom($_POST["panier"]["qte"]);
  $IdProduit= $panier->listeID($_POST["panier"]["qte"]);
  $PrixProduits= $panier->listePrix($_POST["panier"]["qte"]);
  ?><p>***************$liste Prix produits***********</p><?php
  var_dump($PrixProduits);
 $QTEProduits= $panier->listeQTE($_POST["panier"]["qte"]);
 ?><p>***************$liste $QTEProduits produits***********</p><?php
 var_dump($QTEProduits);

$commande1=new commande($nbProduit,$totalPrix,$IDClient);
$commande1C=new commandeC();
$commande1C->ajouterCommande($commande1);
$listeC=$commande1C->afficherCommandeEnCours($commande1);
?><p>***************$listeC***********</p><?php
var_dump($listeC);
//$listeC=$commande1C->afficherCommandeEnCours($commande1);
$i=0;
foreach ($listeC as $key => $value) {
  // code...
  ?><p>***************$listeC row***********</p><?php
  var_dump($key);
  var_dump($value);
  if($i==0)
  $id_commande = (int)$value;
  ?><p>**************************</p><?php
  if($i==4)
  $id_client =$value;
  ?><p>**************************</p><?php
  if($i==1)
  $date_commande =$value;
  ?><p>**************************</p><?php
  if($i==2)
  $totalPrix_commande =$value;
  ?><p>**************************</p><?php
  if($i==3)
  $nbProduit_commande =$value;

  $i++;
}

$listeC1=array($id_commande,$date_commande,$nbProduit_commande,$id_client,$totalPrix_commande);
?><p>***************TABLEAU POUR VIRTUELLE***********</p><?php
var_dump($listeC1);
$commandeD1=new commandeDetails($id_commande,$NomProduit,$IdProduit,$PrixProduits,$QTEProduits);
  ?><p>***************Class detail commande***********</p><?php
var_dump($commandeD1);
?><p>***************nbr total produits***********</p><?php
var_dump((int)$nbProduit_commande);
$commande1C->ajouterDetailsCommande($commandeD1,(int)$nbProduit_commande);


?><p>**************************</p><?php
$panier->addCommandeVirtuelle($listeC1);
//var_dump($listeC1);
header('location:commande.php');
}
//header('location:commande.php');

 ?>
