							<div class="art-vmenublock">
                                <div class="art-vmenublock-body">
                                    <div class="art-vmenublockheader">
                                        <div class="l"></div>
                                        <div class="r"></div>
                                         <div class="t">Danh mục sản phẩm</div>
                                    </div>
                                    <div class="art-vmenublockcontent">
                                        <div class="art-vmenublockcontent-tl"></div>
                                        <div class="art-vmenublockcontent-tr"></div>
                                        <div class="art-vmenublockcontent-bl"></div>
                                        <div class="art-vmenublockcontent-br"></div>
                                        <div class="art-vmenublockcontent-tc"></div>
                                        <div class="art-vmenublockcontent-bc"></div>
                                        <div class="art-vmenublockcontent-cl"></div>
                                        <div class="art-vmenublockcontent-cr"></div>
                                        <div class="art-vmenublockcontent-cc"></div>
                                        <div class="art-vmenublockcontent-body">
											
                                                    <ul class="art-vmenu">
                                                    	<li>
                                                    		<a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search'); ?>"><span class="l"></span><span class="r"></span><span class="t">Tất cả sản phẩm</span></a>
                                                    	</li>
														<?php $_from = $this->_var['store']['store_gcates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
															<?php if ($this->_var['gcategory']['children']): ?>
															<li class="active">
																<a class="active" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo htmlspecialchars($this->_var['scategory']['value']); ?></span></a>
																<ul class="active">
																	<?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['child_gcategory']):
?>
																	<li><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['child_gcategory']['id']. ''); ?>" class="active"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></li>
																	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
																</ul>
															</li>
															<?php else: ?>
															<li><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></span></a></li>
															<?php endif; ?>
														<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                    </ul>
											
                                    		<div class="cleared"></div>
                                        </div>
                                    </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
							<div class="art-post no-margin">
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
										<div id="module_logo">
											<div id="avatar">
												<img src="<?php echo $this->_var['store']['store_logo']; ?>" alt="<?php echo htmlspecialchars($this->_var['store']['store_owner']['user_name']); ?>" title="<?php echo htmlspecialchars($this->_var['store']['store_owner']['user_name']); ?>"/>
											</div>
											<h5 id="location"><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></h5>
											
											<!--<div class="button_follow">
												<a id="collect_store" href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)">Bộ sưu tập</a>
												<a id="sent_message" href="<?php echo url('app=message&act=send&to_id=' . htmlspecialchars($this->_var['store']['store_owner']['user_id']). ''); ?>">
													<img src="<?php echo $this->res_base . "/" . 'images/web_mail.gif'; ?>" alt="Gửi tin nhắn" />
												</a>
											</div>-->
										</div>
										<div class="cleared"></div>
									</div>
									<div class="cleared"></div>
								</div>
							</div>
							<div class="art-block">
                                <div class="art-block-body">
                                    <div class="art-blockheader">
                                        <div class="l"></div>
                                        <div class="r"></div>
                                         <div class="t">Tìm kiếm</div>
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
											<div class="module_search">
												<div class="search_store">
													<form id="" name="" method="get" action="index.php">
														<input type="hidden" name="app" value="store" />
														<input type="hidden" name="act" value="search" />
														<input type="hidden" name="id" value="<?php echo $this->_var['store']['store_id']; ?>" />
														<input class="text width1" type="text" name="keyword" />
														<input class="btn" type="submit" value="Tìm" />
													</form>
												</div>
												<div class="wrap_follow">
													<div class="follow_title">
														<h6>Giá sản phẩm</h6>
														<ul>
															<li><a href="">1.000.000 Đ -> 2.000.000 Đ</a></li>
															<li><a href="">2.000.000 Đ -> 3.000.000 Đ</a></li>
															<li><a href="">3.000.000 Đ -> 5.000.000 Đ</a></li>
															<li><a href="">5.000.000 Đ -> 10.000.000 Đ</a></li>
															<li><a href="">10.000.000 Đ -> 20.000.000 Đ</a></li>
														</ul>
													</div>
													<div class="follow_title">
														<h6>Hãng sản xuất</h6>
														<ul>
															<li><a href="">Sony</a></li>
															<li><a href="">Samsung</a></li>
															<li><a href="">Canon</a></li>
															<li><a href="">Nokia</a></li>
															<li><a href="">Honda</a></li>
														</ul>
													</div>
												</div>
											</div>
                                    		<div class="cleared"></div>
                                        </div>
                                    </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
							<?php if ($_GET['app'] == "store" && $_GET['act'] == "index"): ?>
							<div class="art-block">
                                <div class="art-block-body">
                                    <div class="art-blockheader">
                                        <div class="l"></div>
                                        <div class="r"></div>
                                         <div class="t">partner</div>
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
											<?php $_from = $this->_var['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'partner');if (count($_from)):
    foreach ($_from AS $this->_var['partner']):
?>
											<div class="advertise_store">
												<a class="link_advertise" href="<?php echo $this->_var['partner']['link']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['partner']['title']); ?>">
													<img src="<?php echo $this->res_base . "/" . 'images/advertise.png'; ?>" alt="<?php echo htmlspecialchars($this->_var['partner']['title']); ?>"/>
												</a>
											</div>
											<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    		<div class="cleared"></div>
                                        </div>
                                    </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
							<?php endif; ?>
							<?php if ($_GET['app'] == "goods"): ?>
							<div class="art-block">
                                <div class="art-block-body">
                                    <div class="art-blockheader">
                                        <div class="l"></div>
                                        <div class="r"></div>
                                         <div class="t">Sản phẩm đã xem</div>
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
											<?php $_from = $this->_var['goods_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gh_goods');if (count($_from)):
    foreach ($_from AS $this->_var['gh_goods']):
?>
											<div class="list_item">
												<div class="container">
													<div class="thumb thumb_57">
														<img src="<?php echo $this->_var['gh_goods']['default_image']; ?>" alt="<?php echo htmlspecialchars(sub_str($this->_var['gh_goods']['goods_name'],20)); ?>"/>
														<a href="<?php echo url('app=goods&id=' . $this->_var['gh_goods']['goods_id']. ''); ?>" class="cropper"><?php echo htmlspecialchars($this->_var['gh_goods']['goods_name']); ?></a>
													</div>
													<div class="activity">
														<a href="<?php echo url('app=goods&id=' . $this->_var['gh_goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gh_goods']['goods_name']); ?></a>
														<div class="price"><?php echo price_format($this->_var['gh_goods']['price']); ?></div>
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
							<?php endif; ?>