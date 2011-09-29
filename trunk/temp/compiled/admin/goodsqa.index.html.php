<?php echo $this->fetch('header.html'); ?>
<style type="text/css">
.store_reply {padding:5px 0px; color:green;}
</style>
<div id="rightTop">
  <p>Quản lý tư vấn</p>
    <ul class="subnav">
    <li><span>Danh sách</span></li>
  </ul>
</div>


<div class="mrightTop">
  <div class="fontl">
    <form method="get">
      <div class="left">
          <input type="hidden" name="app" value="consulting" />
          Người hỏi:
          <input class="queryInput" type="text" name="asker" value="<?php echo htmlspecialchars($this->_var['query']['asker']); ?>" />
          Nội dung:
          <input class="queryInput" type="text" name="content" value="<?php echo htmlspecialchars($this->_var['query']['content']); ?>" />
          <input type="submit" class="formbtn" value="Tìm" />
      </div>
      <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=consulting">Hủy bỏ</a>
     <?php endif; ?>
    </form>
    </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">

  <form method=get>
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['list_data']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td width="80">Người hỏi</td>
      <td width="15%">Tên đối tượng</td>
      <td>Nội dung</td>
      <td width="100">Tên cửa hàng</td>
      <td width="120" style="text-align:center;">Thời gian gửi</td>
      <td style="width:80px;" class="handler">Hành động</td>
    </tr>

    <?php endif; ?>
    <?php $_from = $this->_var['list_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['data']):
?>
    <tr class="tatr2">
        <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['data']['ques_id']; ?>" /></td>
        <td><?php if ($this->_var['data']['user_name'] == ''): ?> Khách<?php else: ?><?php echo htmlspecialchars($this->_var['data']['user_name']); ?><?php endif; ?></td>
        <td>[<?php echo $this->_var['lang'][$this->_var['data']['type']]; ?>]&nbsp;<a target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=<?php echo $this->_var['data']['type']; ?>&amp;id=<?php echo $this->_var['data']['item_id']; ?>"><?php echo htmlspecialchars($this->_var['data']['item_name']); ?></a></td>
        <td><?php echo htmlspecialchars($this->_var['data']['question_content']); ?>
        <?php if ($this->_var['data']['reply_content']): ?><div class="store_reply">Trả lời&nbsp;:&nbsp;<?php echo htmlspecialchars($this->_var['data']['reply_content']); ?></div><?php endif; ?></td>
        <td><a target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=store&id=<?php echo $this->_var['data']['store_id']; ?>"><?php echo $this->_var['data']['store_name']; ?></a></td>
        <td><?php echo local_date("Y-m-d H:i:s",$this->_var['data']['time_post']); ?></td>
        <td style="width:80px;" class="handler"><a href="javascript:drop_confirm('Bạn có chắc chắn xóa nhưng lời tư vấn hàng hóa!','index.php?app=consulting&amp;act=delete&amp;id=<?php echo $this->_var['data']['ques_id']; ?>');" >Xóa</a></td>
    </tr>

    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="7">Không có dữ liệu</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>

    <div id="dataFuncs">
        <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
        <?php if ($this->_var['list_data']): ?><div id="dataFuncs">
            <div id="batchAction" class="left paddingT15"> &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=consulting&act=delete" presubmit="confirm('Bạn có chắc chắn xóa nhưng lời tư vấn hàng hóa!');" />
            </div>
        </div><?php endif; ?>
    </div>
    <div class="clear"></div>
  </div>
 </form>
</div>
<?php echo $this->fetch('footer.html'); ?>