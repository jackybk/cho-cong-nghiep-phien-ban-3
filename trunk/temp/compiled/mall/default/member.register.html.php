<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#register_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('td').find('span.error');
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
                byteRange: [6,40,'<?php echo $this->_var['charset']; ?>'],
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
                minlength: 6,
				maxlength: 20
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
                required : 'Vui lòng nhập tên truy cập',
                byteRange: 'Tên truy cập từ 6 - 40 ký tự (chữ, số, ký tự _, viết liền, không dấu)',
                remote   : 'Tên truy cập đã tồn tại'
            },
            password  : {
                required : 'Vui lòng nhập mật khẩu',
                minlength: 'Mật khẩu phải ít nhất 6 ký tự (6-20 ký tự)',
				maxlength: 'Mật khẩu không được quá 20 ký tự (6-20 ký tự)'
            },
            password_confirm : {
                required : 'Vui lòng xác nhận mật khẩu',
                equalTo  : 'Mật khẩu xác nhận không giống nhau'
            },
            email : {
                required : 'Vui lòng nhập email để kích hoạt tài khoản',
                email    : 'Địa chỉ email không hợp lệ'
            },
            captcha : {
                required : 'Nhập ký tự trong ảnh bên phải',
                remote   : 'Mã xác thực không chính xác'
            },
            agree : {
                required : 'Bạn phải đọc và đồng ý với thỏa thuận, hoặc không đăng ký'
            }
        }
    });
});
</script>
<div id="wrapper">
	<?php echo $this->fetch('curlocal.html'); ?>
	<div class="content content-wrap">
		<div class="module_common">
			<h2><b class="register" title="Đăng ký thành viên">Đăng ký thành viên</b></h2>
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
									<td valign="top">Tên truy cập:</td>
									<td>
										<input type="text" id="user_name" name="user_name" class="text width10" /><label id="checking_user" class="checking">Đang kiểm tra...</label><span class="error"></span>
										<br/><label class="field_notice blockfield">- Tên truy cập phải có ít nhất 6 ký tự (chữ, số, ký tự _, viết liền, không dấu)<br/>- Nếu đăng ký gian hàng, bạn nên lấy tên phù hợp với Công ty của bạn<br/>- Ví dụ: Công ty TNHH Tinh dầu 100 thì nên lấy tên "tinhdau100"<br/>- Tên gian hàng sẽ được hiển thị http://www.chocongnghiep.com.vn/tinhdau100</label>
									</td>
									<td class="padding3 fontColor4" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">Mật khẩu:</td>
									<td>
										<input type="password" id="password" name="password" class="text width10" /><span class="error"></span>
										<br/>
										<label class="field_notice blockfield">- Mật khẩu phải có ít nhất 6 ký tự.<br/>- Để tránh trường hợp bị chiếm đoạt tài khoản sử dụng vào mục đích vi phạm pháp luật. Do vậy:<br/>- Bạn không nên đặt mật khẩu quá đơn giản, dễ đoán (vd: 123456, abcdef,...)<br/>- Không nên trùng với Tên truy cập, Email, Điện thoại cố định, Điện thoại di động,... </label>
									</td>
									<td class="padding3 fontColor4">&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">Nhập lại mật khẩu:</td>
									<td><input type="password" name="password_confirm" class="text width10" /><span class="error"></span></td>
									<td class="padding3 fontColor4">&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">Email:</td>
									<td>
										<input type="text" name="email" class="text width10" /><span class="error"></span>
										<br/>
										<label class="field_notice blockfield">- Bạn phải gửi địa chỉ email chính xác để chúng tôi gửi email kích hoạt vào đó.</label>
									</td>
									<td class="padding3 fontColor4">&nbsp;</td>
								</tr>
								<?php if ($this->_var['captcha']): ?>
								<tr>
									<td>Mã bảo vệ:</td>
									<td>
										<input type="text" name="captcha" class="text" id="captcha1" style="width:70px"/>
										<a href="javascript:change_captcha($('#captcha'));" class="renewedly"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a><span class="error"></span>
									</td>
									<td class="padding3 fontColor4">&nbsp;</td>
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
							<h4>Chú ý:<br />Bạn chưa có tài khoản?.</h4>
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
</div>
