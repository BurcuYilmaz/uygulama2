<?php require "include/header.php";?>

<section class="page-header page-header-classic page-header-lg">
					<div class="container">
                    <div class="row">

<div class="col-md-12 align-self-center p-static order-2 text-center">

    <h1 class="text-light font-weight-bold text-8">Ürünler</h1>

</div>

</div>
					
					</div>
				</section>
			<div role="main" class="main shop py-4">

				<div class="container">

					<div class="row">
						<div class="col-lg-3">
							<aside class="sidebar">
								<form action="<?php echo "urun";?>" method="get">
									<div class="input-group mb-3 pb-1">
										<input class="form-control text-1" placeholder="Ara..." name="aranan" id="aranan" type="text">
										<span class="input-group-append">
											<button type="submit"  class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
										</span>
									</div>
								</form>
								<h5 class="font-weight-bold pt-3">Sektörler</h5>
								<ul class="nav nav-list flex-column">
                                    <?php 
                                    $kategoriler=$db->query("SELECT * FROM productcategories")->fetchAll(PDO::FETCH_OBJ);
                                    foreach($kategoriler as $kategorirow){?>
                                    <?php $kategori_id=$kategorirow->id;
                                    $kategori_adi=$kategorirow->category; ?>
                               
									<li class="nav-item"><a class="nav-link" href="<?php echo "urunler-".$kategori_id; ?>"><?php echo $kategori_adi; ?></a></li>
									<?php }?>
								</ul>
								
							</aside>
						</div>
						<?php if( empty(@$_GET["urun"]) ){?>
					
						<div class="col-lg-9">

                        <div class="masonry-loader masonry-loader-showing">
						<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        <?php  $urunler=$db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_OBJ);
							   foreach($urunler as $urunrow){?>
							   <?php 
							   $urun_id=$urunrow->id;
								$urun_adi=$urunrow->productName; 
                                $urun_resim=$urunrow->productImage;   
                                $baslangic_tarihi=$urunrow->offerCreateTime; 
							   ?>
							<div class="col-12 col-sm-6 col-lg-3 product">
								<span class="product-thumb-info border-0">
								
									<a href=<?php echo "urundetay-".$urun_id; ?> class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Teklif Ver</span>
									</a>
									
									<a href="<?php echo "urundetay-".$urun_id; ?>">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="<?php echo $urun_resim; ?>" style="height: 15rem;">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="<?php echo "urundetay-".$urun_id; ?>">
											<h4 class="text-4 text-dark"><?php echo $urun_adi; ?></h4>
											<span class="price">
												<h6><?php echo iconv('latin5','utf-8',strftime(' %d %B %Y  ',strtotime( $baslangic_tarihi)));?></h6>
											</span>
										</a>
									</span>
								</span>
							</div>
                               <?php }?>
						</div>
						
					</div>

						</div>
							   <?php }?>
							   <?php if( !empty(@$_GET["urun"]) ){?>
					           <?php $gelen_id=$_GET["urun"]; ?>
					<div class="col-lg-9">

					<div class="masonry-loader masonry-loader-showing">
					<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
					<?php  $urunler=$db->query("SELECT * FROM products WHERE 	categoryId=$gelen_id")->fetchAll(PDO::FETCH_OBJ);
					if(count($urunler)>0){?>
						   <?php foreach($urunler as $urunrow){?>
						   <?php 
						   $urun_id=$urunrow->id;
							$urun_adi=$urunrow->productName; 
							$urun_resim=$urunrow->productImage;   
							$baslangic_tarihi=$urunrow->offerCreateTime; 
						   ?>
						<div class="col-12 col-sm-6 col-lg-3 product">
							<span class="product-thumb-info border-0">
								<a href="<?php echo "urundetay-".$urun_id; ?>" class="add-to-cart-product bg-color-primary">
									<span class="text-uppercase text-1">Teklif Ver</span>
								</a>
								<a href="<?php echo "urundetay-".$urun_id; ?>">
									<span class="product-thumb-info-image">
										<img alt="" class="img-fluid" src="<?php echo $urun_resim; ?>" style="height: 15rem;">
									</span>
								</a>
								<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
									<a href="<?php echo "urundetay-".$urun_id; ?>">
										<h4 class="text-4 text-dark"><?php echo $urun_adi; ?></h4>
										<span class="price">
											<h6><?php echo iconv('latin5','utf-8',strftime(' %d %B %Y  ',strtotime( $baslangic_tarihi)));?></h6>
										</span>
									</a>
								</span>
							</span>
						</div>
						   <?php }?><?php }?>
						
					</div>
					
				</div>
				<?php if(count($urunler)<=0){?>
					<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">

								<h1 class="text-dark font-weight-bold text-8">İlan bulunmamakta</h1>

							</div>

						</div>
					</div>
				</section>
							<?php }?>

					</div>
						   <?php }?>
							   
					</div>
				</div>

			</div>
			
			<?php require "include/footer.php";?>
		
