<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Xuất dữ liệu</p>
  <ul class="subnav">
  </ul>
</div>
<div class="info">
  <form method="post">
    <table class="infoTable">
      <tr>
        <td class="paddingT15 wordSpacing5" width="40"></td>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['note_for_export']; ?></td>
      </tr>
      <tr>
        <td class="paddingT15 wordSpacing5" width="40"></td>
        <td class="paddingT15 wordSpacing5"><p>
            <label>
            <input type="radio" name="if_convert" value="1" checked="checked" />
            Có</label>
            <label>
            <input type="radio" name="if_convert" value="0" />
            Không</label>
          </p><br />
          <span class="grey">Nếu bạn cần để xuất file excel mở, chọn "Yes", nếu không, có thể xuất hiện bị cắt xén khi mở ra, nếu bạn nhập các tập tin xuất khẩu để sử dụng, nên không chuyển đổi, chuyển mã này có thể tiết kiệm thời gian.</span></td>
      </tr>
      <tr>
        <td class="ptb20" width="40"></td>
        <td class="ptb20"><input class="formbtn" type="submit" name="Submit" value="Xuất" />
          <input class="formbtn" type="button" onclick="history.go(-1)" value="Quay lại" />
        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?> 