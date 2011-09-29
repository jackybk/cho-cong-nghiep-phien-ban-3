<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Quản lý menu điều hướng</p>
    <ul class="subnav">
        <li><span>Danh sách</span></li>
        <li><a class="btn1" href="index.php?app=navigation&amp;act=add">Thêm mới</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
            <input type="hidden" name="app" value="navigation" />
            <input type="hidden" name="act" value="index" />
            Tiêu đề:
            <input class="queryInput" type="text" name="title" size="10" value="<?php echo htmlspecialchars($this->_var['query']['title']); ?>" />
            Vị trí:
            <select class="querySelect" name="type">
                <option value="">Hãy chọn...</option>
            <?php echo $this->html_options(array('options'=>$this->_var['type'],'selected'=>$this->_var['query']['type'])); ?>
            </select>
            <input type="submit" class="formbtn" value="Tìm" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=navigation">Hủy bỏ</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="fontr">
    <?php echo $this->fetch('page.top.html'); ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['navigations']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
            <td align="left">Tiêu đề</td>
            <td>Vị trí</td>
            <td align="left" width="40%">Link</td>
            <td class="table-center">Mở bằng cửa sổ mới</td>
            <td class="table-center">Thứ tự hiển thị</td>
            <td class="handler">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['navigations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'navigation');if (count($_from)):
    foreach ($_from AS $this->_var['navigation']):
?>
        <tr class="tatr2">
            <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['navigation']['nav_id']; ?>"/></td>
            <td><?php echo htmlspecialchars($this->_var['navigation']['title']); ?></td>
            <td><?php echo $this->_var['navigation']['type']; ?></td>
            <td><?php echo htmlspecialchars($this->_var['navigation']['link']); ?></td>
            <td class="table-center"><?php echo $this->_var['navigation']['open_new']; ?></td>
            <td class="table-center"><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['navigation']['nav_id']; ?>" datatype="pint" maxvalue="255" class="editable" title="Click vào đây để thay đổi"><?php echo $this->_var['navigation']['sort_order']; ?></span></td>
            <td class="handler"><a href="index.php?app=navigation&amp;act=edit&amp;id=<?php echo $this->_var['navigation']['nav_id']; ?>">Sửa</a>
                |
                <a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó?', 'index.php?app=navigation&amp;act=drop&amp;id=<?php echo $this->_var['navigation']['nav_id']; ?>');">Xóa</a></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['navigations']): ?>
    <div id="dataFuncs">
        <div id="batchAction"  class="left paddingT15">
            &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=navigation&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?');" />
            &nbsp;&nbsp;
             <!-- <input class="formbtn batchButton" type="button" value="lang.update_order" name="id" presubmit="updateOrder(this);" />-->
        </div>
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
        <div class="clear"></div>
    </div>
    <?php endif; ?>
</div>

<?php echo $this->fetch('footer.html'); ?>
