<div class="keyword">
	<div class="module_title1"></div>
	<div class="module_title2"></div>
    <span>Vị trí:</span>
    <?php $_from = $this->_var['_curlocal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lnk');if (count($_from)):
    foreach ($_from AS $this->_var['lnk']):
?>
    <?php if ($this->_var['lnk']['url']): ?>
    <a href="<?php echo $this->_var['lnk']['url']; ?>"><?php echo htmlspecialchars($this->_var['lnk']['text']); ?></a> &gt;
    <?php else: ?>
    <?php echo htmlspecialchars($this->_var['lnk']['text']); ?>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
