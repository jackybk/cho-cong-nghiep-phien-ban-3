<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right"> <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="public table">
               <table style="font-size:12px">
                <?php $_from = $this->_var['noidung']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'news');if (count($_from)):
    foreach ($_from AS $this->_var['news']):
?>
                <h4 class="titleDetailNews"><?php echo $this->_var['news']['title']; ?></h4>
                <tr>
                    <td><?php echo $this->_var['news']['content']; ?></td>
                </tr>
                </table>
            </div>
              <?php if ($this->_var['news']['user_id'] == $this->_var['user']): ?>
            <div class="processPostedView">
              <span><a title="sửa tin đăng" href="index.php?app=qldangtin&amp;act=edit&amp;id=<?php echo $this->_var['news']['id']; ?>">Sửa</a></span>
              &nbsp; <span><a title="xóa tin đăng" href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó ?', 'index.php?app=qldangtin&amp;act=drop&amp;id=<?php echo $this->_var['news']['id']; ?>&amp;picture=<?php echo $this->_var['news']['picture']; ?>');">Xóa</a></span>
              &nbsp;<span><a title="up tin đăng lên đầu" href="index.php?app=qldangtin&amp;act=uptin&amp;id=<?php echo $this->_var['news']['id']; ?>">Up lên đầu</a></span>
              &nbsp;<span><a title="Đăng tin VIP" href="index.php?app=qldangtin&amp;act=dangtinvip&amp;id=<?php echo $this->_var['news']['id']; ?>">Đăng tin Vip</a></span>
              &nbsp;<span><a title="Đăng tin siêu VIP" href="index.php?app=qldangtin&amp;act=tinsieuvip&amp;id=<?php echo $this->_var['news']['id']; ?>">Đăng tin siêu VIP</a></span>
             <?php else: ?>
              &nbsp;<span><a title="Tin quan tâm" href="index.php?app=search&amp;act=luutin&amp;id=<?php echo $this->_var['news']['id']; ?>&amp;luutin=<?php echo $this->_var['news']['luutin']; ?>&amp;user_id=<?php echo $this->_var['news']['user_id']; ?>">Tin quan tâm</a></span>
            </div>
             <?php endif; ?>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>