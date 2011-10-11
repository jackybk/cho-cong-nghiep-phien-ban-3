<?php echo $this->fetch('header.html'); ?>
	<div id="wrapper">
		<?php echo $this->fetch('curlocal.html'); ?>
		<div class="content content-wtop">
			<div class="main-adv" style="margin-bottom: 0px;">
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
		</div>
		<div class="content content-wbot">
			<div id="left">
				<div class="module_sidebar">
					<div id="module_menu">
						<div id="molude_menu_body">
							<ul id="menulist">
								<?php $_from = $this->_var['scategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'scategory');if (count($_from)):
    foreach ($_from AS $this->_var['scategory']):
?>
								<li>
									<a href="<?php echo url('app=search&cate_id=' . $this->_var['scategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['scategory']['value']); ?></a>
									<ul>
										<?php $_from = $this->_var['scategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
										<li>
											<a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a>
										
										</li>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
								</li>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</ul>
						</div>
						<div id="molude_menu_bottom"></div>
					</div>
				</div>
			</div>
			<div id="right">
				<div class="module_scategory padding5">
					<?php $_from = $this->_var['scategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'scategory');if (count($_from)):
    foreach ($_from AS $this->_var['scategory']):
?>
					<div class="cs_dir_category">
						<h6>
							<a href="<?php echo url('app=search&cate_id=' . $this->_var['scategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['scategory']['value']); ?></a>	
						</h6>
						<a href="">
							<img src="data/files/store_1583/goods_131/small_201104270728516245.png" alt="<?php echo htmlspecialchars($this->_var['scategory']['value']); ?>"/>
						</a>
						<ul class="cs_dir_sub">
							<?php 
								$i=1;
								$j=1;
							?>
							<?php $_from = $this->_var['scategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
							
								<?php 
								if($i<=3)
								{
								?>
								<li><a class="sub_scate" href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></li>
								<?
								}
								$i++;
								$j++;
								?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								<?php
								if($j>=4)
								{
								?>
								<li><a class="sub_scate_more" href="<?php echo url('app=search&cate_id=' . $this->_var['scategory']['id']. ''); ?>">Xem thêm</a></li>
								<?php
								}
								?>
						</ul>
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php echo $this->fetch('footer.html'); ?>
	</div>