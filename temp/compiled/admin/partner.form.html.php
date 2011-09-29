<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
//<!CDATA[
$(function(){
    $('#partner_form').validate({
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
                byteRange: ['',100,'<?php echo $this->_var['charset']; ?>']
            },
            link  : {
                required : true,
                url      : true
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
                required : 'Tên quảng cáo không được để trống',
                byteRange: 'Tên quảng cáo không được quá 100 kí tự'
            },
            link  : {
                required : 'Nhập liên kết quảng cáo',
                url      : 'Đường dẫn không hợp lệ'
            },
            logo  : {
                accept   : 'Hổ trợ định dạng gif, jpg, jpeg, png'
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
    <p>Quản lý quảng cáo</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=partner">Danh sách</a></li>
        <?php if ($this->_var['partner']['partner_id']): ?>
        <li><a class="btn1" href="index.php?app=partner&amp;act=add">Thêm mới</a></li>
        <?php else: ?>
        <li><span>Thêm mới</span></li>
        <?php endif; ?>
    </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data" id="partner_form">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Tiêu đề:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput2" id="partner_title" type="text" name="title" value="<?php echo htmlspecialchars($this->_var['partner']['title']); ?>" />
                    <label class="field_notice">Tên quảng cáo</label>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Link:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="partner_link" type="text" name="link" value="<?php echo htmlspecialchars($this->_var['partner']['link']); ?>" />
                    <label class="field_notice">Liên kết quảng cáo</label>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Logo:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableFile" id="partner_logo" type="file" name="logo" />
                    <label class="field_notice">Ảnh đại diện</label>
                </td>
            </tr>
            <?php if ($this->_var['partner']['logo']): ?>
            <tr>
                <th class="paddingT15">
                </th>
                <td class="paddingT15 wordSpacing5">
                <img src="<?php echo $this->_var['partner']['logo']; ?>" class="makesmall" max_width="120" max_height="90" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th class="paddingT15">
                    Thứ tự hiển thị:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="sort_order" id="sort_order" type="text" name="sort_order" value="<?php echo $this->_var['partner']['sort_order']; ?>" />
                    <label class="field_notice">Thứ tự hiển thị trên website</label>
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
