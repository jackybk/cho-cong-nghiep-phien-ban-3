<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Quản trị</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=admin">Quản lí</a></li>
    <li><span>Thêm mới</span></li>
  </ul>
</div>
<div class="info">
  <form method="post" enctype="multipart/form-data" id="test_form">
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> Tên người dùng:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="user_name" type="text" id="user_name" /><label class="field_notice">Nhập tên thành viên muốn kích hoạt là Amin</label></td>
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