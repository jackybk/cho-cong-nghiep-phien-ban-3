<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#user_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        onkeyup    : false,
        rules : {
            user_name : {
                required : true,
                byteRange: [3,15,'<?php echo $this->_var['charset']; ?>'],
                remote   : {
                    url :'index.php?app=user&act=check_user',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#user_name').val();
                        },
                        id : '<?php echo $this->_var['user']['user_id']; ?>'
                    }
                }
            },
            password: {
                <?php if ($_GET['act'] == 'add'): ?>
                required : true,
                <?php endif; ?>
                maxlength: 20,
                minlength: 6
            },
            email   : {
                required : true,
                email : true
            }
            <?php if (! $this->_var['set_avatar']): ?>
            ,
            portrait : {
                accept : 'png|gif|jpe?g'
            }
            <?php endif; ?>
        },
        messages : {
            user_name : {
                required : 'Tên thành viên không được để trống',
                byteRange: 'Tên người dùng phải từ 3-25 kí tự',
                remote   : 'Tên thành viên đã tồn tại, xin vui lòng chọn tên khác'
            },
            password : {
                <?php if ($_GET['act'] == 'add'): ?>
                required : 'Chưa nhập mật khẩu',
                <?php endif; ?>
                maxlength: 'Mật khẩu phải từ 6-20 kí tự',
                minlength: 'Mật khẩu phải từ 6-20 kí tự'
            },
            email  : {
                required : 'Email ko được để trống',
                email   : 'Vui lòng điền vào địa chỉ Email'
            }
            <?php if (! $this->_var['set_avatar']): ?>
            ,
            portrait : {
                accept : 'Hỗ trợ định dạnh gif,jpg,jpeg,png'
            }
            <?php endif; ?>
        }
    });
});
</script>
<div id="rightTop">
  <p> Thành Viên</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=user">Danh sách</a></li>
    <li>
      <?php if ($this->_var['user']['user_id']): ?>
      <a class="btn1" href="index.php?app=user&amp;act=add">Thêm mới</a>
      <?php else: ?>
      <span>Thêm mới</span>
      <?php endif; ?>
    </li>
  </ul>
</div>
<div class="info">
  <form method="post" enctype="multipart/form-data" id="user_form">
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> Tên truy cập:</th>
        <td class="paddingT15 wordSpacing5"><?php if ($this->_var['user']['user_id']): ?>
          <?php echo htmlspecialchars($this->_var['user']['user_name']); ?>
          <?php else: ?>
          <input class="infoTableInput2" id="user_name" type="text" name="user_name" value="<?php echo htmlspecialchars($this->_var['user']['user_name']); ?>" />
          <label class="field_notice">Tên tài khoản đăng nhập</label>
          <?php endif; ?>        </td>
      </tr>
      <tr>
        <th class="paddingT15"> Mật Khẩu:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="password" type="text" id="password" />
          <?php if ($this->_var['user']['user_id']): ?>
          <span class="grey">Mật khẩu không được để trống</span>
          <?php endif; ?>        </td>
      </tr>
      <tr>
        <th class="paddingT15"> Email:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="email" type="text" id="email" value="<?php echo htmlspecialchars($this->_var['user']['email']); ?>" />
            <label class="field_notice">Email</label>        </td>
      </tr>
      <tr>
        <th class="paddingT15"> Họ và tên:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="real_name" type="text" id="real_name" value="<?php echo htmlspecialchars($this->_var['user']['real_name']); ?>" />        </td>
      </tr>
      <tr>
        <th class="paddingT15"> Giới tính:</th>
        <td class="paddingT15 wordSpacing5"><p>
            <label>
            <input name="gender" type="radio" value="0" <?php if ($this->_var['user']['gender'] == 0): ?>checked="checked"<?php endif; ?> />
            Bí mật</label>
            <label>
            <input type="radio" name="gender" value="1" <?php if ($this->_var['user']['gender'] == 1): ?>checked="checked"<?php endif; ?> />
            Nam</label>
            <label>
            <input type="radio" name="gender" value="2" <?php if ($this->_var['user']['gender'] == 2): ?>checked="checked"<?php endif; ?> />
            Nữ</label>
          </p></td>
      </tr>
      <!--<tr>
        <th class="paddingT15"> <label for="phone_tel">Điện thoại cố định:</label></th>
        <td class="paddingT15 wordSpacing5"><input name="phone_tel[]" id="phone_tel" type="text" size="4" value="<?php echo $this->_var['phone_tel']['0']; ?>" />
          -
          <input class="infoTableInput2" name="phone_tel[]" type="text" value="<?php echo $this->_var['phone_tel']['1']; ?>" />
          -
          <input name="phone_tel[]" type="text" size="4" value="<?php echo $this->_var['phone_tel']['2']; ?>" />
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> Điện thoại đi động:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="phone_mob" type="text" id="phone_mob" value="<?php echo htmlspecialchars($this->_var['user']['phone_mob']); ?>" />
        </td>
      </tr>-->
      <tr>
        <th class="paddingT15"> QQ:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="im_qq" type="text" id="im_qq" value="<?php echo htmlspecialchars($this->_var['user']['im_qq']); ?>" />        </td>
      </tr>
      <tr>
        <th class="paddingT15"> MSN:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="im_msn" type="text" id="im_msn" value="<?php echo htmlspecialchars($this->_var['user']['im_msn']); ?>" />        </td>
      </tr>

     <?php if (! $this->_var['set_avatar']): ?>
      <tr>
        <th class="paddingT15">Avata:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableFile2" type="file" name="portrait" id="portrait" />
          <label class="field_notice">Hỗ trợ định dạnh gif,jpg,jpeg,png</label>
          <?php if ($this->_var['user']['portrait']): ?><br /><img src="../<?php echo $this->_var['user']['portrait']; ?>" alt="" width="100" height="100" /><?php endif; ?>           </td>
      </tr>
     <?php else: ?>
        <?php if ($_GET['act'] == 'edit'): ?>
      <tr>
        <th class="paddingT15">Avata:</th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['set_avatar']; ?></td>
      </tr>
        <?php endif; ?>
     <?php endif; ?>
      <tr>
        <th></th>
        <td class="ptb20"><input class="formbtn" type="submit" name="Submit" value="Gửi" />
          <input class="formbtn" type="reset" name="Reset" value="Làm lại" />        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>