<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_goods.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
var upimg   = '<?php echo $this->res_base . "/" . 'images/up.gif'; ?>';
var downimg = '<?php echo $this->res_base . "/" . 'images/down.gif'; ?>';
imgUping = new Image();
imgUping.src = upimg;
</script>
<div id="wrapper">
	<?php echo $this->fetch('curlocal.html'); ?>
	<div class="content content-wrap">
		<?php if ($this->_var['goods_list']): ?>
		<div id="left">
			<div class="module_sidebar">
				<div id="module_menu">
					<div id="molude_menu_body">
						<ul id="menulist">
							<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
							<li>
								<a href="<?php echo url('app=search&cate_id=' . $this->_var['scategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['category']['cate_name']); ?></a>
							</li>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</ul>
					</div>
					<div id="molude_menu_bottom"></div>
				</div>
				<div id="filters">
					<h2 class="head"><b>Tìm kiếm sản phẩm</b></h2>
					<h4><b>Tìm theo giá</b></h4>
					<div class="wrap">
						<div class="wrap_child">
							<div class="side_textlist">
								<ul ectype="ul_price" class="ul_price">
									<li class="search_price"><input type="text" size="10" maxlength="10"/> - <input type="text" size="10"  maxlength="10"/> <input type="button" id="search_by_price" value="Tìm" /></li>
									<li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>">1.000.000 - 3.000.000 Đ</a> (100)</li>
									<li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>">3.000.000 - 5.000.000 Đ</a> (123)</li>
									<li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>">5.000.000 - 10.000.000 Đ</a> (213)</li>
									<li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>">10.000.000 - 15.000.000 Đ</a> (223)</li>
									<li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>">15.000.000 - 30.000.000 Đ</a> (678)</li>
								</ul>
							</div>
							<div class="line"></div>
						</div>
					</div>
					<?php if (! $this->_var['filters']['brand']): ?>
					<h4><b>Hãng sản xuất</b></h4>
					<div class="wrap">
						<div class="wrap_child">
							<div class="side_textlist">
								<ul ectype="ul_brand" class="ul_brand">
									<?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_brand'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_brand']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_brand']['iteration']++;
?>
									<?php if ($this->_foreach['fe_brand']['iteration'] <= 10): ?>
									<li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>"><?php echo htmlspecialchars($this->_var['row']['brand']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
									<?php else: ?>
									<li style="display:none"><a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>"><?php echo htmlspecialchars($this->_var['row']['brand']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
									<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</ul>
							</div>
							<?php if ($this->_var['brand_count'] > 10): ?>
							<div class="more"><input type="button" class="brands_btn" value="Xem tất cả thương hiệu" id="show_brand" /></div>
							<?php endif; ?>
							<div class="line"></div>
						</div>
					</div>
					<?php endif; ?>

					<?php if (! $this->_var['filters']['region_id']): ?>
					<h4><b>Khu vực bán sản phẩm</b></h4>
					<div class="wrap">
						<div class="wrap_child">
							<div class="side_textlist">
								<ul ectype="ul_region" class="ul_region">
									<?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['fe_region'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_region']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['fe_region']['iteration']++;
?>
									<?php if ($this->_foreach['fe_region']['iteration'] <= 10): ?>
									<li><a href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo htmlspecialchars($this->_var['row']['region_name']); ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
									<?php else: ?>
									<li style="display:none"><a href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo $this->_var['row']['region_name']; ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?></a> (<?php echo $this->_var['row']['count']; ?>)</li>
									<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</ul>
							</div>
							<?php if ($this->_var['region_count'] > 10): ?>
							<div class="more"><input type="button" class="brands_btn" value="Xem tất cả khu vực" id="show_region" /></div>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div id="right">
			<div class="module_advertise">
				<div class="wrap_left">
					<div class="wrap_child">
						<link href="themes/mall/default/styles/default/css/animation.css" rel="stylesheet" type="text/css" />
						<div id="ca_banner1" class="ca_banner ca_banner1">
							<div class="ca_slide ca_bg1">
								<div class="ca_zone ca_zone1">
									<div class="ca_wrap ca_wrap1">
										<a href=""><img src="data/files/mall/template/product1.png" class="ca_shown" alt=""/></a>
										<img src="data/files/mall/template/product2.png" alt="" style="display:none;"/>
										<img src="data/files/mall/template/product3.png" alt="" style="display:none;"/>
										<img src="data/files/mall/template/product4.png" alt="" style="display:none;"/>
										<img src="data/files/mall/template/product5.png" alt="" style="display:none;"/>
									</div>
								</div>
								<div class="ca_zone ca_zone2">
									<div class="ca_wrap ca_wrap2">
										<img src="data/files/mall/template/line1.png" class="ca_shown" alt=""/>
										<img src="data/files/mall/template/line2.png" alt="" style="display:none;"/>
									</div>
								</div>
								<div class="ca_zone ca_zone3">
									<div class="ca_wrap ca_wrap3">
										<img src="data/files/mall/template/title1.png" class="ca_shown" alt="" />
										<img src="data/files/mall/template/title2.png" alt="" style="display:none;"/>
										<img src="data/files/mall/template/title3.png" alt="" style="display:none;"/>
									</div>
								</div>
							</div>
						</div>
						
						<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
						<script type="text/javascript" src="includes/libraries/javascript/jquery.easing.1.3.js"></script>
						<script src="includes/libraries/javascript/jquery.transform-0.8.0.min.js"></script>
						<script src="includes/libraries/javascript/jquery.banner.js" type="text/javascript"></script>
						<script type="text/javascript">
							$(function() {
								$('#ca_banner1').banner({
									steps : [
										[
											[{"to" : "2"}, {"effect": "zoomOutRotated-zoomInRotated"}],
											[{"to" : "1"}, {}],
											[{"to" : "2"}, {"effect": "slideOutRight-slideInRight"}]
										],
										[
											[{"to" : "3"}, {"effect":"slideOutTop-slideInTop"}],
											[{"to" : "1"}, {}],
											[{"to" : "2"}, {}]
										],
										[
											[{"to" : "4"}, {"effect": "zoomOut-zoomIn"}],
											[{"to" : "2"}, {"effect": "slideOutRight-slideInRight"}],
											[{"to" : "2"}, {}]
										],
										[
											[{"to" : "5"}, {"effect": "slideOutBottom-slideInTop"}],
											[{"to" : "2"}, {}],
											[{"to" : "3"}, {"effect": "zoomOut-zoomIn"}]
										],
										[
											[{"to" : "1"}, {"effect": "slideOutLeft-slideInLeft"}],
											[{"to" : "1"}, {"effect": "zoomOut-zoomIn"}],
											[{"to" : "1"}, {"effect": "slideOutRight-slideInRight"}]
										]
									],
									total_steps	: 5,
									speed : 3000
								});
							});
						</script>
					</div>
				</div>
				<div class="wrap_right">
					<div class="wrap_child">
						Chưa có dữ liệus
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="module_filter">
				<div id="sort_bar">
					<ul>
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
							<a href="">Khuyến mại</a>
						</li>
						<li class="sort_by">
							<div></div>
							<a href="">Giảm giá nhiều</a>
						</li>
						<li class="sort_by selected">
							<div></div>
							<a href="">Nhiều người thích</a>
						</li>
						<li class="last">
							<div></div>
							<a href=""></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="shop_con_list">
				<h2>
					<div class="h2_wrap">
						<div class="table_title">
							<p class="title">Chế độ hiển thị:</p>
							<p class="list_ico" ectype="display_mode" ecvalue="list" title="Hiển thị theo danh sách"></p>
							<p class="squares_ico" ectype="display_mode" ecvalue="squares" title="Hiển thị theo đối tượng"></p>
						</div>
						<div class="top_page">
							<?php echo $this->fetch('page.top.html'); ?>
						</div>
					</div>
				</h2>
				<div class="<?php echo $this->_var['display_mode']; ?>" ectype="current_display_mode">
					<?php if ($this->_var['goods_list']): ?>
					<div class="list_product">
						<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
						<div class="product_vert">
							<div class="thumb thumb_177">
								<img src="<?php echo $this->_var['goods']['default_image']; ?>"/>
								<span class="item_price"><span><?php echo price_format($this->_var['goods']['price']); ?></span></span>
								<a class="cropper" href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
							</div>
							<div class="item_details">
								<p class="top_detail"><a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></p>
								<p class="sub_detail">bởi <a href="<?php echo url('app=gdetail&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['store']['user_name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['store_name']); ?></a></p>
								<p class="item_price">Giá bán: <strong><?php echo price_format($this->_var['goods']['price']); ?></strong></p>
							</div>
							<div class="info_more">
								<p class="right_detail">Số lượng: <strong><?php echo ($this->_var['goods']['sales'] == '') ? '0' : $this->_var['goods']['sales']; ?></strong> sản phẩm </p> 
								<p class="sub_detail"><a href="<?php echo url('app=gdetail&act=comments&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><strong><?php echo ($this->_var['goods']['comments'] == '') ? '0' : $this->_var['goods']['comments']; ?></strong> Bình luận</a></p>
							</div>
							<div class="clear"></div>
						</div>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<div class="clear"></div>
					</div>
					<?php else: ?>
					<div id="no_results">Chưa cập nhật sản phẩm.</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="shop_list_page">
				<?php echo $this->fetch('page.bottom.html'); ?>
			</div>
		</div>
		<?php else: ?>
		<div class="module_common">
			<p class="no_info">Chưa cập nhật sản phẩm.</p>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
	<?php echo $this->fetch('footer.html'); ?>
</div>
