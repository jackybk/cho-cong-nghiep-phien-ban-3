<?php echo $this->fetch('header.html'); ?>
	<div id="wrapper" class="stores">
		<?php echo $this->fetch('curlocal.html'); ?>
		<div class="content content-wrap">
			<div class="main-adv">
				<div id="module_middle">
					<div class="slider-wrapper theme-default">
						<div class="ribbon"></div>
						<div id="slider" class="nivoSlider">
							<a href=""><img src="data/files/mall/template/201108251011061705.png" width="610" height="280"/></a>       
							<a href=""><img src="data/files/mall/template/201108251011063049.png" width="610" height="280"/></a>
							<a href=""><img src="data/files/mall/template/201108251011065593.png" width="610" height="280"/></a>
							<a href=""><img src="data/files/mall/template/201108251011065223.png" width="610" height="280"/></a>
						</div>
					</div>
					<script type="text/javascript" src="includes/libraries/javascript/jquery.slider.js" charset="utf-8"></script>
					<script type="text/javascript">
						$(window).load(function() {
							$('#slider').nivoSlider();
						});
					</script>
				</div>
				<div class="sidebar-adv">
					<div class="module-adv">
						<div class="module-adv-top">
							<a href=""><img src="data/files/mall/template/adv_top.png"/></a>       
						</div>
						<div class="module-adv-bottom">
							<a href=""><img src="data/files/mall/template/tdh-1_medium.jpg"/></a>       
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div id="nav_market">
				<ul>
					<li class="market_main">
						<a href="<?php echo url('app=markets'); ?>">Trang chinh</a>
					</li>
					<li class="market_stores">
						<a href="<?php echo url('app=markets_store'); ?>">Trang chinh</a>
					</li>
					<li class="market_products">
						<a href="<?php echo url('app=markets_product'); ?>">Trang chinh</a>
					</li>
				</ul>
				<div id="market_search_field">
					<form method="get" action="" name="">
						<label class="structural structural" for="marketsearch">Tim san pham</label>
						<input id="marketsearch" type="text" class="search_box populate" title="tim san pham" name=""/>
						<input type="hidden" id="market" value="12" name="categry"/>
						<input class="spyglass" type="image"/>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			<div id="sort_bar" class="sort_market">
				<ul class="ul_sort_market">
					<li class="first_sort">
						<div></div>
							Sắp xếp theo
					</li>
					<li class="sort_by selected">
						<div></div>
						<a href="">Bán chạy</a>
					</li>
					<li class="sort_by">
						<div></div>
						<a href="">Mới nhất</a>
					</li>
					<li class="sort_by">
						<div></div>
						<a href="">Alphabetical</a>
					</li>
					<li class="last">
						<div></div>
						<a href=""></a>
					</li>
				</ul>
			</div>
			<div id="com_main_full" class="market">
				<div id="directory">
					<div class="store_vert">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert last">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert last">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
					<div class="store_vert">
						<h5><a class="store_name" href="">Tên cửa hàng thuộc danh mục</a></h5>
						<p class="store_location">Hai Bà Trưng, Hà nội</p>
						<div class="thumb thumb_117">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
						<div class="thumb thumb_57 right">
							<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
							<a class="cropper" href="">Tên cửa hàng</a>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
	</div>