<?php echo $this->fetch('member.header.html'); ?>
<style type="text/css">
.user_name {position: relative; bottom: 18px; margin-left:5px;}

</style>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="eject_btn" title="Gửi tin nhắn"><b class="ico2" onclick="go('index.php?app=message&act=send');">Gửi tin nhắn</b></div>
            <div class="public table">
                <table class="table_head_line">
                    <?php if ($this->_var['messages']): ?>

                    <tr class="line_bold">
                    <?php if ($_GET['act'] != 'announcepm'): ?>
                        <th class="width1"><input type="checkbox" id="all" class="checkall"/></th>
                        <th class="align1" colspan="4">
                            <label for="all"><span class="all">Chọn Tất cả</span></label>
                            <a href="javascript:;" class="delete" uri="index.php?app=message&act=drop" name="msg_id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')" ectype="batchbutton">Xoá</a>
                        </th>
                    <?php else: ?>
                        <th class="width1"></th>
                        <th colspan="5"></th>
                    <?php endif; ?>
                    </tr>

                    <tr class="line tr_color">
                        <th></th>
                        <th class="align1">Tên đăng nhập</th>
                        <th>Nội dung</th>
                        <th>Cập nhật mới nhất</th>
                        <th class="width4">Hành động</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'message');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['message']):
        $this->_foreach['v']['iteration']++;
?>
                    <tr <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?>class="line_bold"<?php else: ?>class="line"<?php endif; ?>>
                        <td class="align2"><?php if ($_GET['act'] != 'announcepm'): ?><input type="checkbox" class="checkitem" value="<?php echo $this->_var['message']['msg_id']; ?>"/><?php endif; ?></td>
                        <td class="width13"><img class="makesmall" max_width="48" max_height="48" src="<?php echo $this->_var['message']['user_info']['portrait']; ?>" /><span class="user_name"><?php echo $this->_var['message']['user_info']['user_name']; ?></span></td>
                        <td <?php if ($this->_var['message']['new'] == 1): ?>class="link2 font_bold"<?php else: ?>class="link2"<?php endif; ?>><?php echo sub_str($this->_var['message']['content'],110); ?></td>
                        <td class="align2 color1 width8"><?php echo local_date("Y-m-d H:i",$this->_var['message']['last_update']); ?></td>
                        <td class="width8">
                            <a href="<?php echo url('app=message&act=view&msg_id=' . $this->_var['message']['msg_id']. ''); ?>" class="desc">,<a target="_blank" href="%s">Xem chi tiết</a></a>
                            <?php if ($_GET['act'] != 'announcepm'): ?><a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó ?', 'index.php?app=message&amp;act=drop&msg_id=<?php echo $this->_var['message']['msg_id']; ?>');" class="delete">Xoá</a><?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="5" class="member_no_records padding6">Không có dữ liệu <?php echo $this->_var['lang'][$_GET['act']]; ?></td>
                    </tr>

                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['messages']): ?>
                    <?php if ($_GET['act'] != 'announcepm'): ?>
                    <tr>
                        <th class="width1"><input id="all2" type="checkbox" class="checkall" /></th>
                        <th class="align1"><label for="all2"><span class="all">Chọn Tất cả</span></label><a href="javascript:void(0);" class="delete" uri="index.php?app=message&act=drop" name="msg_id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')" ectype="batchbutton">Xoá</a></th>
                        <td colspan="3">
                           <p class="position2">
                                <?php echo $this->fetch('member.page.bottom.html'); ?>
                            </p>
                         </td>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <td colspan="5">
                           <p class="position2">
                                <?php echo $this->fetch('member.page.bottom.html'); ?>
                            </p>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endif; ?>
                </table>
            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>
<?php echo $this->fetch('footer.html'); ?>