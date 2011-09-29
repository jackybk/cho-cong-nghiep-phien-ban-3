<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="eject_btn" title="Thêm bạn"><b class="ico3" ectype="dialog" dialog_id="friend_add" dialog_title="Thêm bạn" uri="index.php?app=friend&act=add" dialog_width="400">Thêm bạn</b></div>
            <div class="public table">
                <div class="my_friend">
                    <?php if ($this->_var['friends']): ?>
                    <div class="all_btn all_bg_up">
                        <label for="all"><input type="checkbox" id="all" class="checkall"/> Chọn Tất cả</label>
                        <a href="javascript:void(0);" class="note" uri="index.php?app=message&amp;act=send" name="to_id" ectype="batchbutton">Gửi tin nhắn</a>
                        <a href="javascript:void(0);" class="delete" uri="index.php?app=friend&act=drop" name="user_id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')" ectype="batchbutton">Xoá</a>
                    </div>
                    <?php endif; ?>                    
                    <ul <?php if ($this->_var['friends']): ?>class="list"<?php endif; ?>>
                    <?php $_from = $this->_var['friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'friend');if (count($_from)):
    foreach ($_from AS $this->_var['friend']):
?>
                        <li>
                            <p><img src="<?php echo $this->_var['friend']['portrait']; ?>" width="50" height="50" alt="" /></p>
                            <h3>
                                <b><label><input type="checkbox" class="checkitem" value="<?php echo $this->_var['friend']['user_id']; ?>"/><?php echo htmlspecialchars($this->_var['friend']['user_name']); ?></label></b>
                                <span>
                                    <a href="<?php echo url('app=message&act=send&to_id=' . $this->_var['friend']['user_id']. ''); ?>" class="note">Gửi tin nhắn</a>
                                    <a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó ?', 'index.php?app=friend&amp;act=drop&user_id=<?php echo $this->_var['friend']['friend_id']; ?>');" class="delete">Xoá</a>
                                </span>
                            </h3>
                        </li>
                     <?php endforeach; else: ?>
                        <li class="member_no_records" style="text-align:center;width:100%;"><?php echo $this->_var['lang'][$_GET['act']]; ?>Bạn chưa có bạn bè, hãy thêm bạn</li>
                     <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <div class="clear"></div>
                    </ul>
                    <?php if ($this->_var['friends']): ?>
                    <div class="all_btn all_bg_down">
                        <label for="all2"><input type="checkbox" id="all2" class="checkall"/> Chọn Tất cả</label>
                        <a href="javascript:void(0);" class="note" uri="index.php?app=message&amp;act=send" name="to_id" ectype="batchbutton">Gửi tin nhắn</a>
                        <a href="javascript:void(0);" class="delete"  uri="index.php?app=friend&act=drop" name="user_id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')" ectype="batchbutton">Xoá</a>
                    </div>
                    <div class="pages">
                        <?php echo $this->fetch('member.page.bottom.html'); ?>
                    </div>
                    <?php endif; ?>
                </div>
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
<iframe id='iframe_post' name="iframe_post" src="about:blank" frameborder="0" width="0" height="0"></iframe>
<?php echo $this->fetch('footer.html'); ?>
