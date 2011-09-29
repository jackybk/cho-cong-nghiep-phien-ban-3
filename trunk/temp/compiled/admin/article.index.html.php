<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Quản lý danh sách tin tức</p>
    <ul class="subnav">
        <li><span>Danh sách</span></li>
        <li><a class="btn1" href="index.php?app=article&amp;act=add">Thêm mới</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
                <input type="hidden" name="app" value="article" />
                <input type="hidden" name="act" value="index" />
                Tiêu đề:
                <input class="queryInput" type="text" name="title" value="<?php echo htmlspecialchars($this->_var['query']['title']); ?>" />
                Chọn danh mục tin tức:
                <select class="querySelect" id="cate_id" name="cate_id">
                <option value="">Hãy chọn...</option>
                <?php echo $this->html_options(array('options'=>$this->_var['parents'],'selected'=>$_GET['cate_id'])); ?>
                </select>
                <input type="submit" class="formbtn" value="Tìm" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=article">Hủy bỏ</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="fontr">
        <?php echo $this->fetch('page.top.html'); ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['articles']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
            <td align="left">Tiêu đề</td>
            <td>Danh mục tin tức</td>
            <td align="left">Hiển thị</td>
            <td>Ngày đăng</td>
            <td>Thứ tự hiển thị</td>
            <td>Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
        <tr class="tatr2">
            <td class="firstCell"><?php if (! $this->_var['article']['code']): ?><input type="checkbox" class="checkitem" value="<?php echo $this->_var['article']['article_id']; ?>"/><?php endif; ?></td>
            <td><?php echo htmlspecialchars($this->_var['article']['title']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['article']['cate_name']); ?></td>
            <td><?php echo $this->_var['article']['if_show']; ?></td>
            <td><?php echo local_date("Y-m-d H:i:s",$this->_var['article']['add_time']); ?></td>
            <td><?php if (! $this->_var['article']['code']): ?><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['article']['article_id']; ?>" datatype="pint" maxvalue="255" class="editable"><?php echo $this->_var['article']['sort_order']; ?></span><?php endif; ?></td>
            <td><a href="index.php?app=article&amp;act=edit&amp;id=<?php echo $this->_var['article']['article_id']; ?>">Sửa</a>
                <?php if (! $this->_var['article']['code']): ?>|
                <a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó?', 'index.php?app=article&amp;act=drop&amp;id=<?php echo $this->_var['article']['article_id']; ?>');">Xóa</a><?php endif; ?></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['articles']): ?>
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
        <div id="batchAction" class="left paddingT15">
            &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=article&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?');" />
            &nbsp;&nbsp;
            <!--<input class="formbtn batchButton" type="button" value="lang.update_order" name="id" presubmit="updateOrder(this);" />-->
        </div>
    </div>
    <div class="clear"></div>
    <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>
