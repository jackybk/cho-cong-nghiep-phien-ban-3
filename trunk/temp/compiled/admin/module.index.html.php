<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><strong>Quản lý Module</strong></p>
</div>
<div class="tdare info">
    <table width="100%" cellspacing="0">
        <?php if ($this->_var['module']): ?>
        <tr class="tatr1">
            <td width="15%">Tên</td>
            <td align="left">Mô tả</td>
            <td width="10%">Tác giả</td>
            <td width="10%">Version</td>
            <td width="200">操作</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'module');if (count($_from)):
    foreach ($_from AS $this->_var['module']):
?>
        <tr class="tatr2">
            <td><?php echo htmlspecialchars($this->_var['module']['name']); ?></td>
            <td align="left"><?php echo htmlspecialchars($this->_var['module']['desc']); ?></td>
            <td><a href="<?php echo $this->_var['module']['website']; ?>" target="_blank" title="Tên liên kết"><?php echo htmlspecialchars($this->_var['module']['author']); ?></a></td>
            <td><?php echo htmlspecialchars($this->_var['module']['version']); ?></td>
            <td width="200">
                <?php if (! $this->_var['module']['installed']): ?>
            <a href="index.php?app=module&amp;act=install&amp;id=<?php echo $this->_var['module']['id']; ?>">Cài đặt</a>
                <?php else: ?>
                <a href="javascript:if(confirm('Bạn có chắc chắn muốn gỡ bỏ?'))window.location='index.php?app=module&act=uninstall&id=<?php echo $this->_var['module']['id']; ?>';">Gỡ bỏ</a>
                <?php if ($this->_var['module']['config']): ?>
                |
                <a href="index.php?app=module&amp;act=config&id=<?php echo $this->_var['module']['id']; ?>">Cấu hình</a>
                <?php endif; ?>
                <?php if ($this->_var['module']['outofdate']): ?>
                <a href="#">upgrade</a>
                <?php endif; ?>
                <?php $_from = $this->_var['module']['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'm');if (count($_from)):
    foreach ($_from AS $this->_var['m']):
?>
                |
                <a href="index.php?module=<?php echo $this->_var['module']['id']; ?>&act=<?php echo $this->_var['m']['act']; ?>"><?php echo $this->_var['m']['text']; ?></a>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
                </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="5">Chưa cài đặt module</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
</div>
<?php echo $this->fetch('footer.html'); ?>
