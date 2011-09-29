<?php echo $this->fetch('header.html'); ?>
	<div id="wrapper">
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
							<a href=""><img src="data/files/mall/template/adv_bottom.jpg"/></a>       
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div id="nav_market">
				<ul>
					<li class="market_main">
						<a href="">Trang chinh</a>
					</li>
					<li class="market_stores">
						<a href="">Trang chinh</a>
					</li>
					<li class="market_products">
						<a href="">Trang chinh</a>
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
			<div class="commodity_assort">
				<?php $_from = $this->_var['gcategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
				<div class="cg_list">
					<div class="cg_details">
						<h6><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></h6>
					</div>
					<div class="cg_thumb">
						<img src="data/files/mall/template/adv_bottom.jpg"/>
						<a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_overlay"></a>
					</div>
					<div class="cg_stats">
						<a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_stat_small">
							<span class="count">12345</span>
							sản phẩm
						</a>
						<a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_stat_small">
							<span class="count">12345</span>
							cửa hàng
						</a>
						<a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_stat_small">
							<span class="count">12345</span>
							chủ đề
						</a>
					</div>
					<div class="clear"></div>
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
	</div>