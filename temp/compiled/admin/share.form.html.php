<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
//<!CDATA[
$(function(){
    $('#share_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        rules : {
            title : {
                required : true,
                maxlength: 100
            },
            link  : {
                required : true
            },
            logo  : {
                accept : 'png|jpe?g|gif'
            },
            sort_order : {
                number   : true
            }
        },
        messages : {
            title : {
                required : 'Tên chia sẻ không được để trống!',
                maxlength: 'title_maxlength_error'
            },
            link  : {
                required : 'Link chia sẻ không được để trống'
            },
            logo  : {
                accept   : 'Lỗi định dạng chỉ hổ trợ gif, jpeg, jpg, png'
            },
            sort_order  : {
                number   : 'Chỉ nhập số'
            }
        }
    });
});
//]]>
</script>
<div id="rightTop">
    <p>Danh sách link chia sẻ</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=share">Danh sách</a></li>
        <?php if ($this->_var['share']['share_id']): ?>
        <li><a class="btn1" href="index.php?app=share&amp;act=add">Thêm mới</a></li>
        <?php else: ?>
        <li><span>Thêm mới</span></li>
        <?php endif; ?>
    </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data" id="share_form">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Tên chia sẻ:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput2" id="title" type="text" name="title" value="<?php echo htmlspecialchars($this->_var['share']['title']); ?>" />
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Logo:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableFile" id="share_logo" type="file" name="logo" value="" /> <label class="field_notice">Đề nghị kích thước là 16 x 16px</label>
                </td>
            </tr>
            <?php if ($this->_var['share']['logo']): ?>
            <tr>
                <th class="paddingT15">
                </th>
                <td class="paddingT15 wordSpacing5">
                <img src="<?php echo $this->_var['share']['logo']; ?>?<?php echo $this->_var['random_number']; ?>" class="makesmall" max_width="16" max_height="16" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th class="paddingT15">
                    Link:</th>
                <td class="paddingT15 wordSpacing5">
                    <textarea class="infoTableInput" id="link" type="text" name="link"><?php echo htmlspecialchars($this->_var['share']['link']); ?></textarea><br /><label class="field_notice">?{$title}: Tiêu đề chi sẻ,{$link}: Địa chỉ chia sẻ.Ví dụ：http://www.kaixin001.com/repaste/share.php?rtitle={$title}&rurl={$link}</label>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    <label for="type">Thể loại:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <?php echo $this->html_radios(array('options'=>$this->_var['type'],'checked'=>$this->_var['share']['type'],'name'=>'type')); ?>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Thứ tự hiển thị:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="sort_order" id="sort_order" type="text" name="sort_order" value="<?php echo $this->_var['share']['sort_order']; ?>" />
                </td>
            </tr>
        <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="Gửi" />
                <input class="formbtn" type="reset" name="Submit2" value="Làm lại" />
            </td>
        </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
