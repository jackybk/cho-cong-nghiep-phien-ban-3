<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Quản lý cấp cửa hàng</p>
  <ul class="subnav">
    <li><span>Danh sách</span></li>
    <li><a class="btn1" href="index.php?app=sgrade&amp;act=add">Thêm mới</a></li>
  </ul>
</div>
<div class="mrightTop">
  <div class="fontl">
    <form method="get">
      <div class="left">
          <input type="hidden" name="app" value="sgrade" />
          <input type="hidden" name="act" value="index" />
          Tên cấp cửa hàng:
          <input class="queryInput" type="text" name="grade_name" value="<?php echo htmlspecialchars($_GET['grade_name']); ?>" />
          <input type="submit" class="formbtn" value="Tìm" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=sgrade">Hủy bỏ</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['sgrades']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td>Tên cấp cửa hàng</td>
      <td>Số sản phẩm tối đa</td>
      <td>Dung lượng tối đa(MB)</td>
      <td>Template cho phép</td>
      <td>Lệ phí</td>
      <td class="table-center">Kiểm duyệt</td>
      <td class="handler" style="width: 250px">Hành động</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['sgrades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgrade');if (count($_from)):
    foreach ($_from AS $this->_var['sgrade']):
?>
    <tr class="tatr2">
      <td class="firstCell"><?php if ($this->_var['sgrade']['grade_id'] != 1): ?><input type="checkbox" class="checkitem" value="<?php echo $this->_var['sgrade']['grade_id']; ?>" /><?php endif; ?></td>
      <td><?php echo htmlspecialchars($this->_var['sgrade']['grade_name']); ?></td>
      <td><?php echo $this->_var['sgrade']['goods_limit']; ?></td>
      <td><?php echo $this->_var['sgrade']['space_limit']; ?></td>
      <td><?php echo $this->_var['sgrade']['skin_limit']; ?></td>
      <td><?php echo $this->_var['sgrade']['charge']; ?></td>
      <td class="table-center">ty</td>
      <td class="handler" style="width: 250px">
      <span style="width: 230px">
      <a href="index.php?app=sgrade&amp;act=edit&amp;id=<?php echo $this->_var['sgrade']['grade_id']; ?>">Sửa</a> | <?php if ($this->_var['sgrade']['grade_id'] == 1): ?>Mặc định<?php else: ?><a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa?', 'index.php?app=sgrade&amp;act=drop&amp;id=<?php echo $this->_var['sgrade']['grade_id']; ?>');">Xóa</a><?php endif; ?> | <a href="index.php?app=sgrade&amp;act=set_skins&amp;id=<?php echo $this->_var['sgrade']['grade_id']; ?>">Thiết lập Template</a>
      </span>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="10">Không có dữ liệu</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['sgrade']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15"> &nbsp;&nbsp;
      <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=sgrade&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa?');" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <div class="clear"></div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?> 