<?php echo $this->fetch('header.html'); ?>

<script type="text/javascript">
$(function(){
    $('#login_form').validate({
        errorPlacement: function(error, element){
            $(element).parent('td').append(error); 
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup : false,
        rules : {
            user_name : {
                required : true
            },
            password : {
                required : true
            },
            captcha : {
                required : true,
                remote   : {
                    url : 'index.php?app=captcha&act=check_captcha',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha1').val();
                        }
                    }
                }
            }
        },
        messages : {
            user_name : {
                required : 'Bạn phải nhập tên người dùng.'
            },
            password  : {
                required : 'Bạn phải nhập một mật khẩu'
            },
            captcha : {
                required : 'Nhập ký tự trong ảnh bên phải',
                remote   : 'Lỗi mã xác thực'
            }
        }
    });
});
</script>

<div class="content">
    <div class="module_common">
        <h2><b class="login" title="LOGINĐăng nhập"></b></h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="login_con">
                    <div class="login_left">
                        <form method="post" id="login_form">
                        <table>
                            <tr>
                                <td>Tên đăng nhập: </td>
                                <td><input type="text" name="user_name" class="text width5" /></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu: </td>
                                <td><input type="password" name="password" class="text width5" /></td>
                            </tr>
                            <?php if ($this->_var['captcha']): ?>
                            <tr>
                                <td>Xác nhận hình ảnh:</td>
                                <td>
                                    <input type="text" name="captcha" class="text" id="captcha1" />
                                    <span><a href="javascript:change_captcha($('#captcha'));" class="renewedly"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a></span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr class="distance">
                                <td></td>
                                <td>
                                  <input type="submit" name="Submit" value="" class="enter" />                                  
                                  <a href="<?php echo url('app=find_password'); ?>" class="clew">Quên mật khẩu của bạn?</a>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
                        </form>
                    </div>

                    <div class="login_right">
                        <h4>Chú ý:<br />Nếu bạn chưa là thành viên, xin vui lòng đăng ký ngay bây giờ.</h4>
                        <p>Sau khi đăng ký, bạn có thể:</p>
                        <ol>
                            <li><strong>1.</strong> Lưu dữ liệu cá nhân của bạn.</li>
                            <li><strong>2.</strong> Sưu tập hàng hóa liên quan.</li>
                           <!-- <li><strong>3.</strong> Hưởng thụ hệ thống điểm thành viên.</li>-->
                            <li><strong>3.</strong> Đăng thông tin sản phẩm.</li>
                        </ol>
                        <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>" class="login_btn" title="Đăng ký"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>