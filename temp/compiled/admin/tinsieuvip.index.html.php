<?php echo $this->fetch('header.html'); ?>
<div class="wrap">
            <div class="public table">
              <table style="font-size:12px">
          
                      
                     <?php if ($this->_var['tinvip']): ?>
                   <tr class="tatr1">
                    <td align="center"><span ectype="order_by" fieldname="tt">Xóa tin</span></td>
			            <td align="center"><span ectype="order_by" fieldname="anh">Hình Ảnh</span></td>
			            <td align="center"><span ectype="order_by" fieldname="anh">Tiêu đề tin rao vặt</span>   </td>
			            <td align="center"><span ectype="order_by" fieldname="luotxem">Thời gian đăng tin VIP</span></td>
			            <td align="center"><span ectype="order_by" fieldname="luotup">Thời gian còn lại</span></td>
			            <td align="center"><span ectype="order_by" fieldname="noidang">Đăng tin Siêu VIP</span></td>    
                      
                  </tr>
                  <?php endif; ?>
                   <?php $_from = $this->_var['tinvip']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vip');if (count($_from)):
    foreach ($_from AS $this->_var['vip']):
?>
                 <?php if ($this->_var['tinvip']): ?>
               
	                   <tr class="tatr2">
	                   <td><a href="index.php?app=qldangtin&act=xoatinsieuvip&amp;id=<?php echo $this->_var['vip']['id']; ?>" class="delete">Xóa</a></td>                       <?php if ($this->_var['vip']['picture']): ?>
	                       <td align="center"><img src="../<?php echo $this->_var['vip']['picture']; ?>" width="50px" height="50px"/></td>  
	                      <?php else: ?>
	                      <td align="center"><img src="../data/files/mall/noimage.gif" width="50px" height="50px"/></td> 
	                        <?php endif; ?>
	                      <td align="left"  style="color:#0060CB;font-size: 12px;font-weight:bold" width="30%"><a style="color: #0060CB;outline: medium none;text-decoration: none;"><?php echo $this->_var['vip']['title']; ?></a></td>
	                      
	                      <td align="center"  style="font-size: 12px"><?php echo local_date("d/m/Y H:i",$this->_var['vip']['timevip']); ?></td>
	                          
	                      <td align="center">
	                        <?php if ($this->_var['vip']['timevip'] <= $this->_var['timevip']): ?>
	                        <span style="font-size:12px; color:red">Tin đăng siêu VIP đã hết hạn</span>
	                        <?php else: ?>
	                        thoi gian dang tin
	                       <?php endif; ?>
                          </td>
	                      
	                      <td class="tinvip" align="center"><a href="index.php?app=plquanly&amp;act=tinsieuvip&amp;id=<?php echo $this->_var['vip']['id']; ?>" class="delete"><img border="0" align="absmiddle" src="../data/files/mall/icon_plus.gif">&nbsp;Đăng tin Siêu VIP</a> </td>

	                   </tr>
               
                 <?php endif; ?>
                 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                 
                        
               </table>
            </div>    
             <?php if ($this->_var['tinvip']): ?>
       
    <div id="dataFuncs">
         <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
      
        <div class="pageLinks">
            <?php if ($this->_var['tinvip']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>