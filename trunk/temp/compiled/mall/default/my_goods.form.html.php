<?php echo $this->fetch('member.header.html'); ?>
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
        $('#goods_images').append('<li ectype="handle_pic" file_id="'+ file_data.file_id +'" thumbnail="<?php echo $this->_var['site_url']; ?>/'+ file_data.thumbnail +'"><input type="hidden" value="'+ file_data.file_id +'" name="goods_file_id[]"/><div class="pic"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.thumbnail +'" width="55" height="55" alt="" /><div ectype="handler" class="bg"><p class="operation"><span class="cut_in" ectype="set_cover" ecm_title="Thiết lập trang bìa"></span><span class="delete" ectype="drop_image" ecm_title="Xoá"></span></p></div></div></li>');
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
        $('#desc_images').append('<li file_name="'+ file_data.file_name +'" file_path="'+ file_data.file_path +'" ectype="handle_pic" file_id="'+ file_data.file_id +'"><input type="hidden" name="desc_file_id[]" value="'+ file_data.file_id +'"><div class="pic" style="z-index: 2;"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /></div><div ectype="handler" class="bg" style="z-index: 3;display:none"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /><p class="operation"><a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="Chèn hình"></a><span class="delete" ectype="drop_image" ecm_title="Xoá"></span></p><p class="name">'+ file_data.file_name +'</p></div></li>');
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
                required   : 'Tên sản phầm không được để trống'
            },
            price       : {
                number     : 'Chỉ nhập chữ số',
                required : 'price_empty',
                min : 'price_ge_0'
            },
            stock       : {
                digits  : 'Chỉ nhập chữ số'
            },
            cate_id     : {
                remote  : 'Hãy chọn danh mục phù hợp nhất'
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
<div class="content">
  <div class="totline"></div>
  <div class="botline"></div>
  <?php echo $this->fetch('member.menu.html'); ?>
  <div id="right">
     <?php echo $this->fetch('member.submenu.html'); ?>

        <div class="wrap">

            <div class="public">
                <form method="post" id="goods_form">
                    <div class="information_index">

                        <div class="add_spec" ectype="dialog_contents" style="display: none">
                            <!--<form>-->
                            <h2>Sửa Chi tiết kỹ thuật</h2>
                            <p>Bạn có thể thêm lên đến hai kích cỡ (như: màu sắc và kích thước) chi tiết kỹ thuật có thể tùy chỉnh tên chỉ có một tiêu chuẩn khác, chẳng hạn như trống.</p>
                            <div class="table" ectype="spec_editor">
                                <ul class="th">
                                    <li><input col="spec_name_1" type="text" class="text width4" /></li>
                                    <li><input col="spec_name_2" type="text" class="text width4" /></li>
                                    <li class="distance1">Giá</li>
                                    <li class="distance1">Số lượng</li>
                                    <li class="distance2">Mã sản phẩm</li>
                                    <li class="distance3">Hành động</li>
                                </ul>
                                <ul class="td" ectype="spec_item">
                                    <li><input item="spec_1" type="text" class="text width4" /></li>
                                    <li><input item="spec_2" type="text" class="text width4" /></li>
                                    <li><input item="price" type="text" class="text width4" /></li>
                                    <li><input item="stock" type="text" class="text width4" /></li>
                                    <li><input item="sku" type="text" class="text width8" /><input item="spec_id" type="hidden" /></li>
                                    <li class="padding3">
                                        <span ectype="up_spec_item" class="up_btn"></span>
                                        <span ectype="down_spec_item" class="down_btn"></span>
                                        <span ectype="drop_spec_item" class="delete_btn"></span>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="add"><a href="javascript:;" ectype="add_spec_item" class="add_link">Thêm một đặc điểm kỹ thuật</a></li>
                                </ul>
                            </div>
                            <div class="btn_wrap"><input ectype="save_spec" type="submit" class="btn" value="Lưu đặc điểm" /></div>
                            <!--</form>-->
                            <div style="position:relative">
                              <div class="add_spec_bottom"></div>
                            </div>
                        </div>

                        <h4>Danh mục</h4>
                        <div class="add_wrap">
                            <div class="assort">
                                <p class="txt">Danh mục: </p>
                                <p class="select" id="gcategory">
                                    <?php if ($this->_var['goods']['cate_id']): ?>
                                    <span class="f_l"><?php echo htmlspecialchars($this->_var['goods']['cate_name']); ?></span>
                                    <a class="edit_gcategory btn" href="javascript:;">Sửa</a>
                                    <select style="display:none">
                                        <option>Xin chọn...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['mgcategories'])); ?>
                                    </select>
                                    <?php else: ?>
                                    <select>
                                        <option>Xin chọn...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['mgcategories'])); ?>
                                    </select>
                                    <?php endif; ?>
                                    <input type="text" id="cate_id" name="cate_id" value="<?php echo $this->_var['goods']['cate_id']; ?>" class="mls_id" />
                                    <input type="hidden" name="cate_name" value="<?php echo htmlspecialchars($this->_var['goods']['cate_name']); ?>" class="mls_names" />
                                </p>
                            </div>
                            <div class="assort">
                                <p class="txt">Danh mục cửa hàng: </p>
                                <p class="select">
                                    <?php if ($this->_var['goods']['_scates']): ?>
                                    <?php $_from = $this->_var['goods']['_scates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sgcate');if (count($_from)):
    foreach ($_from AS $this->_var['sgcate']):
?>
                                    <select name="sgcate_id[]" class="sgcategory">
                                        <option value="0">Xin chọn...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['sgcategories'],'selected'=>$this->_var['sgcate']['cate_id'])); ?>
                                    </select>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    <?php else: ?>
                                    <select name="sgcate_id[]" class="sgcategory">
                                        <option value="0">Xin chọn...</option>
                                        <?php echo $this->html_options(array('options'=>$this->_var['sgcategories'])); ?>
                                    </select>
                                    <?php endif; ?>

                                </p>
                                <p class="new_add">
                                    <a href="javascript:;" id="add_sgcategory" class="btn">Thêm</a>
                                    <span>Có thể bị giới hạn về số lượng sản phẩm tùy cấp độ cửa hàng</span>
                                </p>
                            </div>
                        </div>

                        <h4>Thông tin cơ bản</h4>
                        <div class="add_wrap">

                            <div class="pic_list">
                                <div class="big_pic"><img id="big_goods_image" src="<?php echo $this->_var['goods']['default_goods_image']; ?>" width="300" height="300" alt="" /></div>
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
                                                        <span class="cut_in" ectype="set_cover" ecm_title="Thiết lập trang bìa"></span>
                                                        <span class="delete" ectype="drop_image" ecm_title="Xoá"></span>
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
                                                <li><iframe src="index.php?app=comupload&act=view_iframe&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=goods_image" width="86" height="30" scrolling="no" frameborder="0"></iframe></li>
                                                <li id="open_remote" class="btn2">Link file</li>
                                            </ul>
                                            <div id="remote" class="upload_file" style="display:none">
                                            <iframe src="index.php?app=comupload&act=view_remote&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=goods_image" width="272" height="39" scrolling="no" frameborder="0"></iframe>
                                            </div>
                                            <div id="goods_upload_progress"></div>
                                            <div class="upload_txt">
                                                <span>Hỗ trợ cho định dạng JPEG và hình ảnh GIF tĩnh, không hỗ trợ ảnh động, tải lên hình ảnh kích thước không quá 2MB. Có thể chọn nhiều tập tin bằng cách giữ phím Ctrl hoặc Shift và chọn.</span>
                                            </div>

                                        </div>
                                        <div class="upload_con_bottom"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="products">
                                <ul>
                                    <li>
                                        <h2>Tên sản phẩm: </h2>
                                        <div class="arrange"><input title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" type="text" name="goods_name" value="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" class="text width_normal" /><span class="red">*</span></div>
                                    </li>
                                    <li>
                                        <h2>Hãng sản xuất: </h2>
                                        <div class="arrange"><input type="text" name="brand" value="<?php echo htmlspecialchars($this->_var['goods']['brand']); ?>" class="text width_normal" /></div>
                                    </li>
                                    <li>
                                        <h2>tags: </h2>
                                        <div class="arrange"><input type="text" name="tags" value="<?php echo htmlspecialchars($this->_var['goods']['tags']); ?>" class="text width_normal" />
                                            <span class="gray">Nhiều từ có thể cách nhau dấu ","</span></div>
                                    </li>
                                    <li>
                                        <h2  ectype="no_spec">Giá: </h2>
                                        <div class="arrange"  ectype="no_spec"><input name="spec_id" value="<?php echo $this->_var['goods']['_specs']['0']['spec_id']; ?>" type="hidden" /><input name="price" value="<?php echo $this->_var['goods']['_specs']['0']['price']; ?>" type="text" class="text width_short" /></div>
                                    </li>
                                    <li ectype="no_spec">
                                        <h2>Số lượng: </h2>
                                        <div class="arrange"><input name="stock" value="<?php echo $this->_var['goods']['_specs']['0']['stock']; ?>" type="text" class="text width_short" /></div>
                                    </li>
                                    <li ectype="no_spec">
                                        <h2>Mã sản phẩm: </h2>
                                        <div class="arrange"><input name="sku" value="<?php echo $this->_var['goods']['_specs']['0']['sku']; ?>" type="text" class="text width_normal" /></div>
                                    </li>
                                    <li>
                                        <h2>Đặc điểm: </h2>
                                        <div class="arrange">
                                            <div class="box_arr" ectype="no_spec"  style="display: none;">
                                                <p class="pos_btn"><a ectype="add_spec" href="javascript:;" class="add_btn">Chọn đặc điểm</a></p>
                                                <p class="pos_txt">Bạn có thể thêm hai loại chi tiết kỹ thuật của hàng hóa (màu sắc, kích thước) nếu không có đặc điểm kỹ thuật của hàng hóa không phải là để thêm.</p>
                                            </div>
                                            <div class="box_arr" ectype="has_spec"  style="display: none;">
                                            <table ectype="spec_result">
                                                <tr>
                                                    <th col="spec_name_1">loading..</th>
                                                    <th col="spec_name_2">loading..</th>
                                                    <th col="price">Giá</th>
                                                    <th col="stock">Số lượng</th>
                                                    <th col="sku">Mã sản phẩm</th>
                                                </tr>
                                                <tr ectype="spec_item" style="display:none">
                                                    <td item="spec_1"></td>
                                                    <td item="spec_2"></td>
                                                    <td item="price"></td>
                                                    <td item="stock"></td>
                                                    <td item="sku"></td>
                                                </tr>
                                            </table>
                                            <p class="table_btn">
                                                <a ectype="edit_spec" href="javascript:;" class="add_btn edit_spec">Chỉnh sửa</a>
                                                <a ectype="disable_spec" href="javascript:;" class="add_btn disable_spec">Đóng</a>
                                            </p>
                                        </div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2>Hiển thị: </h2>
                                        <div class="arrange">
                                            <span class="distance">
                                                <label><input name="if_show" value="1" type="radio" <?php if ($this->_var['goods']['if_show']): ?>checked="checked" <?php endif; ?>/> Có</label>
                                                <label><input name="if_show" value="0" type="radio" <?php if (! $this->_var['goods']['if_show']): ?>checked="checked" <?php endif; ?>/> Không</label>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <h2>Giới thiệu: </h2>
                                        <div class="arrange">
                                            <span class="distance">
                                                <label><input name="recommended" value="1" <?php if ($this->_var['goods']['recommended']): ?>checked="checked" <?php endif; ?>type="radio" name="c2" /> Có</label>
                                                <label><input name="recommended" value="0" <?php if (! $this->_var['goods']['recommended']): ?>checked="checked" <?php endif; ?>type="radio" name="c2" /> Không</label>
                                            </span>
                                            <span class="gray">Sản phẩm được giới thiệu sẽ xuất hiện trong trang chủ cửa hàng</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="add_bewrite">
                            <h5>Mô tả sản phẩm</h5>
                            <div class="add_wrap">
                                <div class="editor">
                                    <div>
                                    <textarea name="description" id="description"  style="width:100%; height:400px;">
                                    <?php echo htmlspecialchars($this->_var['goods']['description']); ?>
                                    </textarea>
                                    </div>
                                    <div style=" position: relative; top: 10px; z-index: 5;"><a class="btn3" id="open_editor_uploader">Up hình</a>
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
                                                    <li id="open_editor_remote" class="btn2">Link file</li>
                                                </ul>
                                                <div id="editor_remote" class="upload_file" style="display:none">
                                                <iframe src="index.php?app=comupload&act=view_remote&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=desc_image" width="272" height="39" scrolling="no" frameborder="0"></iframe>
                                                </div>
                                                <div id="editor_upload_progress"></div>
                                                <div class="upload_txt">
                                                    <span>Hỗ trợ cho định dạng JPEG và hình ảnh GIF tĩnh, không hỗ trợ ảnh động, tải lên hình ảnh kích thước không quá 2MB. Có thể chọn nhiều tập tin bằng cách giữ phím Ctrl hoặc Shift và chọn.</span>
                                                </div>

                                            </div>
                                            <div class="upload_con_bottom"></div>
                                        </div>
                                    </div>
                                    <ul id="desc_images" class="preview">
                                        <?php $_from = $this->_var['desc_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'desc_image');if (count($_from)):
    foreach ($_from AS $this->_var['desc_image']):
?>
                                        <li ectype="handle_pic" file_name="<?php echo htmlspecialchars($this->_var['desc_image']['file_name']); ?>" file_path="<?php echo $this->_var['desc_image']['file_path']; ?>" file_id="<?php echo $this->_var['desc_image']['file_id']; ?>">
                                        <input type="hidden" name="desc_file_id[]" value="<?php echo $this->_var['desc_image']['file_id']; ?>">
                                            <div class="pic">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['desc_image']['file_path']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars($this->_var['desc_image']['file_name']); ?>" title="<?php echo htmlspecialchars($this->_var['desc_image']['file_name']); ?>" /></div>
                                            <div ectype="handler" class="bg">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['desc_image']['file_path']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars($this->_var['desc_image']['file_name']); ?>" title="<?php echo htmlspecialchars($this->_var['desc_image']['file_name']); ?>" />
                                                <p class="operation">
                                                    <a class="cut_in" ectype="insert_editor" href="javascript:void(0);" ecm_title="Chèn hình"></a>
                                                    <span class="delete" ectype="drop_image" ecm_title="Xoá"></span>
                                                </p>
                                                <p title="<?php echo htmlspecialchars($this->_var['desc_image']['file_name']); ?>" class="name"><?php echo htmlspecialchars($this->_var['desc_image']['file_name']); ?></p>
                                            </div>
                                        </li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="issuance"><input type="submit" class="btn" value="Gửi" /></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="wrap_bottom"></div>
        </div>

        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
