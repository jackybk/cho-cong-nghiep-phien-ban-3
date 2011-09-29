<?php if ($this->_var['page_info']['page_count'] > 1): ?>
<div class="page1">
    <p>Chuyển trang: </p>
    <?php if ($this->_var['page_info']['prev_link']): ?>
    <a class="former" href="<?php echo $this->_var['page_info']['prev_link']; ?>"></a>
    <?php else: ?>
    <span class="former_no"></span>
    <?php endif; ?>
    <?php if ($this->_var['page_info']['next_link']): ?>
    <a class="down" href="<?php echo $this->_var['page_info']['next_link']; ?>">Tiếp theo</a>
    <?php else: ?>
    <span class="down_no">Tiếp theo</span>
    <?php endif; ?>
</div>
<?php endif; ?>