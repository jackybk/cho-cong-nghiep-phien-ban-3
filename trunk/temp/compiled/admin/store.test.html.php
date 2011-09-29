<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Quản lý cửa hàng</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=store">Danh sách</a></li>
    <li><span>Thêm mới</span></li>
    <li><a class="btn1" href="index.php?app=store&amp;wait_verify=1">Chờ duyệt</a></li>
  </ul>
</div>
<div class="info">
  <form method="post" enctype="multipart/form-data" id="test_form">
    <table class="infoTable">
      <tr>
          <th></th>
        <td class="paddingT15">Vui lòng nhập thông tin cửa hàng!</td>
      </tr>
      <tr>
        <th class="paddingT15"> Tên người dùng.:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="user_name" type="text" id="user_name" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> Mật khẩu.:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="password" type="text" id="password" />
          &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="need_password" value="1" id="checkbox" checked="checked" />
        <label for="need_password">Xác minh mật khẩu!</label></td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20"><input class="formbtn" type="submit" name="Submit" value="Gửi" />
          <input class="formbtn" type="reset" name="Reset" value="Làm lại" /></td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?> 