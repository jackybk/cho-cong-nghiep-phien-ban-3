<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $("img[backup_name]").click(function(){
        if($(this).attr('expanded')=="true"){
            $(this).attr('src', 'templates/style/images/treetable/tv-expandable.gif');
            $("tr[parent='"+$(this).attr('backup_name')+"']").hide();
            $(this).attr('expanded', "false");
        }
        else{
            $(this).attr('src', 'templates/style/images/treetable/tv-collapsable.gif');
            $("tr[parent='"+$(this).attr('backup_name')+"']").show();
            $(this).attr('expanded', "true");
        }
    });
});
</script>
<div id="rightTop">
    <p>Backup CSDL</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=db&amp;act=backup">Backup</a></li>
        <li><span>Khôi phục</span></li>
    </ul>
</div>
<div class="tdare info">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['backups']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
            <td align="left" width="350">Tên sao lưu</td>
            <td>Sao lưu lúc</td>
            <td>Kích thước Backup</td>
            <td>Số lượng</td>
            <td class="handler">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['backups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'backup');if (count($_from)):
    foreach ($_from AS $this->_var['backup']):
?>
        <tr class="tatr2">
            <td class="firstCell"><input value="<?php echo $this->_var['backup']['name']; ?>" class='checkitem' type="checkbox" /></td>
            <td align="left" width="350"><img style="cursor:pointer" backup_name="<?php echo $this->_var['backup']['name']; ?>" src="templates/style/images/treetable/tv-expandable.gif" /> <?php echo htmlspecialchars($this->_var['backup']['name']); ?></td>
            <td><?php echo local_date("Y-m-d H:i:s",$this->_var['backup']['date']); ?></td>
            <td><?php echo $this->_var['backup']['total_size']; ?>kb</td>
            <td><?php echo $this->_var['backup']['total']; ?></td>
            <td class="handler">
            <span>
            <a name="drop" href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó?', 'index.php?app=db&amp;act=drop&amp;backup_name=<?php echo $this->_var['backup']['name']; ?>');">
            Xóa</a>&nbsp;
            |
            <a href="javascript:drop_confirm('Để đảm bảo toàn vẹn dữ liệu, đảm bảo trang web của bạn bị tắt, bạn có chắc chắn muốn thực hiện ngay những hoạt động hiện tại?', 'index.php?app=db&amp;act=import&amp;backup_name=<?php echo $this->_var['backup']['name']; ?>&amp;new=1');">Nhập</a>
            </span>
            </td>
        </tr>
            <?php $_from = $this->_var['backup']['vols']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vol');if (count($_from)):
    foreach ($_from AS $this->_var['vol']):
?>
            <tr class="tatr2" style="display:none" parent="<?php echo $this->_var['backup']['name']; ?>">
                <td class="firstCell"></td>
                <td align="left" width="350"><img style="margin-left:20px" src="templates/style/images/treetable/tv-item.gif" /> <?php echo htmlspecialchars($this->_var['vol']['file']); ?></td>
                <td><?php echo $this->_var['vol']['date']; ?></td>
                <td><?php echo $this->_var['vol']['size']; ?>kb</td>
                <td></td>
                <td class="handler">
                <span>
                <a name="drop" href="index.php?app=db&amp;act=download&amp;backup_name=<?php echo $this->_var['backup']['name']; ?>&amp;file=<?php echo $this->_var['vol']['file']; ?>">Tải về</a>
                </span>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="6">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['backups']): ?>
    <div id="dataFuncs">
        <div id="batchAction" class="left paddingT15">&nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Xóa" name="backup_name" uri="index.php?app=db&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?');" />
        </div>
        <div class="clear"></div>
    </div>
    <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>