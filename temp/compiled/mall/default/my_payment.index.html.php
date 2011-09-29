<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
        <div class="public_index table">
            <table>
                <tr class="line_bold">
                    <th class="" colspan="6">
                    </th>
                </tr>
                <?php if ($this->_var['payments']): ?>
                <tr class="gray_new">
                    <th class="width13">Tên</td>
                    <th>Mô tả Plugin</th>
                    <th class="width4">Hiển thị</th>
                    <th class="width13">Hành động</th>
                </tr>
                <?php endif; ?>
                <?php $_from = $this->_var['payments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['payment']):
        $this->_foreach['v']['iteration']++;
?>
                <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold"><?php else: ?><tr class="line"><?php endif; ?>
                    <td><span class="padding1"><?php echo htmlspecialchars($this->_var['payment']['name']); ?></span></td>
                    <td><?php echo $this->_var['payment']['desc']; ?></td>
                    <td class="align2"><?php if ($this->_var['payment']['enabled']): ?>Có<?php else: ?>Không<?php endif; ?></td>
                    <td>
                    <div class="padding1">
                     <?php if ($this->_var['payment']['installed']): ?>
                        <a href="javascript:void(0);" ectype="dialog" uri="index.php?app=my_payment&amp;act=config&payment_id=<?php echo $this->_var['payment']['payment_id']; ?>&amp;code=<?php echo $this->_var['payment']['code']; ?>" dialog_id="my_payment_config" dialog_title="Cấu hình" dialog_width="600" class="add2_ico">Cấu hình</a> <a href="javascript:drop_confirm('Gỡ cài đặt tất cả các sử dụng của lệnh thanh toán sẽ không thể trả tiền, nếu bạn chỉ không muốn để cho phép người dùng lựa chọn phương thức thanh toán, bạn có thể sử dụng "cấu hình" để vô hiệu hóa phương pháp này thanh toán, bạn chắc chắn rằng bạn muốn gỡ bỏ nó?', 'index.php?app=my_payment&amp;act=uninstall&payment_id=<?php echo $this->_var['payment']['payment_id']; ?>');" class="delete">Gở bỏ</a>
                    <?php else: ?>
                        <a href="javascript:void(0);" ectype="dialog" dialog_id="my_payment_install" dialog_title="Cài dặt" uri="index.php?app=my_payment&amp;act=install&code=<?php echo $this->_var['payment']['code']; ?>" dialog_width="600" class="add1_ico">Cài dặt</a>
                    <?php endif; ?>
                    </div>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="4" class="member_no_records">Không có phương pháp thanh toán có sẵn, xin vui lòng liên hệ với người quản trị để giải quyết vấn đề này</td>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
            <div class="wrap_bottom"></div>
        </div>
        <iframe name="my_payment" style="display:none"></iframe>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
</div>
<div class="clear"></div>
<?php echo $this->fetch('footer.html'); ?>
