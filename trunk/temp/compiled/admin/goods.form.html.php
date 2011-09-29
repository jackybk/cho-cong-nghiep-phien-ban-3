<?php echo $this->fetch('header.html'); ?>
<?php echo $this->_var['images_upload']; ?>
<?php echo $this->_var['editor_upload']; ?>
<?php echo $this->_var['build_editor']; ?>
<style>
.box_arr .table_btn {width: 222px;}
.box_arr .table_btn a {float: left;}
.box_arr .table_btn a.disable_spec { background: url(<?php echo $this->res_base . "/" . 'images/member/btn.gif'; ?>) repeat 0 -1018px; float: right; }
.dialog_body{border:0px;}
.add_spec .add_link {color:#919191;}
.add_spec .add_link:hover {color:red;}
add_spec h2 {padding-left: 10px;}
.width7{width: 250px;}
.f_l{float:left;}
.mls_id {width: 0; filter: alpha(opacity=0);opacity: 0;}
</style>
<script type="text/javascript">
//<!CDATA[
var SPEC = <?php echo $this->_var['goods']['spec_json']; ?>;


function add_uploadedfile(file_data)
{
    if(file_data.instance == 'goods_image'){
        $('#goods_images').append('<li ectype="handle_pic" file_id="'+ file_data.file_id +'" thumbnail="<?php echo $this->_var['site_url']; ?>/'+ file_data.thumbnail +'"><input type="hidden" value="'+ file_data.file_id +'" name="goods_file_id[]"/><div class="pic"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.thumbnail +'" width="55" height="55" alt="" /><div ectype="handler" class="bg"><p class="operation"><span class="cut_in" ectype="set_cover" ecm_title="thiết lập"></span><span class="delete" ectype="drop_image" ecm_title="xóa"></span></p></div></div></li>');
                trigger_uploader();
        if($('#big_goods_image').attr('src') == '<?php echo $this->_var['goods']['default_goods_image']; ?>'){
            set_cover(file_data.file_id);
        }
        if(GOODS_SWFU.getStats().files_queued == 0){
            window.setTimeout(function(){
                $('#uploader').hide();
                $('#open_uploader').find('.show').attr('class','hide');
            },4000);
        }
    }else if(file_data.instance == 'desc_image'){
        $('#desc_images').append('<li file_name="'+ file_data.file_name +'" file_path="'+ file_data.file_path +'" ectype="handle_pic" file_id="'+ file_data.file_id +'"><input type="hidden" name="desc_file_id[]" value="'+ file_data.file_id +'"><div class="pic" style="z-index: 2;"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /></div><div ectype="handler" class="bg" style="z-index: 3;display:none"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /><p class="operation"><a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="Chèn hình ảnh vào bài viết"></a><span class="delete" ectype="drop_image" ecm_title="xóa"></span></p><p class="name">'+ file_data.file_name +'</p></div></li>');
                trigger_uploader();
        if(EDITOR_SWFU.getStats().files_queued == 0){
            window.setTimeout(function(){
                $('#editor_uploader').hide();
            },5000);
        }
    }
}


function set_cover(file_id){
    if(typeof(file_id) == 'undefined'){
        $('#big_goods_image').attr('src','<?php echo $this->_var['goods']['default_goods_image']; ?>');
        return;
    }
    var obj = $('*[file_id="'+ file_id +'"]');
    $('*[file_id="'+ file_id +'"]').clone(true).prependTo('#goods_images');
    $('*[ectype="handler"]').hide();
    $('#big_goods_image').attr('src',obj.attr('thumbnail'));
    obj.remove();
}

$(function(){
     $('#goods_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup : false,
        rules : {
            goods_name : {
                required   : true
            },
            price      : {
                number     : true,
                required : true,
                min : 0
            },
            stock      : {
                digits    : true
            },
            cate_id    : {
                remote   : {
                    url  : 'index.php?app=my_goods&act=check_mgcate',
                    type : 'get',
                    data : {
                        cate_id : function(){
                            return $('#cate_id').val();
                        }
                    }
                }
            }
        },
        messages : {
            goods_name  : {
                required   : 'goods_name_empty'
            },
            price       : {
                number     : 'number_only',
                required : 'price_empty',
                min : 'price_ge_0'
            },
            stock       : {
                digits  : 'number_only'
            },
            cate_id     : {
                remote  : 'select_leaf_category'
            }
        }
    });
    // init cover
    set_cover($("#goods_images li:first-child").attr('file_id'));

    // init spec
    spec_update();
});
//]]>
</script>
<div id="rightTop">
  <h2>Sửa sản phẩm</h2>
  <ul class="subnav">
  </ul>
</div>
<div class="info">
  <form method="post">
    <table class="infoTable">
      
      <script type="text/javascript" src="index.php?act=jslang"></script>
      
      <tr>
        <th class="paddingT15">Danh mục sản phẩm:</th>
        <td class="paddingT15 wordSpacing5">
            
                                <p class="select" id="gcategory">
                                    <?php if ($this->_var['goods']['cate_id']): ?>
                                    <span class="f_l"><?php echo htmlspecialchars($this->_var['goods']['cate_name']); ?></span>
                                    <a class="edit_gcategory btn" href="javascript:;">Sửa</a>
                                    <select style="display:none">
                                        <option>Hãy chọn...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['mgcategories'])); ?>
                                    </select>
                                    <?php else: ?>
                                    <select>
                                        <option>Hãy chọn...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['mgcategories'])); ?>
                                    </select>
                                    <?php endif; ?>
                                    <input type="hidden" id="cate_id" name="cate_id" value="<?php echo $this->_var['goods']['cate_id']; ?>" class="mls_id" />
                                    <input type="hidden" name="cate_name" value="<?php echo htmlspecialchars($this->_var['goods']['cate_name']); ?>" class="mls_names" />
                                </p>
        </td>
      </tr>
      
      <tr>
        <th class="paddingT15">Danh mục cửa hàng:</th>
        <td class="paddingT15 wordSpacing5">
            <p class="select">
                <?php if ($this->_var['goods']['_scates']): ?>
                <?php $_from = $this->_var['goods']['_scates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgcate');if (count($_from)):
    foreach ($_from AS $this->_var['sgcate']):
?>
                <select name="sgcate_id[]" class="sgcategory">
                    <option value="0">Hãy chọn...</option>
                    <?php echo $this->html_options(array('options'=>$this->_var['sgcategories'],'selected'=>$this->_var['sgcate']['cate_id'])); ?>
                </select>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php else: ?>
                <select name="sgcate_id[]" class="sgcategory">
                    <option value="0">Hãy chọn...</option>
                    <?php echo $this->html_options(array('options'=>$this->_var['sgcategories'])); ?>
                </select>
                <?php endif; ?>
				 <a href="javascript:;" id="add_sgcategory" class="btn">Sửa danh mục cửa hàng</a>
                
            </p>
            
               
           
        </td>
      </tr>
      
      <tr>
          <th class="paddingT15">
          	
          	<div class="pic_list">
                                <!--<div class="big_pic"><img id="big_goods_image" src="<?php echo $this->_var['goods']['default_goods_image']; ?>" width="55" height="55" alt="" /></div>-->
                                <div class="small_pic">
                                    <ul id="goods_images">
                                        <?php $_from = $this->_var['goods_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_iamge');if (count($_from)):
    foreach ($_from AS $this->_var['goods_iamge']):
?>
                                        <li ectype="handle_pic" file_id="<?php echo $this->_var['goods_iamge']['file_id']; ?>" thumbnail="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['goods_iamge']['thumbnail']; ?>">
                                        <input type="hidden" name="goods_file_id[]" value="<?php echo $this->_var['goods_iamge']['file_id']; ?>">
                                        <div class="pic">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['goods_iamge']['thumbnail']; ?>" width="55" height="55" />
                                            <div ectype="handler" class="bg">
                                                    <p class="operation">
                                                        <span class="cut_in" ectype="set_cover" ecm_title="Thiết lập"></span>
                                                        <span class="delete" ectype="drop_image" ecm_title="Xóa"></span>
                                                    </p>
                                            </div>
                                        </div>
                                        </li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="upload_btn">
                                    <div class="upload" id="open_uploader"><b class="hide">Tải lên hình ảnh sản phẩm</b></div>
                                    <div class="upload_con" id="uploader" style="display:none">
                                        <div class="upload_con_top"></div>
                                        <div class="upload_wrap">

                                            <ul>
                                                <li class="btn1">
                                                <div id="divSwfuploadContainer">
                                                    <div id="divButtonContainer">
                                                        <span id="spanButtonPlaceholder"></span>
                                                    </div>
                                                </div>
                                                </li>
                                                <li>
                                                	<iframe src="index.php?app=comupload&act=view_iframe&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=goods_image" width="86" height="30" scrolling="no" frameborder="0">
                                                    </iframe>
                                                </li>
                                                <li id="open_remote" class="btn2">rem_upload</li>
                                            </ul>
                                            <div id="remote" class="upload_file" style="display:none">
                                            	<iframe src="index.php?app=comupload&act=view_remote&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=goods_image" width="272" height="39" scrolling="no" frameborder="0">
                                                </iframe>
                                            </div>
                                            <div id="goods_upload_progress"></div>
                                            <div class="upload_txt">
                                                <span>note_for_upload</span>
                                            </div>

                                        </div>
                                        <div class="upload_con_bottom"></div>
                                    </div>
                                </div>
                            </div>
                            
          </th>
          <td class="paddingT15 wordSpacing5">
          	<div class="products">
                                <ul>
                                    <li>
                                        Tên sản phẩm: 
                                        <div class="arrange"><input type="text"  value="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" name="goods_name" title=""><span class="red">*</span></div>
                                    </li>
                                    <li>
                                        Hãng sản xuất: 
                                        <div class="arrange"><input type="text"  value="<?php echo htmlspecialchars($this->_var['goods']['brand']); ?>" name="brand"></div>
                                    </li>
                                    <li>
                                        Tags: 
                                        <div class="arrange"><input type="text"  value="<?php echo htmlspecialchars($this->_var['goods']['tags']); ?>" name="tags">
                                            <span class="gray">Nhiều từ có thể cách nhau dấu ","</span></div>
                                    </li>
                                    <li>
                                        Giá: 
                                        <div ectype="no_spec" class="arrange"><input type="hidden" value="<?php echo $this->_var['goods']['_specs']['0']['price']; ?>" name="spec_id"><input type="text" class="text width_short" value="" name="price"></div>
                                    </li>
                                    <li ectype="no_spec">
                                        Số lượng: 
                                        <div class="arrange"><input type="text" class="text width_short" value="<?php echo $this->_var['goods']['_specs']['0']['stock']; ?>" name="stock"></div>
                                    </li>
                                    <li ectype="no_spec">
                                        Mã sản phẩm: 
                                        <div class="arrange"><input type="text"  value="<?php echo $this->_var['goods']['_specs']['0']['sku']; ?>" name="sku"></div>
                                    </li>
                                    <li>
                                        Đặc điểm: 
                                        <div class="arrange">
                                            <div style="" ectype="no_spec" class="box_arr">
                                                <p class="pos_btn"><a class="add_btn" href="javascript:;" ectype="add_spec">Chọn đặc điểm</a></p>
                                                <p class="pos_txt">Bạn có thể thêm hai loại chi tiết kỹ thuật của hàng hóa (màu sắc, kích thước) nếu không có đặc điểm kỹ thuật của hàng hóa không phải là để thêm.</p>
                                            </div>
                                            <div style="display: none;" ectype="has_spec" class="box_arr">
                                            <table ectype="spec_result">
                                                <tbody><tr>
                                                    <th col="spec_name_1">Màu sắc<input type="hidden" value="Màu sắc" name="spec_name_1" disabled=""></th>
                                                    <th col="spec_name_2">Kích thước<input type="hidden" value="Kích thước" name="spec_name_2" disabled=""></th>
                                                    <th col="price">Giá</th>
                                                    <th col="stock">Số lượng</th>
                                                    <th col="sku">Mã sản phẩm</th>
                                                </tr>
                                                <tr style="display:none" ectype="spec_item">
                                                    <td item="spec_1"></td>
                                                    <td item="spec_2"></td>
                                                    <td item="price"></td>
                                                    <td item="stock"></td>
                                                    <td item="sku"></td>
                                                </tr>
                                            </tbody></table>
                                            <p class="table_btn">
                                                <a class="add_btn edit_spec" href="javascript:;" ectype="edit_spec">Chỉnh sửa</a>
                                                <a class="add_btn disable_spec" href="javascript:;" ectype="disable_spec">Đóng</a>
                                            </p>
                                        </div>
                                        </div>
                                    </li>
                                    <li>
                                        Hiển thị: 
                                        <div class="arrange">
                                            <span class="distance">
                                                <label><input name="if_show" value="1" type="radio" <?php if ($this->_var['goods']['if_show']): ?> checked="checked" <?php endif; ?>/> Có</label>
                                                <label><input name="if_show" value="0" type="radio" <?php if (! $this->_var['goods']['if_show']): ?> checked="checked" <?php endif; ?>/> Không</label>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        Giới thiệu: 
                                        <div class="arrange">
                                            <span class="distance">
                                               <label><input name="recommended" value="1" type="radio" <?php if ($this->_var['goods']['recommended']): ?> checked="checked" <?php endif; ?>/> Có</label>
                                                <label><input name="recommended" value="0" type="radio" <?php if (! $this->_var['goods']['recommended']): ?> checked="checked" <?php endif; ?>/> Không</label>
                                            </span>
                                            <span class="gray">Sản phẩm được giới thiệu sẽ xuất hiện trong trang chủ cửa hàng</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
          </td>
      </tr>
      <tr>
      	<th class="paddingT15">Mô tả sản phẩm</th>
        <td class="paddingT15 wordSpacing5">
			<div class="add_wrap">
                                <div class="editor">
                                    <div>
                                    <textarea name="description" id="description"  style="width:100%; height:400px;">
                                    <?php echo htmlspecialchars($this->_var['goods']['description']); ?>
                                    </textarea>
                                    </div>
                                    <div style=" position: relative; top: 10px; z-index: 5;"><a class="btn3" id="open_editor_uploader">uploadedfile</a>
                                        <div class="upload_con" id="editor_uploader" style="display:none">
                                            <div class="upload_con_top"></div>
                                            <div class="upload_wrap">

                                                <ul>
                                                    <li>
                                                        <div id="divSwfuploadContainer">
                                                            <div id="divButtonContainer">
                                                                <span id="editor_upload_button"></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li><iframe src="index.php?app=comupload&act=view_iframe&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=desc_image" width="86" height="30" scrolling="no" frameborder="0"></iframe></li>
                                                    <li id="open_editor_remote" class="btn2">rem_upload</li>
                                                </ul>
                                                <div id="editor_remote" class="upload_file" style="display:none">
                                                <iframe src="index.php?app=comupload&act=view_remote&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=desc_image" width="272" height="39" scrolling="no" frameborder="0"></iframe>
                                                </div>
                                                <div id="editor_upload_progress"></div>
                                                <div class="upload_txt">
                                                    <span>note_for_upload</span>
                                                </div>

                                            </div>
                                            <div class="upload_con_bottom"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>                                
            </div>
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20"><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
          <input class="formbtn" type="submit" name="Submit" value="Gửi" />
          <input class="formbtn" type="button" value="Quay lại" onclick="history.go(-1)" />
        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>