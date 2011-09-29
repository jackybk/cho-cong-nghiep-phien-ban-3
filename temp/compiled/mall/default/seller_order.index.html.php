<?php echo $this->fetch('member.header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
    $('.checkall_s').click(function(){
        var if_check = $(this).attr('checked');
        $('.checkitem').each(function(){
            if(!this.disabled)
            {
                $(this).attr('checked', if_check);
            }
        });
        $('.checkall_s').attr('checked', if_check);
    });
    $('a[ectype="batchcancel"]').click(function(){
        if($('.checkitem:checked').length == 0){
            return false;
        }
        if($(this).attr('presubmit')){
            if(!eval($(this).attr('presubmit'))){
                return false;
            }
        }
        var items = '';
        $('.checkitem:checked').each(function(){
            items += this.value + ',';
        });
        items = items.substr(0, (items.length - 1));

        var uri = $(this).attr('uri');
        uri = uri + '&' + $(this).attr('name') + '=' + items;
        var id = 'seller_order_cancel_order';
        var title = $(this).attr('dialog_title') ? $(this).attr('dialog_title') : '';
        //var url = $(this).attr('uri');
        var width = '500';
        ajax_form(id, title, uri, width);
    });
});
</script>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right"><?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="scarch_order">
                <form method="get">
                <div style="float:left;">
                <span class="title">Số hóa đơn:</span>
                <input class="text_normal" type="text" name="order_sn" value="<?php echo htmlspecialchars($this->_var['query']['order_sn']); ?>" />
                <span class="title">Thời gian thêm:</span>
                <input class="text_normal width2" type="text" name="add_time_from" id="add_time_from" value="<?php echo $this->_var['query']['add_time_from']; ?>" /> &#8211; <input class="text_normal width2" id="add_time_to" type="text" name="add_time_to" value="<?php echo $this->_var['query']['add_time_to']; ?>" />
                <span class="title">Tên người mua:</span>
                <input class="text_normal" type="text" name="buyer_name" value="<?php echo htmlspecialchars($this->_var['query']['buyer_name']); ?>" />
                <input type="hidden" name="app" value="seller_order" />
                <input type="hidden" name="act" value="index" />
                <input type="hidden" name="type" value="<?php echo $this->_var['type']; ?>" />
                <input type="submit" class="btn" value="Tìm kiếm" />
                </div>
                <?php if ($this->_var['query']['buyer_name'] || $this->_var['query']['add_time_from'] || $this->_var['query']['add_time_to'] || $this->_var['query']['order_sn']): ?>
                    <a class="detlink" href="<?php echo url('app=seller_order&type=' . $this->_var['query']['type']. ''); ?>">Hủy tìm kiếm</a>
                <?php endif; ?>

        </form>

        </div>
         <div class="public_index table">
                <table>
                    <tr <?php if ($this->_var['orders']): ?> class="table_line"<?php endif; ?>>
                    <th class="width1"><input id="all" type="checkbox" class="checkall_s" /></th>
                    <th class="align1" colspan="7">
                            <label for="all"><span class="all">Chọn Tất cả</span></label>
                            <a href="javascript:;" class="delete" ectype="batchcancel" uri="index.php?app=seller_order&act=cancel_order" name="order_id">Hủy bỏ</a>
                        </th>
                    </tr>
                    <?php if ($this->_var['orders']): ?>
                    <tr class="line tr_bgcolor">
                        <th></th>
                        <th>Số hóa đơn</th>
                        <th>Tên người mua</th>
                        <th width="200">Tên người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Thanh toán</th>
                        <th>Tổng số tiền</th>
                        <th width="90">Tình trạng</th>
                    </tr>
                    <?php endif; ?>
                    
                    <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
                    <tr class="color2">
                        <td class="align2"><input type="checkbox" value="<?php echo $this->_var['order']['order_id']; ?>" class="checkitem" <?php if ($this->_var['order']['status'] == ORDER_FINISHED || $this->_var['order']['status'] == ORDER_CANCELED): ?> disabled="disabled" <?php endif; ?>/></td>
                        <td><span class="color3"><?php echo $this->_var['order']['order_sn']; ?><?php if ($this->_var['order']['extension'] == 'groupbuy'): ?><span class="color8">[Mua sỉ]</span><?php endif; ?></span></td>
                        <td class="align2"><?php echo htmlspecialchars($this->_var['order']['buyer_name']); ?></td>
                        <td class="align2"><?php echo htmlspecialchars($this->_var['order']['consignee']); ?></td>
                        <td class="align2"><?php if ($this->_var['order']['phone_mob'] != ''): ?><?php echo $this->_var['order']['phone_mob']; ?><?php else: ?><?php echo $this->_var['order']['phone_tel']; ?><?php endif; ?><br />
</td>
                        <td class="align2"><?php echo htmlspecialchars($this->_var['order']['payment_name']); ?></td>
                        <td class="align2 padding1"><strong><?php echo price_format($this->_var['order']['order_amount']); ?></strong></td>
                        <td class="align2"><span class="color4"><?php echo call_user_func("order_status",$this->_var['order']['status']); ?><?php if ($this->_var['order']['evaluation_status']): ?>,&nbsp;Đã được đánh giá<?php endif; ?></span></td>
                    </tr>
                    <tr class="line_bottom">
                        <td colspan="8" align="right" class="order_form1"><div class="button_wrap">
                        <input type="button" value="Đã trả tiền" class="btn" ectype="dialog" dialog_id="seller_order_received_pay" dialog_width="400" uri="index.php?app=seller_order&amp;act=received_pay&amp;order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax" dialog_title="Đã trả tiền" id="order<?php echo $this->_var['order']['order_id']; ?>_action_received_pay"<?php if ($this->_var['order']['status'] != ORDER_PENDING): ?> style="display:none"<?php endif; ?> />
                        <input type="button" value="Đơn đặt hàng" class="btn1" ectype="dialog" uri="index.php?app=seller_order&amp;act=confirm_order&amp;order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax" dialog_id="seller_order_confirm_order" dialog_title="Đơn đặt hàng"  dialog_width="400" id="order<?php echo $this->_var['order']['order_id']; ?>_action_confirm"<?php if ($this->_var['order']['status'] != ORDER_SUBMITTED): ?> style="display:none"<?php endif; ?> />
                        <input type="button" value="Sửa phí" class="btn1" uri="index.php?app=seller_order&amp;act=adjust_fee&amp;order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax" dialog_width="450" dialog_title="Sửa phí" ectype="dialog"  dialog_id="seller_order_adjust_fee" id="order<?php echo $this->_var['order']['order_id']; ?>_action_adjust_fee"<?php if ($this->_var['order']['status'] != ORDER_PENDING && $this->_var['order']['status'] != ORDER_SUBMITTED): ?> style="display:none"<?php endif; ?> />
                        <input type="button" value="Giao hàng" class="btn1" ectype="dialog" dialog_title="Giao hàng" dialog_id="seller_order_shipped" uri="index.php?app=seller_order&amp;act=shipped&amp;order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax"  dialog_width="400" id="order<?php echo $this->_var['order']['order_id']; ?>_action_shipped"<?php if ($this->_var['order']['status'] != ORDER_ACCEPTED): ?> style="display:none"<?php endif; ?> />
                        
                        <input type="button" value="Hoàn tất giao dịch" class="btn1" ectype="dialog" dialog_id="seller_order_finished"  dialog_title="Hoàn tất giao dịch" uri="index.php?app=seller_order&amp;act=finished&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax" dialog_width="400"  id="order<?php echo $this->_var['order']['order_id']; ?>_action_finish"<?php if ($this->_var['order']['payment_code'] != 'cod' || $this->_var['order']['status'] != ORDER_SHIPPED): ?> style="display:none"<?php endif; ?> />
                        <input type="button" value="Sửa hóa đơn" class="btn1" ectype="dialog" dialog_title="Sửa hóa đơn" uri="index.php?app=seller_order&amp;act=shipped&amp;order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax" dialog_id="seller_order_shipped" dialog_width="400" id="order<?php echo $this->_var['order']['order_id']; ?>_action_edit_invoice_no"<?php if ($this->_var['order']['status'] != ORDER_SHIPPED): ?> style="display:none"<?php endif; ?> />
                        
                        <input type="button" value="Hủy bỏ" class="btn1" ectype="dialog" uri="index.php?app=seller_order&amp;act=cancel_order&order_id=<?php echo $this->_var['order']['order_id']; ?>&ajax" dialog_title="Hủy bỏ" dialog_id="seller_order_cancel_order" dialog_width="400" id="order<?php echo $this->_var['order']['order_id']; ?>_action_cancel"<?php if ($this->_var['order']['status'] == ORDER_CANCELED || $this->_var['order']['status'] == ORDER_FINISHED): ?> style="display:none"<?php endif; ?> />
                        <a class="btn1" href="<?php echo url('app=seller_order&act=view&order_id=' . $this->_var['order']['order_id']. ''); ?>" target="_blank">Xem</a>
                       </div> </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td class="member_no_records" colspan="8">Không có hồ sơ</td></tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['orders']): ?>
                    <tr><th class="width1"><input id="all2" type="checkbox" class="checkall_s" /></th>
                    <th class="align1" colspan="7">
                            <p class="position1">
                                <label for="all2"><span class="all">Chọn Tất cả</span></label>
                                <a href="javascript:;" class="delete" ectype="batchcancel" uri="index.php?app=seller_order&act=cancel_order" name="order_id">Hủy bỏ</a>
                            </p>
                            <p class="position2">
                                <?php echo $this->fetch('member.page.bottom.html'); ?>
                            </p>
                        </th>
                    </tr>
                    <?php endif; ?>
                    </table>
                    <iframe name="seller_order" style="display:none;"></iframe>
        </div>
    <div class="wrap_bottom"></div>
    </div>
</div>
</div>
<div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
