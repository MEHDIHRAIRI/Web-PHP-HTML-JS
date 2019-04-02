<?PHP
include "C:/wamp64/www/exemple/entities/commande.php";
include "C:/wamp64/www/exemple/core/commandeC.php";
if (isset($_POST['save']))
{ $msg = "";
      $cmd=new commande($address1=$_POST['address1'],$address2=$_POST['address2'],$ville=$_POST['ville'],$zip=$_POST['zip'],$phone=$_POST['phone']);
      $commande1C=new commandeC();
      $commande1C->ajouterCommande($cmd);
}
?>