<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

//	Grabbing desserts
$desserts = $conn->query("SELECT * FROM products WHERE category='Dessert'");
$desserts->execute();

$allDesserts = $desserts->fetchAll(PDO::FETCH_OBJ);

//	Grabbing drinks
$drinks = $conn->query("SELECT * FROM products WHERE category='Drink'");
$drinks->execute();

$allDrinks = $drinks->fetchAll(PDO::FETCH_OBJ);

//	Grabbing dishes
$dishes = $conn->query("SELECT * FROM products WHERE category='Dish'");
$dishes->execute();

$allDishes = $dishes->fetchAll(PDO::FETCH_OBJ);

//	Grabbing fast food
$fastfoods = $conn->query("SELECT * FROM products WHERE category='Fast Food'");
$fastfoods->execute();

$allFastFoods = $fastfoods->fetchAll(PDO::FETCH_OBJ);

?>


<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Our Menu</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
				</div>

			</div>
		</div>
	</div>

</section>

<section class="ftco-section">
	<div class="container">

		<div class="row">


			<div class="col-md-6">
				<h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
				<?php foreach ($allDesserts as $dessert) : ?>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/<?php echo $dessert->image; ?>);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?php echo $dessert->name; ?></span></h3>
								<span class="price">$<?php echo $dessert->price; ?></span>
							</div>
							<div class="d-block">
								<p><?php echo $dessert->description; ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="col-md-6">
				<h3 class="mb-5 heading-pricing ftco-animate">Drinks</h3>
				<?php foreach ($allDrinks as $drink) : ?>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/<?php echo $drink->image; ?>);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?php echo $drink->name; ?></span></h3>
								<span class="price">$<?php echo $drink->price; ?></span>
							</div>
							<div class="d-block">
								<p><?php echo $drink->description; ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="col-md-6">
				<h3 class="mb-5 heading-pricing ftco-animate">Dishes</h3>
				<?php foreach ($allDishes as $dish) : ?>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/<?php echo $dish->image; ?>);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?php echo $dish->name; ?></span></h3>
								<span class="price">$<?php echo $dish->price; ?></span>
							</div>
							<div class="d-block">
								<p><?php echo $dish->description; ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="col-md-6">
				<h3 class="mb-5 heading-pricing ftco-animate">Fast Foods</h3>
				<?php foreach ($allFastFoods as $fastfood) : ?>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/<?php echo $fastfood->image; ?>);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?php echo $fastfood->name; ?></span></h3>
								<span class="price">$<?php echo $fastfood->price; ?></span>
							</div>
							<div class="d-block">
								<p><?php echo $fastfood->description; ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

	</div>
</section>

<section class="ftco-menu mb-5 pb-5">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Our Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>

		<div class="row d-md-flex">
			<div class="col-lg-12 ftco-animate p-md-5">

				<div class="row">

					<div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

							<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>

							<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Dishes</a>

							<a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Fast Foods</a>
						</div>
					</div>

					<div class="col-md-12 d-flex align-items-center">
						<div class="tab-content ftco-animate" id="v-pills-tabContent">
							
							<div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
								<div class="row">
									<?php foreach ($allDrinks as $drink) : ?>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a href="products/product-single.php?id=<?php echo $drink->id; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $drink->image; ?>);"></a>
												<div class="text">
													<h3><a href="products/product-single.php?id=<?php echo $drink->id; ?>"><?php echo $drink->name; ?></a></h3>
													<p><?php echo $drink->description; ?></p>
													<p class="price"><span>$<?php echo $drink->price; ?></span></p>
													<p><a href="products/product-single.php?id=<?php echo $drink->id; ?>" class="btn btn-primary btn-outline-primary">Show Product</a></p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>

							<div class="tab-pane fade show" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
								<div class="row">
									<?php foreach ($allDesserts as $dessert) : ?>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a href="products/product-single.php?id=<?php echo $dessert->id; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $dessert->image; ?>);"></a>
												<div class="text">
													<h3><a href="products/product-single.php?id=<?php echo $dessert->id; ?>"><?php echo $dessert->name; ?></a></h3>
													<p><?php echo $dessert->description; ?></p>
													<p class="price"><span>$<?php echo $dessert->price; ?></span></p>
													<p><a href="products/product-single.php?id=<?php echo $dessert->id; ?>" class="btn btn-primary btn-outline-primary">Show Product</a></p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
								<div class="row">
									<?php foreach ($allDishes as $dish) : ?>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a href="products/product-single.php?id=<?php echo $dish->id; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $dish->image; ?>);"></a>
												<div class="text">
													<h3><a href="products/product-single.php?id=<?php echo $dish->id; ?>"><?php echo $dish->name; ?></a></h3>
													<p><?php echo $dish->description; ?></p>
													<p class="price"><span>$<?php echo $dish->price; ?></span></p>
													<p><a href="products/product-single.php?id=<?php echo $dish->id; ?>" class="btn btn-primary btn-outline-primary">Show Product</a></p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>

							<div class="tab-pane" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
								<div class="row">
									<?php foreach ($allFastFoods as $fastfood) : ?>
										<div class="col-md-4 text-center">
											<div class="menu-wrap">
												<a href="products/product-single.php?id=<?php echo $fastfood->id; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $fastfood->image; ?>);"></a>
												<div class="text">
													<h3><a href="products/product-single.php?id=<?php echo $fastfood->id; ?>"><?php echo $fastfood->name; ?></a></h3>
													<p><?php echo $fastfood->description; ?></p>
													<p class="price"><span>$<?php echo $fastfood->price; ?></span></p>
													<p><a href="products/product-single.php?id=<?php echo $fastfood->id; ?>" class="btn btn-primary btn-outline-primary">Show Product</a></p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

	</div>
</section>

<?php require "includes/footer.php" ?>