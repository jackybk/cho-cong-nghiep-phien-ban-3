<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#send_test_email').click(send_test_email);
});
function send_test_email(){
    var email_type = $('input[name="email_type"]:checked').val();
    $.ajax({
        type:"POST",
        url:"index.php",
        data:'app=setting&act=send_test_email&email_type='+email_type+'&email_host='+$("#email_host").val()+'&email_port='+$("#email_port").val()+'&email_addr='+$("#email_addr").val()+'&email_id='+$("#email_id").val()+'&email_pass='+$("#email_pass").val()+'&email_test='+$("#email_test").val(),
        dataType:"json",
        success:function(data){
            if(data.done){
            alert(data.msg);
            }
            else{
                alert(data.msg);
            }
        },
        error: function(){alert('Không thể gửi tin nhắn thử nghiệm, xin vui lòng lại cấu hình máy chủ mail');}
    });
}
</script>



<div id="rightTop">
    <p>Cấu hình hệ thống</p>
    <ul class="subnav">
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_setting">Thông tin cơ bản</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_information">Cấu hình website</a></li>
        <li><span>Cấu hình email</span></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=captcha_setting">Mã bảo vệ</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=store_setting">Cấu hình cửa hàng</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=credit_setting">Cấu hình tích hợp</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=subdomain_setting">Tên miền phụ</a></li>
        </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    <label for="email_type">Loại email:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <?php echo $this->html_radios(array('name'=>'email_type','options'=>$this->_var['mail_type'],'checked'=>$this->_var['setting']['email_type'])); ?>
                    <label class="field_notice">Nếu máy chủ không hổ trợ có thể bỏ trống</label>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Server SMTP:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="email_host" type="text" name="email_host" value="<?php echo $this->_var['setting']['email_host']; ?>"/>
                    <label class="field_notice">Đặt địa chỉ máy chủ SMTP</label></td>
            </tr>
            <tr>
                <th class="paddingT15">
                    SMTP PORT:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="email_port" type="text" name="email_port" value="<?php echo $this->_var['setting']['email_port']; ?>"/>
                    <label class="field_notice">Đặt SMTP server port, mặc định là 25</label></td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Tên người gửi mail:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="email_addr" type="text" name="email_addr" value="<?php echo $this->_var['setting']['email_addr']; ?>"/>
                    <label class="field_notice">Nếu SMTP yêu cầu xác thực máy chủ, căn cứ vào địa chỉ mail</label></td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Xác thực tên người dùng SMTP:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="email_id" type="text" name="email_id" value="<?php echo $this->_var['setting']['email_id']; ?>"/></td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Mật khẩu SMTP:</th>
                <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" id="email_pass" type="password" name="email_pass" value="<?php echo $this->_var['setting']['email_pass']; ?>"/></td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Kiểm tra địa chỉ mail:</th>
                <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" id="email_test" type="text" name="email_test" value="<?php echo $this->_var['setting']['email_test']; ?>"/>&nbsp;&nbsp;<input id="send_test_email" class="formbtn" type="button" name="send_test_email" value="Kiểm tra" /></td>
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
