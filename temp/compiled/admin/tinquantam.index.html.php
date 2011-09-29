<?php echo $this->fetch('header.html'); ?>
<div class="wrap">
            <div class="public table">
              <table style="font-size:12px">
               <?php if ($this->_var['quantam']): ?>
                   <tr class="tatr1">
			            <td align="center"><span ectype="order_by" fieldname="anh">Hình Ảnh</span></td>
			            <td align="center"><span ectype="order_by" fieldname="anh">Tiêu đề tin rao vặt</span>   </td>
			            <td align="center"><span ectype="order_by" fieldname="luotxem">Nơi đăng</span></td>
			            <td align="center"><span ectype="order_by" fieldname="luotup">Ngày đăng</span></td>
			            <td align="center"><span ectype="order_by" fieldname="noidang">Xóa tin</span></td>    
                      
                  </tr>
                  <?php else: ?>
                  <tr>
                      <td>Không có sản phẩm quan tin nào</td>
                  </tr>
                  <?php endif; ?>
                <?php if ($this->_var['quantam']): ?>
                 <?php $_from = $this->_var['quantam']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'like');if (count($_from)):
    foreach ($_from AS $this->_var['like']):
?>
	                   <tr class="tatr2">
	                       <td align="center"><img src="<?php echo $this->_var['like']['picture']; ?>" width="50px" height="50px"/></td>  
	                  
	                      <td align="center"  valign="top" width="40%"><a style="color: #0060CB;outline: medium none;text-decoration: none;"><?php echo $this->_var['like']['title']; ?></a></td>
	                      
	                      <td align="center"><?php echo $this->_var['like']['address']; ?></td>
	                          
	                      <td align="center"><?php echo local_date("d/m/Y H:i",$this->_var['like']['thoigianup']); ?></td>
	                      
	                      <td class="tinvip" align="center">
	                     <a href="index.php?app=qldangtin&act=xoatinqt&amp;id=<?php echo $this->_var['like']['id']; ?>" name="id">Xóa</a>
	                      </td>

	                   </tr>
	               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	             <?php endif; ?>
                </table>
              </form>
            </div> 
             <?php if ($this->_var['quantam']): ?>
       
    <div id="dataFuncs">
         <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
      
        <div class="pageLinks">
            <?php if ($this->_var['dangtin']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>