<?php echo $this->fetch('header.html'); ?>
<style>
tr td.handler, th.handler {text-align: center; width: 180px;}
</style>
<div id="rightTop">
    <p>Quản lý Email thông báo</p>
    <ul class="subnav">
        <li><?php if ($this->_var['type'] == $this->_var['notice_mail']): ?><span>Email mẫu</span><?php else: ?><a class="btn1" href="index.php?app=mailtemplate&amp;type=<?php echo $this->_var['notice_mail']; ?>">Email mẫu</a><?php endif; ?></li>
        <li><?php if ($this->_var['type'] == $this->_var['notice_msg']): ?><span>Tin nhắn mẫu</span><?php else: ?><a class="btn1" href="index.php?app=mailtemplate&amp;type=<?php echo $this->_var['notice_msg']; ?>">Tin nhắn mẫu</a><?php endif; ?></li>
    </ul>
</div>
<div class="tdare info">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['noticetemplates']): ?>
        <tr class="tatr1">
            <td  class="firstCell" align="left">Mô tả</td>
            <td class="handler">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['noticetemplates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('code', 'noticetemplate');if (count($_from)):
    foreach ($_from AS $this->_var['code'] => $this->_var['noticetemplate']):
?>
        <tr class="tatr2">
            <td class="firstCell" align="left"><?php echo $this->_var['noticetemplate']['description']; ?></td>
            <td class="handler">
            <a href="index.php?app=mailtemplate&amp;act=<?php if ($this->_var['type'] == $this->_var['notice_mail']): ?>mail<?php endif; ?><?php if ($this->_var['type'] == $this->_var['notice_msg']): ?>msg<?php endif; ?>&amp;code=<?php echo $this->_var['code']; ?>&amp;type=<?php echo $this->_var['type']; ?>">Sửa</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="3">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
        <div id="dataFuncs">

    </div>

</div>
<?php echo $this->fetch('footer.html'); ?>
