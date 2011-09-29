<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#find_password_form').validate({
        errorPlacement: function(error, element){
          $(element).parent('td').append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        rules : {
            username : {
                required : true
            },
            email : {
                required : true,
                email : true
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
            username : {
                required : 'Bạn chưa nhập tên tài khoản'
            },
            email  : {
                required : 'Email không thể để trống',
                email : 'Email lỗi'
            },
            captcha : {
                required : 'Mã xác thực không thể để trống',
                remote   : 'Mã xác thực sai'
            }
        }
    });
});
</script>     
<div class="content">
    <div class="module_common">
        <h2><b>Xin vui lòng nhập ID đăng nhập của bạn và email, hệ thống kiểm tra sau đó sẽ gửi email đến hộp thư của bạn.</b></h2>
        <div class="wrap">
            <div class="wrap_child">
                <div class="login_con" style="background:#FFF;">
                    <div class="login_left">
                      <form action="" method="POST" id="find_password_form">
                           <table> 
                                <tr>
                                     <td>Tài khoản của bạn:</td><td><input type="text" class="text width5" name="username"/></td>
                                </tr>
                                <tr>
                                     <td>Email của bạn:</td><td><input type="text" class="text width5" name="email"/></td>
                                </tr>
                                <tr>
                                     <td>Mã:</td>
                                     <td><input type="text" class="text" name="captcha" id="captcha1"><span><a class="renewedly" href="javascript:change_captcha($('#captcha'));"><img id="captcha" src="index.php?app=captcha"></a></span></td>
                                </tr>
                                <tr class="distance">
                                     <td></td>
                                     <td><input type="submit" value="Gửi" name="Submit" class="btn" id="captcha1"></td>
                                </tr>
                           </table>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>