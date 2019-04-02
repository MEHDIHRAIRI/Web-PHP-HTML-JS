<?PHP
include "C:/wamp64/www/exemple/core/commandeC.php";
$commande1C=new commandeC();
?>
	<head>
  </head>

	<body>
<!--DEBUT COMMANDE -------------------------------------------------------------------------------------------->
<div style="margin-top:10px; margin-bottom:20px; display: flex; background-color:A9A9A9; " >
 <?PHP

if(!empty($_SESSION["commande"]))
{
$idc=0;
$idcl=0;
$total = 0; ?>
  <table class="table table-borderless" style="margin-top:60px; margin-left:60px; margin-bottom:200px;
  background-color:white; width:300px ;
  border-radius:2px;

  position: relative;
  box-shadow: 0px 0px 2px #1c1a19;">
      <tr>

        <td>Commande N°: </td>

      </tr>
      <tr>

        <td>DATE: </td>

      </tr>

      <tr>

        <td>NOMBRE DE CTLG: </td>

      </tr>
      <tr>

        <td>VOTRE_ID: </td>

      </tr>

      <tr>

        <td class="table-active">PTS DE FIDELITE: </td>

      </tr>
			<tr>

				<td class="table-active">PRIX TOTAL: </td>

			</tr>

      <table class="table table-borderless" style="margin-top:60px; margin-right:50px;margin-bottom:200px;background-color:white; width:900px    ;


          position: relative;
          box-shadow: 2px 0px  2px#1c1a19;">
<tbody >
  <!--FIN COMMANDE -------------------------------------------------------------------------------------------->

<?PHP

foreach($_SESSION["commande"] as $row => $values)
{
?>
  <tr>

    <td><?PHP echo $values; ?></td>

  </tr>
  <?PHP
  if($total==0)
  {
    $idc=(int)$values;
  }
  if($total==3)
  {
    $idcl=(int)$values;
    ?>
    <?PHP
    $pts_f=$commande1C->afficherPTSFidelite($idcl);
    foreach($pts_f as $row){
    	?>
    	<tr>
    	<td><?PHP echo $row['PTS_FIDELITE']; ?></td>
    	</tr>
    	<?PHP
    }
  }
  $total++;
}
?>
   </table>
  
          <table class="table table-bordered" style=" margin-top:60px; margin-left:20px; margin-right:150px;margin-bottom:200px; background-color:white; ">
            <thead>
              <tr>
                <th scope="col" class="table-light">Nom_Produit</th>
                <th scope="col" class="table-light">Qte_Produit</th>
                <th scope="col" class="table-light">PRIX_Produit</th>
                <th scope="col" class="table-light">TOTAL</th>
              </tr>
            </thead>
            <tbody>
              <?PHP
              $listeProduits=$commande1C->afficherDetailsCommandeEnCours($idc);
              foreach($listeProduits as $row){
              	?>
            	<tr>
            	<td><?PHP echo $row['Nom_Produit']; ?></td>
            	<td><?PHP echo $row['Qte_Produit']; ?></td>
            	<td><?PHP echo $row['PRIX_Produit']; ?></td>
            	<td><?PHP echo $row['TOTAL']; ?></td>
            	</tr>
            	<?PHP
            }

            $_SESSION["panier"]=array();
            $_SESSION["commande"]=array();
            }
            ?>
            </tbody>


          </table>
</table>
</div>


              <!--FIN COMMANDE -------------------------------------------------------------------------------------------->


	
	</body>
