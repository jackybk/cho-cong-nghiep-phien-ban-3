<script type="text/javascript">
<!--//<![CDATA[
$(function(){
    <?php echo $this->_var['payment']['onconfig']; ?>
});
//]]>-->
</script>
<ul class="tab">
    <li class="active"><?php if ($_GET['act'] == config): ?>Cấu hình<?php else: ?>Cài đặt<?php endif; ?></li>
</ul>
<div class="eject_con">
    <div class="info_table_wrap">
        <form method="post" action="index.php?app=my_payment&amp;act=<?php echo $_GET['act']; ?>&amp;code=<?php echo $_GET['code']; ?>&amp;payment_id=<?php echo $_GET['payment_id']; ?>" target="my_payment">
        <ul class="info_table">
            <li>
                <h4>Tên:</h4>
                <p class="new_style"><?php echo htmlspecialchars($this->_var['payment']['name']); ?></p>
            </li>
            <li>
                <h4>Giới thiệu</h4>
                <p><textarea class="text" name="payment_desc"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></textarea><span>Thông tin này sẽ được nhìn thấy khi người sử dụng tạo đơn đặt hàng</span></p>
            </li>
            <li>
                <h4>Hiển thị:</h4>
                <p>
                     <?php echo $this->html_radios(array('options'=>$this->_var['yes_or_no'],'checked'=>$this->_var['payment']['enabled'],'name'=>'enabled')); ?>
                </p>
            </li>
            <li>
                <h4>Sắp xếp theo:</h4>
                <p><input type="text" class="text width2" value="<?php echo $this->_var['payment']['sort_order']; ?>" name="sort_order"/></p>
            </li>
            <?php $_from = $this->_var['payment']['config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('conf', 'info');if (count($_from)):
    foreach ($_from AS $this->_var['conf'] => $this->_var['info']):
?>
            <li>
                <h4><?php echo $this->_var['info']['text']; ?>:</h4>
                <p><?php if ($this->_var['info']['type'] == 'text'): ?> <input type="text" name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" value="<?php echo $this->_var['config'][$this->_var['conf']]; ?>" size="<?php echo $this->_var['info']['size']; ?>" onfocus="<?php echo $this->_var['info']['onfocus']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" onblur="<?php echo $this->_var['info']['onblur']; ?>" class="text"/>
                <?php elseif ($this->_var['info']['type'] == 'select'): ?>
                <select name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" class="width8 padding4">
                       <?php echo $this->html_options(array('options'=>$this->_var['info']['items'],'selected'=>$this->_var['config'][$this->_var['conf']])); ?>
                 </select>
                 <?php elseif ($this->_var['info']['type'] == 'textarea'): ?>
                 <textarea cols="<?php echo $this->_var['info']['cols']; ?>" rows="<?php echo $this->_var['info']['rows']; ?>" name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" onfocus="<?php echo $this->_var['info']['onfocus']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" onblur="<?php echo $this->_var['info']['onblur']; ?>" class="text" ><?php echo $this->_var['config'][$this->_var['conf']]; ?></textarea>
                 <?php elseif ($this->_var['info']['type'] == 'radio'): ?>
                       <?php echo $this->html_radios(array('options'=>$this->_var['info']['items'],'checked'=>$this->_var['config'][$this->_var['conf']],'name'=>$this->_var['info']['name'])); ?>
                 <?php elseif ($this->_var['info']['type'] == 'checkbox'): ?>
                    <?php echo $this->html_checkbox(array('options'=>$this->_var['info']['items'],'checked'=>$this->_var['config'][$this->_var['conf']],'name'=>$this->_var['info']['name'])); ?>
                 <?php endif; ?>
                 <span><?php echo $this->_var['info']['desc']; ?></span>
                 </p>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php if ($this->_var['payment']['is_online']): ?>
            <li>
                <h4>Mã số thanh toán:</h4>
                <p><input type="text" name="config[pcode]" value="<?php echo $this->_var['config']['pcode']; ?>" size="3" class="text" /><span>Trong trường hợp bình thường có thể được để trống, một lỗi chỉ khi các khoản thanh toán thường xuyên sử dụng</span></p>
            </li>
            <?php endif; ?>
        </ul>
        <div class="submit"><input type="submit" class="btn" value="Gửi" /></div>
        </form>
    </div>
</div>