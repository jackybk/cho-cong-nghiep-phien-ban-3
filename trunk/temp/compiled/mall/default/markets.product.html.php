<?php echo $this->fetch('header.html'); ?>
	<div id="wrapper" class="product">
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
			<div class="gallery wide">
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert last">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert last">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product_vert">
					<div class="thumb thumb_177">
						<img src="data/files/mall/template/tdh-1_medium.jpg"/>
						<span class="item_price"><span>1.000.000.000</span></span>
						<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>">Tên sản phẩm thuộc danh mục</a>
					</div>
					<div class="item_details">
						<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Link san pham</a></p>
						<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>">Cửa hàng bán sản phẩm</a></p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
	</div>