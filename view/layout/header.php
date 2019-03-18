		<div class="wrap_header fixed-header2 trans-0-4 show-fixed-header2">
		<!-- Logo -->
		<a href="index.php" class="logo">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="index.php">Home</a>
					</li>

					<li>
						<a href="index.php">Shop</a>
					</li>

					<li class="sale-noti">
						<a href="product.html">Sale</a>
					</li>

					<li>
						<a href="cart.html">Features</a>
					</li>

					<li>
						<a href="blog.html">Blog</a>
					</li>

					<li>
						<a href="about.html">About</a>
					</li>

					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<a href="#" class="header-wrapicon1 dis-block">
				<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti sl_cart"><?php if(isset($_SESSION['giohang']))  echo count($_SESSION['giohang']); else echo '0'; ?></span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<?php
							$total = 0;
							if(isset($_SESSION['giohang'])){
								$cart = $_SESSION['giohang'];
								foreach($cart as $k => $v){
								$total += $v['thanhtien'];
						?>
						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/<?php echo $v['hinh']?>" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									<?php echo $v['tensanpham']?>
								</a>

								<span class="header-cart-item-info">
									<?php echo $v['soluong']?> x $<?php echo $v['dongia']?>
								</span>
							</div>
						</li>
						<?php 
							}
						}
						?>
					</ul>

					<div class="header-cart-total">
						Total: $<span class="total_header"><?php echo number_format($total);?></span>
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="check-out.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

	