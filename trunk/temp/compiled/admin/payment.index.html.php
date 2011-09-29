<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><strong>Quản lý thanh toán</strong></p>
</div>
<div class="tdare info">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['payment']): ?>
        <tr class="tatr1">
            <td class="firstCell" width="15%">Tên</td>
            <td>Mô tả</td>
            <td width="5%">Bật</td>
            <td width="10%">Hỗ trợ tiền tệ</td>
            <td width="10%">Tác giả</td>
            <td width="10%" class="table-center">Version</td>
            <td width="50" class="handler" style="width: 100px">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['payments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
        <tr class="tatr2">
            <td class="firstCell"><?php echo $this->_var['payment']['name']; ?></td>
            <td><span class="padding1"><?php echo $this->_var['payment']['desc']; ?></span></td>
            <td><?php if ($this->_var['payment']['system_enabled']): ?>Có<?php else: ?>Không<?php endif; ?></td>
            <td><span class="padding1"><?php echo $this->_var['payment']['currency']; ?></span></td>
            <td><a href="<?php echo $this->_var['payment']['website']; ?>" target="_blank" title="Tên liên kết"><?php echo $this->_var['payment']['author']; ?></a></td>
            <td class="table-center"><?php echo $this->_var['payment']['version']; ?></td>
            <td class="handler" width="50" style="width: 100px">
                <?php if (! $this->_var['payment']['system_enabled']): ?>
            <a href="index.php?app=payment&amp;act=enable&amp;code=<?php echo $this->_var['payment']['code']; ?>">Bật</a>
                <?php else: ?>
                <a href="javascript:if(confirm('Bạn có chắc chắn muốn tắt nó?'))window.location='index.php?app=payment&act=disable&code=<?php echo $this->_var['payment']['code']; ?>';">Tắt</a>
                <?php endif; ?>
                </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">Chưa cài đặt thanh toán</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
</div>
<?php echo $this->fetch('footer.html'); ?>
