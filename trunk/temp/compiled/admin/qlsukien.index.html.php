<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $("#addevent").click(function(){
    $("#hienthi").slideToggle();
  });
});
</script>
<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'dd/mm/yy'});
    $('#add_time_to').datepicker({dateFormat: 'dd/mm/yy'});
});
</script>
<script type="text/javascript">
//<!CDATA[
$(function(){
$('#partner_form').validate({
            errorPlacement: function(error, element){
                $(element).next('.field_notice').hide();
                if($(element).parent().parent().is('b'))
                {
                    $(element).parent().parent('b').next('.explain').hide();
                    $(element).parent().parent('b').after(error);
                }
                else
                {
                    $(element).after(error);
                }
            },
        
        rules : {
            title : {
                required   : true
            }
        },
        messages : {
            title : {
                required : 'Tên sự kiện không được để trống'
            }
        }
    });
 

</script>
<div class="wrap">
            <div class="public table">
              <table style="font-size:12px">
             
                   <tr>
                       <td width="100%" cellspacing="3" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;padding-left:10px" valign="top">
                         <a href="index.php?app=qlsukien" class="sk">Quản lý sự kiện</a>
                         <div id="warning"></div>
                   </tr>
                   <tr>
                       <td valign="top" >
                          <div align="left" style="width:96%"><strong>THÊM SỰ KIỆN:</strong></div>
                       </td>
                   </tr>
                   <tr>
                   <?php if ($this->_var['edit_sukien']): ?>
                   <form method="POST" action="index.php?app=qlsukien&amp;act=edit&amp;id=<?php echo $this->_var['edit_sukien']['id']; ?>" enctype="multipart/form-data" id="partner_form">
                      <td width="100%" cellspacing="3" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;padding-left:10px;" >
                      
                          <table cellpadding="0px" cellspacing="0px">
                               <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Sự kiện</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                             <input type="text" class="input-text" value="<?php echo htmlspecialchars($this->_var['edit_sukien']['title']); ?>" name="title" style="width:400px">
                                       </label>
                                   </td>
                               </tr>
                                <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Từ ngày</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                         <input class="queryInput2" type="text"  value="<?php echo local_date("d/m/Y",$this->_var['edit_sukien']['formdate']); ?>" id="add_time_from" name="fromdate" class="pick_date" style="width:150px;"/>
                                       </label>
                                   </td>
                               </tr>
                                <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Đến ngày</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                         <input class="queryInput2" type="text" id="add_time_to" value="<?php echo local_date("d/m/Y",$this->_var['edit_sukien']['todate']); ?>" name="todate" class="pick_date" style="width:150px;"/>
                                       </label>
                                   </td>
                               </tr>
                                <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Số thứ tự</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                          <select class="input-text" name="stt" >
                                        
                                           <option selected="selected"><?php echo htmlspecialchars($this->_var['edit_sukien']['stt']); ?></option>
                                            <option value="1">1</option>
                                             <option value="2">2</option>
                                              <option value="3">3</option>
                                               <option value="4">4</option>
                                                <option value="5">5</option>
                                                 <option value="6">6</option>
                                                  <option value="7">7</option>
                                                   <option value="8">8</option>
                                                    <option value="9">9</option>
                                                     <option value="10">10</option>
                                         
                                          </select>
                                       </label>
                                   </td>
                               </tr>
                               <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">&nbsp;</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                             <input type="submit" value="Sửa sự kiện" id="InsertEvent" name="EditEvent">
                                       </label>
                                   </td>
                               </tr>
                          </table>
                      </td>   
                      </form>
                       <?php else: ?>
                        <form method="POST" action="index.php?app=qlsukien&amp;act=addsukien" enctype="multipart/form-data" id="partner_form">
                        <td width="100%" cellspacing="3" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;padding-left:10px;" >
                      
                          <table cellpadding="0px" cellspacing="0px" id="hienthi" style="display:none">
                               <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Sự kiện</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                             <input type="text" class="input-text" name="title" style="width:400px">
                                       </label>
                                   </td>
                               </tr>
                                <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Từ ngày</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                         <input class="queryInput2" type="text" id="add_time_from" name="fromdate" class="pick_date" style="width:150px;"/>
                                       </label>
                                   </td>
                               </tr>
                                <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Đến ngày</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                         <input class="queryInput2" type="text" id="add_time_to"  name="todate" class="pick_date" style="width:150px;"/>
                                       </label>
                                   </td>
                               </tr>
                                <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">Số thứ tự</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                          <select class="input-text" name="stt" >
                                            <option value="1">1</option>
                                             <option value="2">2</option>
                                              <option value="3">3</option>
                                               <option value="4">4</option>
                                                <option value="5">5</option>
                                                 <option value="6">6</option>
                                                  <option value="7">7</option>
                                                   <option value="8">8</option>
                                                    <option value="9">9</option>
                                                     <option value="10">10</option>
                                         
                                          </select>
                                       </label>
                                   </td>
                               </tr>
                               <tr>
                                   <td class="height_row" width="10%">
                                       <div align="right">&nbsp;</div>
                                   </td>
                                   <td class="height_row" width="30%">
                                       <label>
                                             <input type="submit" value="Thêm sự kiện" id="InsertEvent" name="InsertEvent">
                                       </label>
                                   </td>
                               </tr>
                          </table>
                      </td> 
                             </form>
                       <?php endif; ?>
                   </tr>
             
                   <tr>
                       <td valign="top" >
                          <div align="left" style="width:96%"><strong></strong></div>
                       </td>
                   </tr>
                   
                   
                      <?php if ($this->_var['edit_sukien']): ?>
                    <tr>
                       <td width="100%" cellspacing="3" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;padding-left:10px" valign="top">
                         <label>
                              <span style="font-size:12px">Sửa sự kiện</span>
                         </label>
                   </tr>
                    <?php else: ?>
                     <tr>
                       <td width="100%" cellspacing="3" cellpadding="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;padding-left:10px" valign="top">
                         <label>
                              <input type="button" value="Thêm sự kiện mới" id="addevent" name="addevent">
                         </label>
                   </tr>
                     <?php endif; ?>
                   
                   <div style="float:left; padding-top:20px	">
                      <table width="800px" cellspacing="0" cellpadding="3" bordercolor="#DDDDDD" border="1" bgcolor="#FFFFFF" align="left" bordercolorlight="#CCCCCC">
                          <tbody>
                              <tr>
                                  <td align="center" colspan="6"><b>&nbsp; </b></td>
                              </tr>
                              
                   
                            <tr>
                                 <td width="" height="27" align="center">
                                   <input type="checkbox" id="all" class="checkall"/>
                                </td>
                                <td colspan="5">
                       <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=qlsukien&act=drop" name="id" presubmit="confirm('Bạn có chắc muốn xóa nó không')">Xóa tin sự kiện</a>
                               </td>
                           </tr>
                            <tr height="22px" style="background-color:#EEEEEE">
                                <td width="" height="27" align="center">
                                   &nbsp;
                                </td>
                                <td width="">Sự kiện</td>
                                <td width="">Từ ngày</td>
                                <td width="">Đến ngày</td>
                                <td width="">
                                    <div align="center">STT</div>
                                </td>
                                <td width="">Sửa</td>
                            </tr>
                             <?php if ($this->_var['news']): ?>
                            <?php $_from = $this->_var['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'dtin');if (count($_from)):
    foreach ($_from AS $this->_var['dtin']):
?>
                            <tr height="22px">
                           
                                <td width="33" height="15" bgcolor="#EEEEEE" align="center">
                                     <input type="checkbox" class="checkitem" value="<?php echo $this->_var['dtin']['id']; ?>"/>
                                </td>
                                <td width="380px"><?php echo $this->_var['dtin']['title']; ?></td>
                                <td width="380px"><?php echo local_date("d/m/y",$this->_var['dtin']['formdate']); ?></td>
                                <td width="380px"><?php echo local_date("d/m/y",$this->_var['dtin']['todate']); ?></td>
                                <td width="53px"><div align="center"><?php echo $this->_var['dtin']['stt']; ?></div></td>
                                <td width="53px" align="center">
                                    <a href="index.php?app=qlsukien&amp;act=edit&amp;id=<?php echo $this->_var['dtin']['id']; ?>" class="edit_new">Sửa</a>
                                </td>
                              
                            </tr>
                              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                              <?php else: ?>
                              <tr>
                                 <td colspan="6" align="center">
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
                       <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=qlsukien&act=drop" name="id" presubmit="confirm('Bạn có chắc muốn xóa nó không')">Xóa tin sự kiện</a>
                               </td>
                           </tr>
                          </tbody>
                      </table>
                   </div>
                  
              </table>
            </div>
          <?php if ($this->_var['news']): ?>
		    <div id="dataFuncs">
		         <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
		      
		        <div class="pageLinks">
		            <?php if ($this->_var['news']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
		        </div>
		    </div>
        <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
