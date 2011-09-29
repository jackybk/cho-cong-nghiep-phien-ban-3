<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><strong>Quản lý plugin</strong></p>
</div>
<div class="tdare info">
    <table width="100%" cellspacing="0">
        <?php if ($this->_var['plugins']): ?>
        <tr class="tatr1">
            <td width="15%">Tên</td>
            <td align="left">Mô tả</td>
            <td width="10%">Tác giả</td>
            <td width="10%">Version</td>
            <td class="handler">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'plugin');if (count($_from)):
    foreach ($_from AS $this->_var['plugin']):
?>
        <tr class="tatr2">
            <td><?php echo htmlspecialchars($this->_var['plugin']['name']); ?></td>
            <td align="left"><?php echo htmlspecialchars($this->_var['plugin']['desc']); ?></td>
            <td><a href="<?php echo $this->_var['plugin']['website']; ?>" target="_blank" title="Tên liên kết"><?php echo htmlspecialchars($this->_var['plugin']['author']); ?></a></td>
            <td><?php echo htmlspecialchars($this->_var['plugin']['version']); ?></td>
            <td class="handler">
                <?php if (! $this->_var['plugin']['enabled']): ?>
            <a href="index.php?app=plugin&amp;act=enable&amp;id=<?php echo $this->_var['plugin']['id']; ?>">Bật</a>
                <?php else: ?>
                <a href="javascript:if(confirm('Bạn có chắc chắn muốn tắt nó?'))window.location='index.php?app=plugin&act=disable&id=<?php echo $this->_var['plugin']['id']; ?>';">Tắt</a>
                <?php if ($this->_var['plugin']['config']): ?>
                |
                <a href="index.php?app=plugin&amp;act=config&id=<?php echo $this->_var['plugin']['id']; ?>">Cấu hình</a>
                <?php endif; ?>
                <?php endif; ?>
                </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td class="no_records" colspan="5">Chưa cài đặt plugin</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
</div>
<?php echo $this->fetch('footer.html'); ?>