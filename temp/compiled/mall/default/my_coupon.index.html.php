<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right"> <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="eject_btn_two eject_pos1" title="Đăng ký"><b class="ico3" ectype="dialog" dialog_title="Đăng ký" dialog_id="my_coupon_bind" dialog_width="480" uri="index.php?app=my_coupon&act=bind">Đăng ký</b></div>
            <div class="public table">
                <table>
                    <?php if ($this->_var['coupons']): ?>
                    <tr class="line_bold" >
                        <th class="width1"><input id="all" type="checkbox" class="checkall" /></th>
                        <th class="align1" colspan="10">
                           <label for="all"> <span class="all">Chọn Tất cả</span> </label>
                            <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=my_coupon&act=drop" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')">Xoá</a>
                        </th>
                    </tr>
                    <tr class="gray">
                        <th></th>
                        <th>Số series</th>
                        <th>Tỷ lệ chiết khấu</th>
                        <th>Thời hạn</th>
                        <th>Sử dụng</th>
                        <th>Cửa hàng phát hành</th>
                        <th>số lần còn lại</td>                    
                        <th>Tính hợp lệ</th>
                        <th>Hành động</th>
                    </tr>
                     <?php endif; ?>
                <?php if ($this->_var['gcategories']): ?>
                <tbody>
                <?php endif; ?>
                <?php $_from = $this->_var['coupons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'coupon');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['coupon']):
        $this->_foreach['v']['iteration']++;
?>
                <tr class="line<?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?> last_line<?php endif; ?>">
                    <td class="align2"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['coupon']['coupon_sn']; ?>" /></td>
                    <td><?php echo $this->_var['coupon']['coupon_sn']; ?></td>
                    <td class="align4"><?php if ($this->_var['coupon']['coupon_value']): ?><?php echo $this->_var['coupon']['coupon_value']; ?><?php else: ?>Không giới hạn<?php endif; ?></td>
                    <td><?php echo local_date("Y-m-d",$this->_var['coupon']['start_time']); ?> đến <?php if ($this->_var['coupon']['end_time']): ?><?php echo local_date("Y-m-d",$this->_var['coupon']['end_time']); ?><?php else: ?>Không giới hạn<?php endif; ?></td>
                    <td><?php if ($this->_var['coupon']['min_amount']): ?><?php echo sprintf('Mua hàng đầu tiên %s ', $this->_var['coupon']['min_amount']); ?><?php else: ?>Không giới hạn<?php endif; ?></td>
                    <td><a href="<?php echo url('app=store&id=' . $this->_var['coupon']['store_id']. ''); ?>"><?php echo $this->_var['coupon']['store_name']; ?></a></td>
                    <td class="align4"><?php if ($this->_var['coupon']['remain_times'] == - 1): ?>Không giới hạn<?php else: ?><?php echo $this->_var['coupon']['remain_times']; ?><?php endif; ?></td>
                    <td class="align2"><?php if ($this->_var['coupon']['valid']): ?><img src="<?php echo $this->res_base . "/" . 'images'; ?>/usable.gif" /><?php else: ?><img src="<?php echo $this->res_base . "/" . 'images'; ?>/unusable.gif" /><?php endif; ?></td>
                    <td class="align2"><a href="javascript:javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó ?', 'index.php?app=my_coupon&act=drop&id=<?php echo $this->_var['coupon']['coupon_sn']; ?>');" class="delete">Xoá</a></td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="10" class="member_no_records padding6">Không có hồ sơ</td>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php if ($this->_var['coupons']): ?>
                </tbody>
                <?php endif; ?>
                <?php if ($this->_var['coupons']): ?>
                <tr class="line_bold line_bold_bottom">
                    <td colspan="11">&nbsp;</td>
                </tr>
                <tr>
                    <th><input id="all2" type="checkbox" class="checkall" /></th>
                    <th colspan="10"><p class="position1"><label for="all2"><span class="all">Chọn Tất cả</span></label>
                     <a href="javascript:void(0);" ectype="batchbutton" class="delete" uri="index.php?app=my_coupon&act=drop" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')">Xoá</a></p>
                     <p class="position2">
                       <?php echo $this->fetch('member.page.bottom.html'); ?>
                     </p> 
                     </th>
                </tr>
                <?php endif; ?>
                </table>
            </div>
            <div class="wrap_bottom"></div>
        </div>
        <iframe name="my_coupon" style="display:none"></iframe>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>