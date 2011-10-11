<?php echo $this->fetch('header.html'); ?>
	<div id="wrapper" class="markets">
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
							<a href=""><img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/></a>       
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div id="nav_market">
				<ul>
					<li class="market_main selected">
						<div></div>
						<a href="<?php echo url('app=markets'); ?>">Công nghiệp xây dựng</a>
					</li>
					<li class="market_stores">
						<div></div>
						<a href="<?php echo url('app=markets_store'); ?>">Cửa hàng</a>
					</li>
					<li class="market_products">
						<div></div>
						<a href="<?php echo url('app=markets_product'); ?>">Sản phẩm</a>
					</li>
					<li class="last">
						<div></div>
						<a href=""></a>
					</li>
				</ul>
				<div id="market_search_field">
					<form method="get" action="" name="">
						<label class="structural structural" for="marketsearch">Tìm sản phẩm</label>
						<input id="marketsearch" type="text" class="search_box populate" title="Tìm sản phẩm" name=""/>
						<input type="hidden" id="market" value="12" name="categry"/>
						<input class="spyglass" type="image" src="<?php echo $this->res_base . "/" . 'images/pix.gif'; ?>"/>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			
			<div id="com_main_market">
				<div id="best_sellers" class="category">
					<h4 class="heading_sub">
						Sản phẩm bán chạy  
						<span class="link">
							<a href="/markets/11-indie-music/products">
								Xem tất cả
								<span class="number">123456</span>
								sản phẩm →
							</a>
						</span>
					</h4>
					<div class="gallery">
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<!--<span class="promotion" style="position:absolute;right:0;top:0;height:21px;"><span style="background:url(<?php echo $this->res_base . "/" . 'images/logo.gif'; ?>) no-repeat 0 0">Giam 5%</span></span>-->
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert last">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div id="most_faved" class="category">
					<h4 class="heading_sub">
						Sản phẩm nhiều người thích	  
						<span class="link">
							<a href="/markets/11-indie-music/products">
								Xem tất cả
								<span class="number">
									123456
								</span>
								  sản phẩm →
							</a>
						</span>
					</h4>
					<div class="gallery">
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div id="recently_forum" class="category">
					<h4 class="heading_sub">
						Chủ đề gần đây	  
						<span class="link">
							<a href="/markets/11-indie-music/products">
								Xem forum →
							</a>
						</span>
					</h4>
					<div class="gallery">
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert last">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="product_vert">
							<div class="thumb thumb_152">
								<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
								<span class="item_price"><span>1.000.000 Đ</span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">Tên sản phẩm</a></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
			<div id="com_sidebar_market">
				<a id="btn_explore_forum" href="">Xem forum</a>
				<div id="top_stores" class="sidebox">
					<div class="title">Top cửa hàng bán chạy</div>
					<ul>
						<li class="first">
							<a class="block_link" href="">
								<span class="thumb thumb_42">
									<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
									<div class="cropper"></div>
								</span>
								<div class="item_details">
									<span class="top_detail">Ten cua hang ban san pham</span>
									<br/>
									<span class="sub_detail">Dia chi cua hang</span>
								</div>
							</a>
						</li>
						<li class="">
							<a class="block_link" href="">
								<span class="thumb thumb_42">
									<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
									<div class="cropper"></div>
								</span>
								<div class="item_details">
									<span class="top_detail">Ten cua hang ban san pham</span>
									<br/>
									<span class="sub_detail">Dia chi cua hang</span>
								</div>
							</a>
						</li>
						</li>
						<li class="last">
							<a class="block_link" href="">
								<span class="thumb thumb_42">
									<img src="data/files/mall/template/tdh-1_medium.jpg" alt=""/>
									<div class="cropper"></div>
								</span>
								<div class="item_details">
									<span class="top_detail">Ten cua hang ban san pham</span>
									<br/>
									<span class="sub_detail">Dia chi cua hang</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
	</div>