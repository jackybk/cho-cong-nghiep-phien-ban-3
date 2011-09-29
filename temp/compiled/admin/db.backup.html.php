<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $("input[name='backup_type']").each(function(){
    $(this).click(function(){
        if($(this).val() == 'backup_custom'){
            $("*[ectype='tables']").show();
            $("*[ectype='tables']").find('input').removeAttr('disabled');
        }else{
            $("*[ectype='tables']").hide();
            $("*[ectype='tables']").find('input').attr('disabled','true');
        }
    });
    });
});
</script>
<div id="rightTop">
    <p>Backup CSDL</p>
    <ul class="subnav">
        <?php if ($_GET['act'] == 'backup'): ?>
        <li><span>Backup</span></li>
        <?php else: ?>
        <li><a class="btn1" href="index.php?app=db&amp;act=backup">
        Backup</a></li>
        <?php endif; ?>
        <?php if ($_GET['act'] == 'restore'): ?>
        <li><span>Khôi phục</span></li>
        <?php else: ?>
        <li><a class="btn1" href="index.php?app=db&amp;act=restore">
        Khôi phục</a></li>
        <?php endif; ?>
    </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
              <th class="paddingT15">Backup:</th>
              <td class="paddingT15 wordSpacing5"><input name="backup_type" type="radio" id="backup_all" value="backup_all" checked="checked" />
              <label for="backup_all">Backup All</label> <input type="radio" name="backup_type" id="backup_custom" value="backup_custom" />
              <label for="backup_custom">Tùy chọn Backup</label></td>
            </tr>
            <tr style="display:none" ectype="tables">
                <th class="paddingT15">
                    CSDL:</th>
                <td class="paddingT15 wordSpacing5">
                <ul>
                <li style="height:20px;"><input id="checkall" disabled="true" type="checkbox" class="checkall" checked="checked" />
                <label for="checkall">Chọn tất cả</label>
                </li>
                <?php $_from = $this->_var['tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('table', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['table'] => $this->_var['item']):
?>
                <li style="float:left; width:28%; height:20px;"><input name="tables[<?php echo $this->_var['table']; ?>]" class="checkitem" disabled="true" type="checkbox" value="-1" checked="checked" /><?php echo $this->_var['table']; ?></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>                </td>
            </tr>

            <tr style="display:none">
            <th class="paddingT15">Mở rộng:</th>
            <td class="paddingT15 wordSpacing5">
            <input id="yes" type="radio" name="ext_insert" value="1" />
            <label for="yes">Có</label>
            <input id="no" type="radio" name="ext_insert" value="0" checked="checked" />
            <label for="no">Không</label>
            <label class="field_notice">Mở rộng vào những cách để giảm kích thước của tập tin sao lưu</label>
            </td>
        </tr>

        <tr>
            <th class="paddingT15">Kích thước nhỏ nhất(kb):</th>
            <td class="paddingT15 wordSpacing5">
            <input name="vol_size" value="<?php echo $this->_var['vol_size']; ?>" />
            <label class="field_notice">Chi kích thước khối lượng ít nhất là 10K</label>
            </td>
        </tr>
        <tr>
            <th class="paddingT15">Tên sao lưu:</th>
            <td class="paddingT15 wordSpacing5">
             <input name="backup_name" value="<?php echo $this->_var['backup_name']; ?>" />
             <label class="field_notice">Backup Tên 1-20 chữ số, chữ cái hoặc dấu gạch dưới</label>
             </td>
        </tr>
        <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" value="Gửi" onclick="return drop_confirm('Để đảm bảo toàn vẹn dữ liệu, đảm bảo trang web của bạn bị tắt, bạn có chắc chắn muốn thực hiện ngay những hoạt động hiện tại?');"/>
                <input class="formbtn" type="reset" name="Submit2" value="Làm lại" />            </td>
        </tr>
        </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
