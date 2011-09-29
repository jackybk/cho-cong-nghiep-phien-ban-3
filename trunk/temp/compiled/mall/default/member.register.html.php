<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
//注册表单验证
$(function(){
    $('#register_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('td').next('td');
            error_td.find('.field_notice').hide();
            error_td.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup: false,
        rules : {
            user_name : {
                required : true,
                byteRange: [3,15,'<?php echo $this->_var['charset']; ?>'],
                remote   : {
                    url :'index.php?app=member&act=check_user&ajax=1',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#user_name').val();
                        }
                    },
                    beforeSend:function(){
                        var _checking = $('#checking_user');
                        _checking.prev('.field_notice').hide();
                        _checking.next('label').hide();
                        $(_checking).show();
                    },
                    complete :function(){
                        $('#checking_user').hide();
                    }
                }
            },
            password : {
                required : true,
                minlength: 6
            },
            password_confirm : {
                required : true,
                equalTo  : '#password'
            },
            email : {
                required : true,
                email    : true
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
            },
            agree : {
                required : true
            }
        },
        messages : {
            user_name : {
                required : 'Bạn phải nhập tên người dùng.',
                byteRange: 'Tên người dùng từ 3-25 ký tự',
                remote   : 'Tên người dùng đã tồn tại'
            },
            password  : {
                required : 'Bạn phải nhập một mật khẩu',
                minlength: 'Chiểu dài mật khẩu từ 6-20 ký tự'
            },
            password_confirm : {
                required : 'Bạn phải xác nhận mật khẩu một lần nữa',
                equalTo  : 'Hai mật khẩu không giống nhau'
            },
            email : {
                required : 'Bạn phải cugn cấp email của bạn',
                email    : 'Địa chỉ email không hợp lệ'
            },
            captcha : {
                required : 'Nhập ký tự trong ảnh bên phải',
                remote   : 'Lỗi mã xác thực'
            },
            agree : {
                required : 'Bạn phải đọc và đồng ý với thỏa thuận, hoặc không đăng ký'
            }
        }
    });
});
</script>
<div class="content">
    <div class="module_common">
        <h2><b class="register" title="JOIN USĐăng ký thành viên"></b></h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="login_con">
                    <div class="login_fill_in">
                        <form name="" id="register_form" method="post" action="">
                        <table>
                            <tr>
                                <td colspan="3"><h4>Điền thông tin đăng ký</h4></td>
                            </tr>
                            <tr>
                                <td>Tên đăng nhập:</td>
                                <td><input type="text" id="user_name" name="user_name" class="text width10" /></td>
                                <td class="padding3 fontColor4"><label class="field_notice">Tên đăng nhập của bạn</label><label id="checking_user" class="checking">Đang kiểm tra...</label></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu:</td>
                                <td><input type="password" id="password" name="password" class="text width10" /></td>
                                <td class="padding3 fontColor4"><label class="field_notice">Mật khẩu của bạn</label></td>
                            </tr>
                            <tr>
                                <td>Xác nhận mật khẩu:</td>
                                <td><input type="password" name="password_confirm" class="text width10" /></td>
                                <td class="padding3 fontColor4"><label class="field_notice">Lặp lại nhập mật khẩu mới.</label></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" class="text width10" /></td>
                                <td class="padding3 fontColor4"><label class="field_notice">Nhập địa chỉ e-mail hợp lệ.</label></td>
                            </tr>
                            <?php if ($this->_var['captcha']): ?>
                            <tr>
                                <td>Xác nhận hình ảnh:</td>
                                <td>
                                    <input type="text" name="captcha" class="text" id="captcha1" />
                                    <a href="javascript:change_captcha($('#captcha'));" class="renewedly"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a>
                                </td>
                                <td class="padding3 fontColor4"><label class="field_notice">Nhập các ký tự trong hình.</label></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td></td>
                                <td><input id="clause" type="checkbox" name="agree" value="1" /> <label for="clause">Tôi đã đọc và đồng ý <a href="<?php echo url('app=article&act=system&code=eula'); ?>" target="_blank" class="agreement">Thỏa thuận người sử dụng</a></label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><input type="submit" name="Submit" value="" class="login_btn" title="Đăng ký" /></td><input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
                            </tr>
                        </table>
                        </form>
                    </div>

                    <div class="login_right">
                        <h4>Chú ý:<br />Nếu bạn chưa là thành viên, xin vui lòng đăng ký ngay bây giờ.</h4>
                        <p>Sau khi đăng ký, bạn có thể:</p>
                        <ol>
                            <li><strong>1.</strong> Lưu dữ liệu cá nhân của bạn.</li>
                            <li><strong>2.</strong> Sưu tập hàng hóa liên quan.</li>
                            <!--<li><strong>3.</strong> Hưởng thụ hệ thống điểm thành viên.</li>-->
                            <li><strong>3.</strong> Đăng thông tin sản phẩm.</li>
                        </ol>
                        <h4>Bạn đã có tài khoản</h4>
                        <a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>" class="enter" title="Đăng nhập"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>
