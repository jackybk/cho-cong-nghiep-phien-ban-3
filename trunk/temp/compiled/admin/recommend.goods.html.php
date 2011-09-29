<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>Danh sách sản phẩm khuyến nghị</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=recommend">Quay lại</a></li>
  </ul>
</div>
<div class="mrightTop">
  <div class="fontl"> Xem theo tên khuyến nghị:
    <select class="infoTableSelect" onchange="location='index.php?app=recommend&act=view_goods&id=' + this.value"><?php echo $this->html_options(array('options'=>$this->_var['recommends'],'selected'=>$_GET['id'])); ?>

    </select>
  </div>
  <div class="fontr"> <?php if ($this->_var['goods_list']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?> </div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td width="30%">Tên sản phẩm</td>
      <td width="100">Thứ tự hiển thị</td>
      <td width="10%">Tên cửa hàng</td>
      <td width="10%">Thương hiệu</td>
      <td>Danh mục sản phẩm</td>
      <td>Hiển thị</td>
      <td>Đóng</td>
      <td>Lượt xem</td>
    </tr>
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['goods']['goods_id']; ?>" /></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
      <td><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $_GET['id']; ?>-<?php echo $this->_var['goods']['goods_id']; ?>" class="editable" title="Click vào đây để thay đổi"><?php echo $this->_var['goods']['sort_order']; ?></span></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['store_name']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['brand']); ?></td>
      <td><?php echo nl2br($this->_var['goods']['cate_name']); ?></td>
      <td><?php if ($this->_var['goods']['if_show']): ?><img src="<?php echo $this->res_base . "/" . 'style/images/positive_enabled.gif'; ?>" /><?php else: ?><img src="<?php echo $this->res_base . "/" . 'style/images/positive_disabled.gif'; ?>" /><?php endif; ?></td>
      <td><?php if ($this->_var['goods']['closed']): ?><img src="<?php echo $this->res_base . "/" . 'style/images/negative_enabled.gif'; ?>" /><?php else: ?><img src="<?php echo $this->res_base . "/" . 'style/images/negative_disabled.gif'; ?>" /><?php endif; ?></td>
      <td><?php echo ($this->_var['goods']['views'] == '') ? '0' : $this->_var['goods']['views']; ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="5">Không có dữ liệu</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15"> &nbsp;&nbsp;
      <input class="formbtn batchButton" type="button" value="Hủy bỏ" name="goods_id" uri="index.php?app=recommend&act=drop_goods_from&id=<?php echo $_GET['id']; ?>" title="Bỏ khuyến nghị các sản phẩm được chọn"/>
    </div>
  </div>
  <div class="pageLinks"> <?php if ($this->_var['goods_list']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?> </div>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?> 