				<div class="cleared"></div>
				<div class="art-footer">
                    <div class="art-footer-inner">
                        <a href="<?php echo $this->_var['site_url']; ?>" class="art-ccn-tag-icon" title="unit_web"></a>
                        <div class="art-footer-text">
                            <p>
								<a href="<?php echo $this->_var['site_url']; ?>">Trang chủ</a>
								<?php $_from = $this->_var['navs']['footer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
								| <a href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>                                
							</p>
                        </div>
                    </div>
                    <div class="art-footer-background"></div>
                </div>
        		<div class="cleared"></div>
			</div>
		</div>
		<div class="cleared"></div>
		<p class="art-page-footer">powered_by <a href="<?php echo $this->_var['site_url']; ?>" target="_blank">unit_web</a> &copy; 2009-2011</p>
	</div>
<?php echo $this->_var['async_sendmail']; ?>
</body>
</html>