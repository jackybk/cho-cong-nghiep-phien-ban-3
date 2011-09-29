<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
      <p>Danh sách sản phẩm</p>
      <ul class="subnav">
        <li><?php if ($_GET['closed']): ?><a class="btn1" href="index.php?app=goods">Tất cả</a><?php else: ?><span>Tất cả</span><?php endif; ?></li>
        <li><?php if ($_GET['closed']): ?><span>Cấm bán</span><?php else: ?><a class="btn1" href="index.php?app=goods&amp;closed=1">Cấm bán</a><?php endif; ?></li>
      </ul>
</div>


<div class="mrightTop1 info">
  <div class="fontl">
    <form method="get">
      <input type="hidden" name="app" value="goods" />
      <?php if ($_GET['closed']): ?>
      <input type="hidden" name="closed" value="1" />
      <?php endif; ?> Tên sản phẩm:
      <input class="queryInput" type="text" name="goods_name" value="<?php echo htmlspecialchars($_GET['goods_name']); ?>" />
      Tên cửa hàng:
      <input class="queryInput" type="text" name="store_name" value="<?php echo htmlspecialchars($_GET['store_name']); ?>" />
      Thương hiệu:
      <input class="queryInput" type="text" name="brand" value="<?php echo htmlspecialchars($_GET['brand']); ?>" /><br />
      <span style="position: relative; top: 5px;">
      <div class="left">
          Danh mục sản phẩm:
          <div id="gcategory" style="display:inline;">
            <input type="hidden" name="cate_id" value="0" class="mls_id" />
            <select class="querySelect">
              <option>Hãy chọn...</option>
              <?php echo $this->html_options(array('options'=>$this->_var['gcategories'])); ?>
            </select>
          </div>
          <input type="submit" class="formbtn" value="Tìm" />
      </div>
      <?php if ($_GET['cate_id'] || $this->_var['query']['goods_name'] || $this->_var['query']['store_name'] || $this->_var['query']['brand']): ?>
      <a class="left formbtn1" href="index.php?app=goods<?php if ($this->_var['query']['closed']): ?>&amp;closed=<?php echo $this->_var['query']['closed']; ?><?php endif; ?>">Hủy bỏ</a>
      <?php endif; ?>
      </span>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['goods_list']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td width="30%"><span ectype="order_by" fieldname="goods_name">Tên sản phẩm</span></td>
      <td width="10%"><span ectype="order_by" fieldname="store_name">Tên cửa hàng</span></td>
      <td><span ectype="order_by" fieldname="brand">Thương hiệu</span></td>
      <td><span ectype="order_by" fieldname="cate_id">Danh mục sản phẩm</span></td>
      <td class="table-center"><span ectype="order_by" fieldname="if_show">Hiển thị</span></td>
      <td class="table-center"><span ectype="order_by" fieldname="closed">Đóng</span></td>
      <td><span ectype="order_by" fieldname="views">Lượt xem</span></td>
      <td>Hành động</td>
    </tr>
    <?php endif; ?>
    
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['goods']['goods_id']; ?>"/></td>
      <td><span ectype="inline_edit" fieldname="goods_name" fieldid="<?php echo $this->_var['goods']['goods_id']; ?>" required="1" class="editable" title="Click vào đây để thay đổi"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></span></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['store_name']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['brand']); ?></td>
      <td><?php echo nl2br($this->_var['goods']['cate_name']); ?></td>
      <td class="table-center">
      <?php if ($this->_var['goods']['if_show']): ?>
      <img src="<?php echo $this->res_base . "/" . 'style/images/positive_enabled.gif'; ?>" />
      <?php else: ?>
      <img src="<?php echo $this->res_base . "/" . 'style/images/positive_disabled.gif'; ?>" /><?php endif; ?>
      </td>
      <td class="table-center">
      <?php if ($this->_var['goods']['closed']): ?>
      <img src="<?php echo $this->res_base . "/" . 'style/images/negative_enabled.gif'; ?>" ectype="inline_edit" fieldname="closed" fieldid="<?php echo $this->_var['goods']['goods_id']; ?>" fieldvalue="1" title="Click vào đây để thay đổi"/>
      <?php else: ?>
      <img src="<?php echo $this->res_base . "/" . 'style/images/negative_disabled.gif'; ?>" ectype="inline_edit" fieldname="closed" fieldid="<?php echo $this->_var['goods']['goods_id']; ?>" fieldvalue="0" title="Click vào đây để thay đổi"/>
      <?php endif; ?>
      </td>
      <td><?php echo ($this->_var['goods']['views'] == '') ? '0' : $this->_var['goods']['views']; ?></td>
      <td>
      	<a target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=goods&amp;id=<?php echo $this->_var['goods']['goods_id']; ?>">Xem</a>|
      	<a href="<?php echo $this->_var['site_url']; ?>/admin/index.php?app=goods&act=editdetail&id=<?php echo $this->_var['goods']['goods_id']; ?>">Sửa</a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    
    <tr class="no_data info">
      <td colspan="8">Không có dữ liệu</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['goods_list']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15"> <?php if (! $_GET['closed']): ?>
      <input class="formbtn batchButton formbtn2" type="button" value="Khuyến nghị" name="id" uri="index.php?app=goods&act=recommend&ret_page=<?php echo $this->_var['page_info']['curr_page']; ?>" />
          &nbsp;&nbsp;<?php endif; ?>
      <input class="formbtn batchButton" type="button" value="Sửa" name="id" uri="index.php?app=goods&act=edit&ret_page=<?php echo $this->_var['page_info']['curr_page']; ?>" />&nbsp;&nbsp;
      <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=goods&act=drop&ret_page=<?php echo $this->_var['page_info']['curr_page']; ?>" presubmit="confirm('Bạn có chắc chắn muốn xóa? Nó sẽ không khôi phục lại được')" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
   <?php endif; ?>
  </div>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>