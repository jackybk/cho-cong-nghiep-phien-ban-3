<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Quản lý cửa hàng</p>
  <ul class="subnav">
    <?php if ($_GET['wait_verify']): ?>
    <li><a class="btn1" href="index.php?app=store">Danh sách</a></li>
    <?php else: ?>
    <li><span>Danh sách</span></li>
    <?php endif; ?>
    <li><a class="btn1" href="index.php?app=store&amp;act=test">Thêm mới</a></li>
    <?php if ($_GET['wait_verify']): ?>
    <li><span>Chờ duyệt</span></li>
    <?php else: ?>
    <li><a class="btn1" href="index.php?app=store&amp;wait_verify=1">Chờ duyệt</a></li>
    <?php endif; ?>
  </ul>
</div>
<div class="mrightTop">
  <div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="store" />
          <input type="hidden" name="act" value="index" />
          <input type="hidden" name="wait_verify" value="<?php echo $_GET['wait_verify']; ?>" />
          Tên truy cập:
          <input class="queryInput" type="text" name="owner_name" value="<?php echo htmlspecialchars($_GET['owner_name']); ?>" />
          Tên cửa hàng:
          <input class="queryInput" type="text" name="store_name" value="<?php echo htmlspecialchars($_GET['store_name']); ?>" />
          Cấp cửa hàng:
          <select class="querySelect" name="sgrade">
            <option value="">Hãy chọn...</option>
            <?php echo $this->html_options(array('options'=>$this->_var['sgrades'],'selected'=>$_GET['sgrade'])); ?>
          </select>
          <input type="submit" class="formbtn" value="Tìm" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=store<?php if ($_GET['wait_verify']): ?>&amp;wait_verify=<?php echo $_GET['wait_verify']; ?><?php endif; ?>">Hủy bỏ</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?> </div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['stores']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td>Tên truy nhập | Họ và tên</td>
      <td><span ectype="order_by" fieldname="store_name">Tên cửa hàng</span></td>
      <td><span ectype="order_by" fieldname="region_id">Khu vực</span></td>
      <td><span ectype="order_by" fieldname="sgrade">Cấp cửa hàng</span></td>
      <td class="table-center"><span ectype="order_by" fieldname="add_time">Thời hạn đến</span></td>
      <td class="table-center"><span ectype="order_by" fieldname="state">Tình trạng</span></td>
      <?php if (! $_GET['wait_verify']): ?>
      <td class="table-center"><span ectype="order_by" fieldname="sort_order">Thứ tự hiển thị</span></td>
      <td class="table-center"><span ectype="order_by" fieldname="recommended">Khuyến nghị</td>
      <?php endif; ?>
      <td class="handler" style="width: 130px;">Hành động</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['stores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['store']['store_id']; ?>" /></td>
      <td><?php echo htmlspecialchars($this->_var['store']['user_name']); ?> | <?php echo htmlspecialchars($this->_var['store']['owner_name']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></td>
      <td><?php echo $this->_var['store']['sgrade']; ?></td>
      <td class="table-center"><?php echo local_date("Y-m-d",$this->_var['store']['end_time']); ?></td>
      <td class="table-center"><?php echo $this->_var['store']['state']; ?></td>
      <?php if (! $_GET['wait_verify']): ?>
      <td class="table-center"><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['store']['store_id']; ?>" datatype="pint" title="Click vào đây để thay đổi" class="editable"><?php echo $this->_var['store']['sort_order']; ?></span></td>
      <td class="table-center"><?php if ($this->_var['store']['recommended']): ?><img src="templates/style/images/positive_enabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['store']['store_id']; ?>" fieldvalue="1" title="Click vào đây để thay đổi"/><?php else: ?><img src="templates/style/images/positive_disabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['store']['store_id']; ?>" fieldvalue="0" title="Click vào đây để thay đổi"/><?php endif; ?></td>
      <?php endif; ?>
      <td class="handler">
        <?php if (! $_GET['wait_verify']): ?>
        <a href="index.php?app=store&amp;act=edit&amp;id=<?php echo $this->_var['store']['store_id']; ?>">Sửa</a> | <a href="javascript:drop_confirm('Bạn có chắc chắn muốn loại bỏ cửa hàng này ko? Nó sẽ liên quan tới nhiều cái khác!', 'index.php?app=store&amp;act=drop&amp;id=<?php echo $this->_var['store']['store_id']; ?>');">Xóa</a> | <a target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=store&amp;id=<?php echo $this->_var['store']['store_id']; ?>">Xem cửa hàng</a>
        <?php else: ?>
        <a href="index.php?app=store&amp;act=view&amp;id=<?php echo $this->_var['store']['store_id']; ?>">Xem</a>
        <?php endif; ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="12">Không có dữ liệu</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['stores']): ?>
  <div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div id="batchAction" class="left paddingT15"><?php if (! $_GET['wait_verify']): ?>
      &nbsp;&nbsp;
      <input class="formbtn batchButton" type="button" value="Sửa" name="id" uri="index.php?app=store&act=batch_edit&ret_page=<?php echo $this->_var['page_info']['curr_page']; ?>" />
      &nbsp;&nbsp;
      <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=store&act=drop" presubmit="confirm('Bạn có chắc chắn muốn loại bỏ cửa hàng này ko? Nó sẽ liên quan tới nhiều cái khác!');" />
      <!--&nbsp;&nbsp;
      <input class="formbtn batchButton" type="button" value="Phân loại" name="id" presubmit="updateOrder(this);" />-->
      <?php else: ?>
      <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=store&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa các cửa hàng đã chọn?');" />
      <?php endif; ?>
    </div>
  </div>
  <div class="clear"></div>
  <?php endif; ?>

</div>
<?php echo $this->fetch('footer.html'); ?>