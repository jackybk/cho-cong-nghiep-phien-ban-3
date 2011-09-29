<?php
class DangtinApp extends MallbaseApp
{
	 
    var $_uploadedfile_mod;
    var $_dangtin_mod;
    function __construct()
    {
        $this->DangtinApp();
    }
    function DangtinApp()
    {
        parent::__construct();
         $this->_dangtin_mod =& m('dtin');
        $this->_uploadedfile_mod = &m('uploadedfile');
        //$this->_store_id  = intval($this->visitor->get('manage_store'));
    }

    function index()
    {      
    	 
    	  $region_mod =& m('region');
          $this->assign('site_url', site_url());
          $this->_get_regions();
  
          $this->assign('scategories', $this->_get_scategory_options());   
            $this->assign('editor_upload', $this->_build_upload(array(
                'obj' => 'EDITOR_SWFU',
                'belong' => BELONG_STORE,
                'item_id' => $this->_store_id,
                'button_text' => Lang::get('bat_upload'),
                'button_id' => 'editor_upload_button',
                'progress_id' => 'editor_upload_progress',
                'upload_url' => 'index.php?app=swfupload',
                'if_multirow' => 1,
            )));
            
            $this->import_resource('jquery.plugins/jquery.validate.js,mlselection.js');
            $this->assign('build_editor', $this->_build_editor(array(
                'name' => 'description',
                'content_css' => SITE_URL . "/themes/store/{$template_name}/styles/{$style_name}" . '/shop.css', // for preview
            )));
             $this->_curlocal(LANG::get('member_center'), 'index.php?app=dangtin', LANG::get('dangtin'));
             $this->import_resource(array('script' => 'jquery.plugins/jquery.validate.js',));
			            
           if (Conf::get('captcha_status.register'))
            {
                $this->assign('captcha', 1);
            }
           
            //lấy dữ liệu nhu cau
            $model_nhucau =& m('dmmenu');
	        $nhucau = $model_nhucau->find(array(
		        'count'         => true,
	        ));
	        $this->assign('need', $nhucau);
	        
	        
            // lay du lieu chung loai
            $model_dmchungloai =& m('dmchungloai');
	        $chungloai = $model_dmchungloai->find(array(
		        'count'         => true,
	        ));
	        $this->assign('dmchungloai', $chungloai);
            //ket thuc
            
            $region_mod =& m('region');
            $this->assign('regions', $region_mod->get_options(0));
            $this->import_resource('jquery.plugins/jquery.validate.js,mlselection.js');
             //$this->assign('files_belong_store', $files_belong_store);
            $this->display('dangtin.index.html');
    }
    function add()
    { 	
   	
                    header("Content-Type:text/html;charset=" . CHARSET);
                    $user_id = $this->visitor->get('user_id');
					$file_name=$_FILES['picture']['name'];
					$file_path=$_FILES['picture']['tmp_name'];
					
					
					if( $user_id ==0)
					{
				       move_uploaded_file($_FILES["picture"]["tmp_name"],"data/files/mall/anh_0/" . $_FILES["picture"]["name"]);
				       $new_path="data/files/mall/anh_0/".$file_name;
					}
					else {
						$abcd="data/files/mall/anh_".$user_id;
						$bbc="data/files/mall/anh_".$user_id."/";
						if (!file_exists( $abcd )) {
							mkdir("data/files/mall/anh_".$user_id);
							$dir="data/files/mall/anh_".$user_id."/";
							//var_dump($dir);
							move_uploaded_file($_FILES["picture"]["tmp_name"],$dir . $_FILES["picture"]["name"]);
						    $new_path=$dir.$file_name;
						    $solanup;
						}
						 move_uploaded_file($_FILES["picture"]["tmp_name"],$bbc . $_FILES["picture"]["name"]);
						 $new_path=$bbc.$file_name;
					}
					
					//lấy tên vùng
      	           //$ngaydang=date("H:i:s d/m/Y",time());
      	            $ngaydang=time();
                   //ket thuc
                    $data = array(
                        'user_id'     => $user_id,
                        'picture'   => $new_path,
                        'title'   => $_POST['title'],
                        'categories'   => $_POST['danhmuc'],
                        'address'    => $_POST['region_name'],
                        'content'      => $_POST['description'],
                        'thoigianup' => $ngaydang,
                        'region_id'  => $_POST['region_id'],
                        'nhucau' => $_POST['nhucau'],
                        'chungloai' =>$_POST['chungloai'],
                    );
             
            $dtin_mod  =& m('dtin');
            //var_dump($dtin_mod);
            if (!($shipping_id = $dtin_mod->add($data)))
            {
                $this->pop_warning($dtin_mod->get_error());
                return;
            }
           $this->show_message('add_dangtin',
           'back_list',    'index.php?app=dangtin');
        
        
    }
   
    function check_category ()
    {
        $cate_name = empty($_GET['cate_name']) ? '' : trim($_GET['cate_name']);
        if (!$cate_name)
        {
            echo ecm_json_encode(true);
            return ;
        }
        return ;
    }
     function _get_regions()
    {
        $model_region =& m('region');
        $regions = $model_region->get_list(0);
        if ($regions)
        {
            $tmp  = array();
            foreach ($regions as $key => $value)
            {
                $tmp[$key] = $value['region_name'];
            }
            $regions = $tmp;
        }
        //var_dump($regions);
        $this->assign('regions', $regions);
    }
   
   
        /* 异步删除附件 */
    function drop_uploadedfile()
    {
        $file_id = isset($_GET['file_id']) ? intval($_GET['file_id']) : 0;
        $file = $this->_uploadedfile_mod->get($file_id);
        if ($file_id && $file['store_id'] == $this->visitor->get('manage_store') && $this->_uploadedfile_mod->drop($file_id))
        {
            $this->json_result('drop_ok');
            return;
        }
        else
        {
            $this->json_error('drop_error');
            return;
        }
    }
     function _get_all_need()
    {
        $mod =& m('dtin');
        $scategories = $mod->get_list();
        import('tree.lib');
        $tree = new Tree();
        $tree->setTree($scategories, 'id', 'parent', 'category');
        return $tree->getOptions();
    }
     function _get_scategory_options()
    {
        $mod =& m('scategory');
        $scategories = $mod->get_list();
        import('tree.lib');
        $tree = new Tree();
        $tree->setTree($scategories, 'cate_id', 'parent_id', 'cate_name');
        return $tree->getOptions();
        
    }
    
    
 
}

?>
