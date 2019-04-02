<?PHP
include "C:/wamp64/www/exemple/entities/commande.php";
include "C:/wamp64/www/exemple/core/commandeC.php";
$commande=new commandeC();
$listecommande=$commande->afficherTouTCommande();
?>
<table border="1">
<tr>
<td>First_name</td>
<td>Product_title</td>
<td>Price</td>
<td>Tax</td>
<td>Quantity</td>
<td>Description</td>
<td>Sale</td>
<td>Category</td>
<td>numero</td>
<td>size_xs</td>
<td>size_S</td>
<td>size_M</td>
<td>size_L</td>
<td>final_price</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listecommande as $row){
	?>
		<tr>
            <td style="text-align: center;"><?php echo $row['address1'] ?></td>
            <td style="text-align: center;"><?php echo $row['address2'] ?></td>
            <td style="text-align: center;"><?php echo $row['ville'] ?></td>
            <td style="text-align: center;"><?php echo $row['zip'] ?></td>
            <td style="text-align: center;"><?php echo $row['phone'] ?></td>
		</tr>
	
	</tr>
	<?PHP
}
?>
</table>