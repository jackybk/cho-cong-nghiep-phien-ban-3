<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Sản phẩm đang bán trên website</p>
  <ul class="subnav">
  </ul>
</div>
<div class="info">
  <form method="post">
    <table class="infoTable">
      <?php if ($_GET['act'] == "recommend"): ?>
      <tr>
        <th class="paddingT15">Được giới thiệu đến:</th>
        <td class="paddingT15 wordSpacing5">
            <ul class="recommend_to">
                <?php $_from = $this->_var['recommends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('recom_id', 'recom_name');$this->_foreach['fe_recom'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_recom']['total'] > 0):
    foreach ($_from AS $this->_var['recom_id'] => $this->_var['recom_name']):
        $this->_foreach['fe_recom']['iteration']++;
?>
                <li>
                	<label>
                		<input type="radio" name="recom_id" value="<?php echo $this->_var['recom_id']; ?>" /> <?php echo $this->_var['recom_name']; ?>
                	</label>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </td>
      </tr>
      <?php elseif ($_GET['act'] == "edit"): ?>
      <script type="text/javascript" src="index.php?act=jslang"></script>
      <script type="text/javascript">
//<!CDATA[
$(function(){
    // multi-select mall_gcategory
    gcategoryInit("gcategory");

    $(":radio[name='closed']").click(function(){
        if (this.value == 1)
        {
            $("#close_reason").show();
        }
        else
        {
            $("#close_reason").hide();
        }
    });
});
//]]>
</script>
      <tr>
        <th class="paddingT15">Danh mục sản phẩm:</th>
        <td class="paddingT15 wordSpacing5"><div id="gcategory">
            <input type="hidden" name="cate_id" value="0" class="mls_id" />
            <input type="hidden" name="cate_name" value="" class="mls_names" />
            <select>
              <option>Hãy chọn...</option>


          <?php echo $this->html_options(array('options'=>$this->_var['gcategories'])); ?>


            </select>
            <span class="grey">Vui lòng lựa chọn đúng danh mục sản phẩm</span> </div></td>
      </tr>
      <tr>
        <th class="paddingT15">Thương hiệu:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" type="text" name="brand" id="brand" />
          <span class="grey">Vui lòng lựa chọn đúng thương hiệu sản phẩm</span></td>
      </tr>
      <tr>
        <th class="paddingT15">Tình trạng hiển thị:</th>
        <td class="paddingT15 wordSpacing5"><p>
            <label>
	            <input type="radio" name="closed" value="-1" checked="checked" />
	            Không thay đổi</label>
	            <label>
	            <input type="radio" name="closed" value="1" />
	            Đóng</label>
	            <label>
	            <input type="radio" name="closed" value="0" />
	            Được phép bán
            </label>
          </p></td>
      </tr>
      <tr id="close_reason" style="display:none">
        <th class="paddingT15"><label for="close_reason">Lý do đóng sản phẩm: :</label></th>
        <td class="paddingT15 wordSpacing5"><textarea id="close_reason" name="close_reason" cols="60" rows="3"></textarea></td>
      </tr>
      <?php elseif ($_GET['act'] == "drop"): ?>
      <tr>
        <th class="paddingT15"> <label for="drop_reason">Lý do xóa sản phẩm: :</label></th>
        <td class="paddingT15 wordSpacing5"><textarea id="drop_reason" name="drop_reason" cols="60" rows="3" /></textarea></td>
      </tr>
      <?php endif; ?>
      <tr>
        <th></th>
        <td class="ptb20"><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
          <input class="formbtn" type="submit" name="Submit" value="Gửi" />
          <input class="formbtn" type="button" value="Quay lại" onclick="history.go(-1)" />
        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>