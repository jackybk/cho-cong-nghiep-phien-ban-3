				<div class="art-header">
					<?php if ($this->_var['store']['store_banner']): ?>
					<div class="art-header-jpeg" style="background: #fff url(<?php echo $this->_var['store']['store_banner']; ?>) no-repeat 0 0 "></div>
					<?php else: ?>
					<div class="art-header-jpeg" style="background: #fff url(<?php echo $this->res_base . "/" . 'images/banner.jpg'; ?>) no-repeat 0 0 "></div>
					<?php endif; ?>
                    <div class="art-logo">
                        <h1 id="name-text" class="art-logo-name"><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></a></h1>
                        <div id="slogan-text" class="art-logo-text"><?php echo htmlspecialchars($this->_var['store']['address']); ?></div>
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
						<li>
							<a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'index'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><span class="l"></span><span class="r"></span><span class="t">Cửa hàng</span></a>
							<ul>
                				<li><a href="#">Menu Subitem 1</a>
                					<ul>
                						<li><a href="#">Menu Subitem 1.1</a></li>
                						<li><a href="#">Menu Subitem 1.2</a></li>
                						<li><a href="#">Menu Subitem 1.3</a></li>
                					</ul>
                				</li>
                				<li><a href="#">Menu Subitem 2</a></li>
                				<li><a href="#">Menu Subitem 3</a></li>
                			</ul>
						</li>
                		<?php if ($this->_var['store']['functions']['groupbuy']): ?>
						<li><a class="<?php if ($_GET['app'] == 'groupbuy' || $_GET['act'] == 'groupbuy'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=groupbuy&id=' . $this->_var['store']['store_id']. ''); ?>"><span class="l"></span><span class="r"></span><span class="t">Mua theo nhóm</span></a></li>
						<?php endif; ?>
						<?php $_from = $this->_var['store']['store_navs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store_nav');if (count($_from)):
    foreach ($_from AS $this->_var['store_nav']):
?>
						<li>
							<a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'article' && $_GET['id'] == $this->_var['store_nav']['article_id']): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=article&id=' . $this->_var['store_nav']['article_id']. ''); ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo htmlspecialchars($this->_var['store_nav']['title']); ?></span></a>
							<ul>
                				<li><a href="#">Menu Subitem 1</a>
                					<ul>
                						<li><a href="#">Menu Subitem 1.1</a></li>
                						<li><a href="#">Menu Subitem 1.2</a></li>
                						<li><a href="#">Menu Subitem 1.3</a></li>
                					</ul>
                				</li>
                				<li><a href="#">Menu Subitem 2</a></li>
                				<li><a href="#">Menu Subitem 3</a></li>
                			</ul>
						</li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'credit'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. ''); ?>"><span class="l"></span><span class="r"></span><span class="t">Đánh giá uy tín</span></a></li>
						<li class="collection gold_store"><span>Gian hàng vàng</span></li>
                	</ul>
                </div>
				<div id="path">
					<?php $_from = $this->_var['_curlocal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lnk');if (count($_from)):
    foreach ($_from AS $this->_var['lnk']):
?>
					<?php if ($this->_var['lnk']['url']): ?>
					<a href="<?php echo $this->_var['lnk']['url']; ?>"><?php echo htmlspecialchars($this->_var['lnk']['text']); ?></a>
					<?php else: ?>
					<span><?php echo htmlspecialchars($this->_var['lnk']['text']); ?></span>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>