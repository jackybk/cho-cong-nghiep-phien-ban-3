<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Quản lý danh mục khuyến nghị</p>
  <ul class="subnav">
    <li><span>Danh sách</span></li>
    <li><a class="btn1" href="index.php?app=recommend&amp;act=add">Thêm mới</a></li>
  </ul>
</div>
<div class="mrightTop">
  <div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="recommend" />
          <input type="hidden" name="act" value="index" />
          Tên khuyến nghị:
          <input class="queryInput" type="text" name="recom_name" value="<?php echo htmlspecialchars($_GET['recom_name']); ?>" />
          <input type="submit" class="formbtn" value="Tìm" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=recommend">Hủy bỏ</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['recommends']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td>Tên khuyến nghị</td>
      <td>Số lượng sản phẩm</td>
      <td class="handler">Hành động</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['recommends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'recommend');if (count($_from)):
    foreach ($_from AS $this->_var['recommend']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['recommend']['recom_id']; ?>" /></td>
      <td><?php echo htmlspecialchars($this->_var['recommend']['recom_name']); ?></td>
      <td><?php echo ($this->_var['recommend']['goods_count'] == '') ? '0' : $this->_var['recommend']['goods_count']; ?></td>
      <td class="handler"><a href="index.php?app=recommend&amp;act=edit&amp;id=<?php echo $this->_var['recommend']['recom_id']; ?>" title="Sửa">Sửa</a> | <a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa?', 'index.php?app=recommend&amp;act=drop&amp;id=<?php echo $this->_var['recommend']['recom_id']; ?>');" title="Xóa">Xóa</a> | <a href="index.php?app=recommend&amp;act=view_goods&amp;id=<?php echo $this->_var['recommend']['recom_id']; ?>" title="Xem danh sách sản phẩm thuộc loại khuyến nghị này">Xem</a></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="10">Không có dữ liệu</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['recommends']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15"> &nbsp;&nbsp;
      <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=recommend&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa?');" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?> 