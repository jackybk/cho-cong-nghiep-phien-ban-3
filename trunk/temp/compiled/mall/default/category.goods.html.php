<?php echo $this->fetch('header.html'); ?>
	<div id="wrapper">
		<?php echo $this->fetch('curlocal.html'); ?>
		<div class="content content-wrap">
			<div class="main-adv">
				<div id="module_middle">
					<div class="slider-wrapper theme-default">
						<div class="ribbon"></div>
						<div id="slider" class="nivoSlider">
							<a href=""><img src="data/files/mall/template/201108251011061705.png" width="610" height="280" title="" alt=""/></a>       
							<a href=""><img src="data/files/mall/template/201108251011063049.png" width="610" height="280" title="" alt=""/></a>
							<a href=""><img src="data/files/mall/template/201108251011065593.png" width="610" height="280" title="" alt=""/></a>
							<a href=""><img src="data/files/mall/template/201108251011065223.png" width="610" height="280" title="" alt=""/></a>
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
							<a href="" title=""><img src="data/files/mall/template/adv_top.png" alt=""/></a>       
						</div>
						<div class="module-adv-bottom">
							<a href="" title=""><img src="data/files/mall/template/adv_bottom.jpg" alt=""/></a>       
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div id="sort_bar">
				<ul>
					<li class="first_sort">
						<span>Sắp xếp theo</span>
					</li>
					<li class="sort_by selected">
						<div></div>
						<a href="">Phổ biết nhất</a>
					</li>
					<li class="sort_by">
						<div></div>
						<a href="">Mới nhất</a>
					</li>
					<li class="sort_by">
						<div></div>
						<a href="">Theo ABC</a>
					</li>
					<li class="last">
						<div></div>
					</li>
				</ul>
			</div>
			<div class="commodity_assort">
				<?php $_from = $this->_var['gcategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
				<div class="cg_list">
					<div class="cg_details">
						<h6><span><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></span></h6>
					</div>
					<div class="cg_thumb">
						<img src="data/files/mall/template/adv_bottom.jpg" title="" alt=""/>
						<a href="<?php echo url('app=markets&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_overlay" title="<?php echo htmlspecialchars($this->_var['gcategory']['value']); ?>"></a>
					</div>
					<div class="cg_stats">
						<a href="<?php echo url('app=markets&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_stat_small" title="">
							<span class="count">12345</span>
							sản phẩm
						</a>
						<a href="<?php echo url('app=markets&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_stat_small" title="">
							<span class="count">12345</span>
							cửa hàng
						</a>
						<a href="<?php echo url('app=markets&cate_id=' . $this->_var['gcategory']['id']. ''); ?>" class="cg_stat_small" title="">
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