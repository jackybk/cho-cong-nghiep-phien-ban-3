<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('top.html'); ?>
<div class="art-content-layout">
	<div class="art-content-layout-row">
        <div class="art-layout-cell art-sidebar1">
			<?php echo $this->fetch('left.html'); ?>
		</div>
		<div class="art-layout-cell art-content">
			<div class="art-post">
                <div class="art-post-tl"></div>
                <div class="art-post-tr"></div>
                <div class="art-post-bl"></div>
                <div class="art-post-br"></div>
                <div class="art-post-tc"></div>
                <div class="art-post-bc"></div>
                <div class="art-post-cl"></div>
                <div class="art-post-cr"></div>
                <div class="art-post-cc"></div>
                <div class="art-post-body">
					<div class="art-post-inner art-article">
						<div class="art-postcontent">
							<?php echo $this->fetch('goodsinfo.html'); ?>
							<ul class="user_menu">
								<div class="ornament1"></div>
								<div class="ornament2"></div>
								<li><a class="normal" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>#module"><span>Chi tiết sản phẩm</span></a></li>
								<li><a class="normal" href="<?php echo url('app=goods&act=comments&id=' . $this->_var['goods']['goods_id']. ''); ?>#module"><span>Nhận xét</span></a></li>
								<li><a class="active" href="<?php echo url('app=goods&act=saleslog&id=' . $this->_var['goods']['goods_id']. ''); ?>#module"><span>Doanh số bán</span></a></li>
								<li><a class="normal" href="<?php echo url('app=goods&act=qa&id=' . $this->_var['goods']['goods_id']. ''); ?>#module"><span>Tư vấn hàng hóa</span></a></li>
							</ul>
							<div class="option_box">
								<?php echo $this->fetch('saleslog.html'); ?>
								<div class="tags"><strong>Tags</strong>:&nbsp;&nbsp;<?php $_from = $this->_var['goods']['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?><a href="<?php echo url('app=search&keyword=' . $this->_var['tag']. ''); ?>"><?php echo $this->_var['tag']; ?></a>,&nbsp;<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
							</div>
							<div class="page_bottom">
								<?php echo $this->fetch('page.bottom.html'); ?>
							</div>
							<?php if ($this->_var['goods']['related_info']['count'] > 0): ?>
							<div class="module_currency">
								<h2 class="common_title veins1">
									<div class="ornament1"></div>
									<div class="ornament2"></div>
									<span class="ico1"><span class="ico2">related_info</span></span>
								</h2>
								<dl class="related_list">
									<?php $_from = $this->_var['goods']['related_info']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'app_data');if (count($_from)):
    foreach ($_from AS $this->_var['app_data']):
?>
									<?php if ($this->_var['app_data']['data'] && $this->_var['app_data']['app_type'] != 'ECMALL'): ?>
									<dt><a href="<?php echo $this->_var['app_data']['app_url']; ?>"><?php echo $this->_var['app_data']['app_name']; ?></a></dt>
									<?php $_from = $this->_var['app_data']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
									<dd><?php echo $this->_var['item']; ?></dd>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</dl>
							</div>
							<?php endif; ?>
						</div>
						<div class="cleared"></div>
					</div>
            		<div class="cleared"></div>
                </div>
            </div>
			
		</div>
		<div class="art-layout-cell art-sidebar2">
			<div class="art-block">
                <div class="art-block-body">
	                <div class="art-blockheader">
	                    <div class="l"></div>
	                    <div class="r"></div>
	                     <div class="t"><a href="<?php echo $this->_var['site_url']; ?>/index.php?app=cart" class="mycart">Giỏ hàng</a></div>
	                </div>
	                <div class="art-blockcontent">
	                    <div class="art-blockcontent-tl"></div>
	                    <div class="art-blockcontent-tr"></div>
	                    <div class="art-blockcontent-bl"></div>
	                    <div class="art-blockcontent-br"></div>
	                    <div class="art-blockcontent-tc"></div>
	                    <div class="art-blockcontent-bc"></div>
	                    <div class="art-blockcontent-cl"></div>
	                    <div class="art-blockcontent-cr"></div>
	                    <div class="art-blockcontent-cc"></div>
	                    <div class="art-blockcontent-body">
							
                            <div class="no_result">Không có sản phẩm trong giỏ hàng</div>
							<?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
							<div class="list_item">
								<div class="container">
									<div class="thumb thumb_57">
										<img src="<?php echo $this->_var['rgoods']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?>"/>
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>" class="cropper"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
									</div>
									<div class="activity">
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
										<div class="price"><?php echo price_format($this->_var['rgoods']['price']); ?></div>
									</div>
								   <div class="clear"></div>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	        	            <div class="cleared"></div>
	                    </div>
	                </div>
            		<div class="cleared"></div>
                </div>
            </div>
			<div class="art-block">
                <div class="art-block-body">
                    <div class="art-blockheader">
                        <div class="l"></div>
                        <div class="r"></div>
                         <div class="t">Hỗ trợ trực tuyến</div>
                    </div>
                    <div class="art-blockcontent">
                        <div class="art-blockcontent-tl"></div>
                        <div class="art-blockcontent-tr"></div>
                        <div class="art-blockcontent-bl"></div>
                        <div class="art-blockcontent-br"></div>
                        <div class="art-blockcontent-tc"></div>
                        <div class="art-blockcontent-bc"></div>
                        <div class="art-blockcontent-cl"></div>
                        <div class="art-blockcontent-cr"></div>
                        <div class="art-blockcontent-cc"></div>
                        <div class="art-blockcontent-body">
							
							<div class="support-online">
								<ul class="support-list-item">
									<li><a href='ymsgr:sendIM?khoanhkhac_112'><img src="http://opi.yahoo.com/online?u=khoanhkhac_112&m=g&t=5"/>Tư vấn hỗ trợ</a></li>
									<li><a href='ymsgr:sendIM?khoanhkhac_112'><img src="http://opi.yahoo.com/online?u=khoanhkhac_112&m=g&t=5"/>Nhân viên kinh doanh</a></li>
									<li><a href='ymsgr:sendIM?khoanhkhac_112'><img src="http://opi.yahoo.com/online?u=khoanhkhac_112&m=g&t=5"/>Hỗ trợ kỹ thuật</a></li>
									<li><a href="skype:chocongnghiep?chat"><img src="http://mystatus.skype.com/smallicon/chocongnghiep"  alt="chocongnghiep" />Hỗ trợ chung</a></li>
								</ul>
							</div>
							
                    		<div class="cleared"></div>
                        </div>
                    </div>
            		<div class="cleared"></div>
                </div>
            </div>
			<div class="art-block">
                <div class="art-block-body">
                    <div class="art-blockheader">
                        <div class="l"></div>
                        <div class="r"></div>
                         <div class="t">Đăng nhập</div>
                    </div>
                    <div class="art-blockcontent">
                        <div class="art-blockcontent-tl"></div>
                        <div class="art-blockcontent-tr"></div>
                        <div class="art-blockcontent-bl"></div>
                        <div class="art-blockcontent-br"></div>
                        <div class="art-blockcontent-tc"></div>
                        <div class="art-blockcontent-bc"></div>
                        <div class="art-blockcontent-cl"></div>
                        <div class="art-blockcontent-cr"></div>
                        <div class="art-blockcontent-cc"></div>
                        <div class="art-blockcontent-body">
							<form method="post" id="login_form" action="index.php?app=member&act=login&ret_url=">
								<div class="line first">
									<label for="username">Tên tài khoản:</label>
									<input id="username" name="user_name" value="" class="width3 text" title="Tên tài khoản" tabindex="1" type="text">
								</div>
								<div class="line">
									<label for="password">Mật khẩu:</label>
									<input id="password" name="password" value="" class="width3 text" title="Mật khẩu" tabindex="2" type="password">
								</div>
								<div class="line">
									<input id="remember" name="remember_me" value="1" tabindex="3" type="checkbox">
									<label for="remember" class="lable_remember">Ghi nhớ mật khẩu</label>
								</div>
								<div class="line" style="text-align:center;">
									<input id="btn_login" name="Submit" value="Đăng nhập" tabindex="4" type="submit" class="enter" />
									<div class="clear"></div>
								</div>
								<div class="line">
									<a href="<?php echo url('app=find_password'); ?>" class="clew" tabindex="5">Quên mật khẩu?</a>
								</div>
								<input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
							</form>
                    		<div class="cleared"></div>
                        </div>
                    </div>
            		<div class="cleared"></div>
                </div>
            </div>
			<div class="art-block">
                <div class="art-block-body">
                    <div class="art-blockheader">
                        <div class="l"></div>
                        <div class="r"></div>
                         <div class="t">Tin tức mới</div>
                    </div>
                    <div class="art-blockcontent">
                        <div class="art-blockcontent-tl"></div>
                        <div class="art-blockcontent-tr"></div>
                        <div class="art-blockcontent-bl"></div>
                        <div class="art-blockcontent-br"></div>
                        <div class="art-blockcontent-tc"></div>
                        <div class="art-blockcontent-bc"></div>
                        <div class="art-blockcontent-cl"></div>
                        <div class="art-blockcontent-cr"></div>
                        <div class="art-blockcontent-cc"></div>
                        <div class="art-blockcontent-body">
							<?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
							<div class="list_item">
								<div class="container">
									<div class="thumb thumb_57">
										<img src="<?php echo $this->_var['rgoods']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?>"/>
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>" class="cropper"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
									</div>
									<div class="activity">
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
									</div>
								   <div class="clear"></div>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    		<div class="cleared"></div>
                        </div>
                    </div>
            		<div class="cleared"></div>
                </div>
            </div>
			<div class="art-block">
                <div class="art-block-body">
                    <div class="art-blockheader">
                        <div class="l"></div>
                        <div class="r"></div>
                         <div class="t">Hỏi - Đáp mới</div>
                    </div>
                    <div class="art-blockcontent">
                        <div class="art-blockcontent-tl"></div>
                        <div class="art-blockcontent-tr"></div>
                        <div class="art-blockcontent-bl"></div>
                        <div class="art-blockcontent-br"></div>
                        <div class="art-blockcontent-tc"></div>
                        <div class="art-blockcontent-bc"></div>
                        <div class="art-blockcontent-cl"></div>
                        <div class="art-blockcontent-cr"></div>
                        <div class="art-blockcontent-cc"></div>
                        <div class="art-blockcontent-body">
							<?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
							<div class="list_item">
								<div class="container">
									<div class="thumb thumb_57">
										<img src="<?php echo $this->_var['rgoods']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?>"/>
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>" class="cropper"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
									</div>
									<div class="activity">
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
									</div>
								   <div class="clear"></div>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    		<div class="cleared"></div>
                        </div>
                    </div>
            		<div class="cleared"></div>
                </div>
            </div>
			<div class="art-block">
                <div class="art-block-body">
                    <div class="art-blockheader">
                        <div class="l"></div>
                        <div class="r"></div>
                         <div class="t">Rao vặt mới</div>
                    </div>
                    <div class="art-blockcontent">
                        <div class="art-blockcontent-tl"></div>
                        <div class="art-blockcontent-tr"></div>
                        <div class="art-blockcontent-bl"></div>
                        <div class="art-blockcontent-br"></div>
                        <div class="art-blockcontent-tc"></div>
                        <div class="art-blockcontent-bc"></div>
                        <div class="art-blockcontent-cl"></div>
                        <div class="art-blockcontent-cr"></div>
                        <div class="art-blockcontent-cc"></div>
                        <div class="art-blockcontent-body">
							<?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
							<div class="list_item">
								<div class="container">
									<div class="thumb thumb_57">
										<img src="<?php echo $this->_var['rgoods']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?>"/>
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>" class="cropper"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
									</div>
									<div class="activity">
										<a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a>
									</div>
								   <div class="clear"></div>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    		<div class="cleared"></div>
                        </div>
                    </div>
            		<div class="cleared"></div>
                </div>
            </div>
            <div class="art-block">
                <div class="art-block-body">
                    <div class="art-blockheader">
                        <div class="l"></div>
                        <div class="r"></div>
                         <div class="t">Thông tin liên hệ</div>
                    </div>
                    <div class="art-blockcontent">
                        <div class="art-blockcontent-tl"></div>
                        <div class="art-blockcontent-tr"></div>
                        <div class="art-blockcontent-bl"></div>
                        <div class="art-blockcontent-br"></div>
                        <div class="art-blockcontent-tc"></div>
                        <div class="art-blockcontent-bc"></div>
                        <div class="art-blockcontent-cl"></div>
                        <div class="art-blockcontent-cr"></div>
                        <div class="art-blockcontent-cc"></div>
                        <div class="art-blockcontent-body">
                            <div>
                                <img src="<?php echo $this->res_base . "/" . 'images/contact.jpg'; ?>" alt="an image" style="margin: 0 auto;display:block;width:95%" />
                            <br />
                            <b><?php echo htmlspecialchars($this->_var['store']['store_name']); ?>.</b><br />
                            <?php echo htmlspecialchars($this->_var['store']['address']); ?><br />
                            Email: <a href="mailto:info@company.com">info@company.com</a><br />
                            <br />
                            Điện thoại: <?php echo htmlspecialchars($this->_var['store']['tel']); ?> <br />
                            fax: <?php echo htmlspecialchars($this->_var['store']['tel']); ?>
                            </div>
                    		<div class="cleared"></div>
                        </div>
                    </div>
            		<div class="cleared"></div>
                </div>
            </div>
		</div>
	</div>
</div>
<?php echo $this->fetch('footer.html'); ?>