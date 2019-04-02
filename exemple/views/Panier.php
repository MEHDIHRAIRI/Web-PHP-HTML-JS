<?PHP
require '../core/GestionPanier/paniers.class.c.php';
$panier= new panier();

?>

	<head>

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/icomoon.css">

	<link rel="stylesheet" href="css/bootstrap.css">


	<link rel="stylesheet" href="css/flexslider.css">


	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">


	<link rel="stylesheet" href="css/style.css">


	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="store.js" async></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="index.html">Shop.</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li class="has-dropdown active">
							<a href="product.html">Shop</a>
							<ul class="dropdown">
								<li><a href="single.html">Single Shop</a></li>
							</ul>
						</li>
						<li><a href="about.html">About</a></li>
						<li class="has-dropdown">
							<a href="services.html">Services</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<li class="search">
							<div class="input-group">
						      <input type="text" placeholder="Search..">
						      <span class="input-group-btn">
						        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
						      </span>
						    </div>
						</li>
						<!-- Debut Total Des Produits -------------------------------------->

						<li class="shopping-cart"><a href="Panier.php" name="TotalProduits" class="cart" ><span><small><span id="countcart"><?php echo $panier->count(); ?></span></small><i class="icon-shopping-cart"></i></span></a></li>

											<!-- FIN Total Des Produits -------------------------------------->
					</ul>
				</div>
			</div>

		</div>
	</nav>


<!-- DeBut CONSULTER PANIER ---------------------------------------------------------------------------------->

<form method="POST" action="addCommande.php">
	<div id="fh5co-started" >

			<div class="row animate-box">

			<div class="row">
			<div class="span12">

			<div class="well well-small" style="margin-left:20% ; width:900px">
				<h1>Check Out <small class="pull-right"></small></h1>
			<hr class="soften"/>

			<table class="table table-striped" style="width:100%; ">
		              <thead>
		                <tr>
		                  <th>Produit</th>
											<th>Nom</th>
		                  <th>Prix</th>

                     <th>Quantite</th>
					        	</tr>
		              </thead>
<tbody class="cart-item">
									<?php
														if(!empty($_SESSION["panier"]))
														{
															$total = 0;
															foreach($_SESSION["panier"] as $keys => $values)
													 	{
										?>

				  <tr  class="cart-row" >
		                 <td><img width="100" src="images/<?php echo $values["item_id"]; ?>.jpg.jpg"></td>

		                  <td><?php echo $values["item_name"]; ?></td>

											<td class="priceCart"><?php print_r($values["item_price"]); ?> TND</td>

                      <td><input type="number" class="quantity" name="panier[qte][<?php print_r($values["item_id"]); ?>]" style="max-width:34px" placeholder="1" size="16" type="number" value="<?php print_r($values["item_quantity"]); ?>"></td>

											<td><a class="remove deletepanier" href="deletePanier.php?id=<?php echo $values["item_id"]; ?>" value="supprimer"  >
                     X
											</a>
										</td>



					 </tr>

					 <?php
					 $total = $total + $values["item_price"];
}


					 ?>

		               <tr>
		                  <td colspan="6" class="alignR">Total products:	</td>
		                  <td class="total"><?php print_r($total); ?>TND</td>
											<input type="hidden" name="prix" value="<?php print_r($total); ?>">
											<input type="hidden" name="qtte" value="<?php print_r(count($_SESSION["panier"])); ?>">
                  </tr>
									<?php
									}
									?>
						</tbody>
		            </table><br/>



			<a href="headerProduct.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>

      <input type="submit" class=" shopBtn btn-large pull-right" name="ajouter" value="ajouter">
		</div>

		</div>
	</div>


   </div>
	</div>

</form>
<!-- FIN CONSULTER PANIER ----------------------------------------------------------------------------------------->





	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>Shop.</h3>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">About</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Shop</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/" target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script type="text/javascript" src="app.js" ></script>

	</body>
