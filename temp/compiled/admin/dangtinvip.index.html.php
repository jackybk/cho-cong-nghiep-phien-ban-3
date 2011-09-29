<?php echo $this->fetch('header.html'); ?>
<div class="wrap">
            <div class="public table">
              <table style="font-size:12px">
               <tr>
                      <td class="searchSetAutoUP">
                          <div class="titleSearchAuto">Tìm kiếm tin rao vặt bạn muốn sử dụng tính năng Đăng tin vip</div>
                      </td>
                   </tr>
                   
                   <tr>
                       <td class="searchSetAutoUP">
		                   <form action="index.php?app=plquanly&amp;act=key_vip" method="POST" enctype="multipart/form-data">               
								<label for="idNews"><span class="lblIdNews">Mã tin rao vặt (ID): </span></label>
								<input type="text" size="10" id="idNews" name="idNews">
								<input type="submit" name="searchup" value="Tìm kiếm"/>																
		                   </form>
	                   </td>
                   </tr>
                    <?php if ($this->_var['timkiem']): ?>
                   <tr>
                       <td valign="top">
                        <?php $_from = $this->_var['timkiem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'key');if (count($_from)):
    foreach ($_from AS $this->_var['key']):
?>
                          <fieldset>
                                <legend>Tin rao vặt bạn muốn Đăng tin VIP</legend>
                                <form method="POST" action="index.php?app=plquanly&amp;act=dangtinvip&amp;id=<?php echo $this->_var['key']['id']; ?>" enctype="multipart/form-data">
                                <?php if ($this->_var['timkiem']): ?>
                                  <img border="0" align="absmiddle" title="tự động đăng tin" alt="tự động đăng tin" src="data/files/mall/icon_upauto.png">
                                  &nbsp;&nbsp;
                                     <span style="font-weight:bold;"><a style="color: #0060CB;outline: medium none;text-decoration: none;"href="index.php?app=qldangtin&amp;act=doctin&amp;id=<?php echo $this->_var['key']['id']; ?>"><?php echo htmlspecialchars($this->_var['key']['title']); ?></a></span>
                                  
                                <?php else: ?>
                                   <span style="font-weight:bold;color:red;">Không tìm thấy tin thông tin bạn muốn tìm</span>
                                <?php endif; ?>
									<div class="inforGuideUser">
                                        <div class="buyGuideVip">
                                          Tính năng cập nhật Đăng tin VIP
                                        </div>		
                                        <div class="labelGuideUP">
                                        Bạn muốn Đăng tin VIP trong
                                           <input type="text" value="1" id="timeUp" name="qty_item">
                                           <input type="hidden" value="<?php echo htmlspecialchars($this->_var['key']['timevip']); ?>" name="thoigianvip"/>
                                           <label for="timeUp">ngày</label>
                                        </div>	
                          </fieldset>
                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                       </td>
                   </tr>
                   <tr>
                    <td align="center">
                         <input id="executeAutoUp" type="submit" name="executeAutoUp" value="Thực hiện">
                    </td>
                   </tr>
              </form>
                 <?php else: ?>
                 <tr>
                     <td>
                         <span style="font-weight:bold;color:red;">Mã sản phẩm không tồn tại</span>
                     </td>
                 </tr>
               <?php endif; ?>
                </table>              
            </div>
       
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>