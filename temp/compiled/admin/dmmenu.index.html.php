<?php echo $this->fetch('header.html'); ?>

<div class="wrap">
          
              <table style="font-size:12px">
                <tr>
                   <td width="802" valign="top" style="padding-left:10px">		
				<table width="100%" cellspacing="3" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;">	
	                	<tbody><tr>
	                      <td><a href="index.php?app=dmmenu">Danh mục nhu cầu</a></td>		
                            <td>|</td>
	                      <td><a href="index.php?app=dmchungloai">Quản lý Danh mục nhu cầu</a></td>		
	                    </tr>
                        </tbody></table>	
	                 </td>
                </tr>
                <tr>
                     <td style="padding-left:10px;" valign="top">
                        <strong style=" height:40px">Thêm Danh Mục Menu</strong>
                     </td>
                </tr>
                 <tr>
                   <td width="830px" valign="top" style="padding-left:10px">
                   <?php if ($this->_var['edit_dm']): ?>
                  <form action="index.php?app=dmmenu&amp;act=edit&amp;id=<?php echo $this->_var['edit_dm']['id']; ?>" method="POST" enctype="multipart/form-data">
                     <table width="100%" cellspacing="0" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;">
                           <tr>
                              <td class="height_row" width="17%">
                                  <div align="right">Tên nhóm</div>
                              </td>
                              <td class="height_row" width="30%">
                                <div align="left">
                                    <input type="text" style="width:200px;" maxlength="100" name="name" value="<?php echo htmlspecialchars($this->_var['edit_dm']['category']); ?>"/>
                                </div>
                              </td>
                              <td class="height_row" width="15%">
                                  <div align="left">Thuộc nhóm</div>
                              </td>
                              <td class="height_row" width="38%">
                                  <select  name="group" class="Contact_text" id="categories">
					               <option value="0">Hãy chọn...</option>				     
					                <?php echo $this->html_options(array('options'=>$this->_var['scategories'],'selected'=>$this->_var['edit_dm']['parent'])); ?>
					              </select>
                              </td>
                           </tr>
                           <tr>
                               <td class="height_row" width="17%">
                                    <div align="right">Số thứ tự</div>
                               </td> 
                               <td class="height_row" colspan="3">
                                   <select class="input_text" name="order" style="width:100px">
                                       <?php if ($this->_var['edit_dm']['stt']): ?>
                                            <option selected="selected"><?php echo $this->_var['edit_dm']['stt']; ?></option>
                                             <?php
	                                            for ($i=1;$i<50;$i++)
	                                            {
	                                            	echo '<option value="'.$i.'">'.$i.'</option>';
	                                            }
                                            ?>
                                       <?php else: ?>
                                       <?php
                                            for ($i=1;$i<50;$i++)
                                            {
                                            	echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                       ?>
                                       <?php endif; ?>
                                   </select>
                               </td>
                           </tr>
                           <tr>
                              <td class="height_row" width="17%">
                                    <div align="right">&nbsp;</div>
                               </td> 
                               <td class="height_row" colspan="3">
                                   <label>
                                        <input type="submit" value="Sửa danh mục" name="EditCategory">
                                   </label>
                               </td>
                           </tr>
                     </table>
               </form>
                <?php else: ?>
                  <form action="index.php?app=dmmenu&amp;act=add" method="POST" enctype="multipart/form-data">
                     <table width="100%" cellspacing="0" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;">
                           <tr>
                              <td class="height_row" width="17%">
                                  <div align="right">Tên nhóm</div>
                              </td>
                              <td class="height_row" width="30%">
                                <div align="left">
                                    <input type="text" style="width:200px;" maxlength="100" name="name" />
                                </div>
                              </td>
                              <td class="height_row" width="38%">
                                 <div align="left">
                                    <select  name="group" class="Contact_text" id="categories">
						               <option value="0">Hãy chọn...</option>				     
						                <?php echo $this->html_options(array('options'=>$this->_var['scategories'])); ?>
					              </select>
                                </div>
                              </td>
                           </tr>
                            
                           
                            <tr>
                              <td class="height_row" width="17%">
                                  <div align="right">Số thứ tự</div>
                              </td>
                              <td class="height_row" width="30%">
                                <div align="left">
                                  <select class="input_text" name="order" style="width:100px">
                                       <option value="0" >Hãy chọn.....</option>
                                        <?php
                                            for ($i=1;$i<=50;$i++)
                                            {
                                            	echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                       ?>
                                   </select>
                                </div>
                              </td>
                              <td class="height_row" width="38%">
                                 &nbsp;
                              </td>
                           </tr>
                           
                           <tr>
                              <td class="height_row" width="17%">
                                    <div align="right">&nbsp;</div>
                               </td> 
                               <td class="height_row" colspan="3">
                                   <label>
                                        <input type="submit" value="Thêm category" name="EditCategory">
              
                                   </label>
                               </td>
                           </tr>
                     </table>
               </form>
                <?php endif; ?>
               </td>
             </tr>
             
              
                   <div style="float:left; padding-top:50px	">
                      <table width="810px" valign="top" style="padding-left:10px" bordercolor="#DDDDDD" border="1" bgcolor="#FFFFFF" align="left" bordercolorlight="#CCCCCC" id="my_category" server="<?php echo $this->_var['site_url']; ?>/index.php?app=dmchungloai&act=ajax_col">
                          <tbody>
                              <tr>
                                  <td align="center" colspan="6" height="40px"><b>&nbsp; </b></td>
                              </tr>                 
                            <tr>
                                 <td width="" height="27" align="center">
                                   <input type="checkbox" id="all" class="checkall"/>
                                </td>
                                 <td colspan="5">
                                      &nbsp;<a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=dmmenu&act=drop" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?')">Xóa nhóm này</a>
                                      &nbsp;
                                       <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=dmmenu&act=annhom" name="id" presubmit="confirm('Bạn có muốn ẩn nhóm này không')">Ẩn nhóm này</a>
                                       &nbsp;
                                     <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=dmmenu&act=showgroup" name="id" presubmit="confirm('Bạn có muốn hiển thị nhóm này không')">Hiện nhóm này</a>
                                </td>
                           </tr>
                            <tr height="22px" style="background-color:#EEEEEE">
                                <td width="" height="27" align="center">
                                   ID
                                </td>
                                <td width="40%" align="center">Tên nhóm</td>
                                <td width="" align="center">Thuộc danh mục</td>
                                <td width="10%" align="center">Hiển thị</td>
                                <td width="10%">
                                    <div align="center">Trạng thái</div>
                                </td>
                                <td width="10%" align="center">Sửa</td>
                            </tr>
                             <?php if ($this->_var['chungloai']): ?>
                            <?php $_from = $this->_var['chungloai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');if (count($_from)):
    foreach ($_from AS $this->_var['type']):
?>
                            <tr height="22px">
                           
                                <td width="33" height="15" bgcolor="#EEEEEE" align="center">
                                     <input type="checkbox" class="checkitem" value="<?php echo $this->_var['type']['id']; ?>"/>
                                </td>
                                <td width="380px"><?php echo $this->_var['type']['category']; ?></td>
                                <td width="380px" ><?php echo $this->_var['type']['parent']; ?></td>
                                <td width="380px"><?php echo $this->_var['type']['stt']; ?></td>
                                
                                <td width="53px"><div align="center">
                                <p class="padding2"><span <?php if ($this->_var['type']['status']): ?>class="right_ico" status="on"<?php else: ?>class="wrong_ico" status="off"<?php endif; ?>ectype="editobj"></span></p>
                                </div></td>
                                <td width="53px" align="center">
                                    <a href="index.php?app=dmmenu&amp;act=edit&amp;id=<?php echo $this->_var['type']['id']; ?>" class="edit_new">Sửa</a>
                                </td>
                              
                            </tr>
                              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                              <?php else: ?>
                              <tr>
                                 <td colspan="6" align="center" height="40px">
                                    Chưa có dữ liệu hiển thị
                                 </td>
                              </tr>
                              <?php endif; ?>
                            
                             <tr>
                                 <td width="" height="27" align="center">
                                   <input type="checkbox" id="all" class="checkall"/>
                                </td>
                                </td>
                                <td colspan="5">
                                      &nbsp;<a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=dmmenu&act=drop" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?')">Xóa nhóm này</a>
                                      &nbsp;
                                       <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=dmmenu&act=annhom" name="id" presubmit="confirm('Bạn có muốn ẩn nhóm này không')">Ẩn nhóm này</a>
                                       &nbsp;
                                     <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=dmmenu&act=showgroup" name="id" presubmit="confirm('Bạn có muốn hiển thị nhóm này không')">Hiện nhóm này</a>
                                </td>
                           </tr>
                          </tbody>
                      </table>
                   </div>
             
              </table>
            
  <?php if ($this->_var['chungloai']): ?>
            <div id="dataFuncs">
		         <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
		      
		        <div class="pageLinks">
		            <?php if ($this->_var['dm_chungloai']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
		        </div>
		    </div>
        <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
