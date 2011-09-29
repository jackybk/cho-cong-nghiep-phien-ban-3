<?php

/**
 *    文章管理控制器
 *
 *    Le Duc vien
 *    Sua ngay 23/9/2011
 */
class PlquanlyApp extends BackendApp
{
    var $_dangtin_mod;
    function __construct()
    {
        $this->PlquanlyApp();
    }
    function PlquanlyApp()
    {
        parent::BackendApp();
        $this->_dangtin_mod = &m('pldangtin');
        
    }
    function index()
    {  
    	
    	//$user=$this->visitor->get('user_id');
    	$page = $this->_get_page(5);
         $conditions = $this->_get_query_conditions(array(array(
                'field' => 'title',
                'equal' => 'LIKE',
                'limit' => $page['limit'],
                'assoc' => 'AND',
                'name'  => 'title',
                'type'  => 'string',
               
            ),
        ));
         
         //var_dump($user);
         if (isset($_GET['sort']) && isset($_GET['order']))
        {
            $sort  = strtolower(trim($_GET['sort']));
            $order = strtolower(trim($_GET['order']));
            if (!in_array($order,array('asc','desc')))
            {
             $sort  = 'id';
             $order = 'desc';
            }
        }
        else
        {
            $sort  = 'id';
            $order = 'desc';
        }
    	$model_dangtin =& m('pldangtin');
        $dangtin = $this->_dangtin_mod->find(array(
            'limit'         => $page['limit'],
	        'order'         => "$sort $order",
	        'count'         => true,
	        //'conditions'    => 'user_id = ' . $this->visitor->get('user_id'),
        ));

        $this->assign('dangtin', $dangtin);
        $this->assign('scategories', $this->_get_scategory_options());
    	 $this->_get_regions();
    	 
        $page['item_count'] = $this->_dangtin_mod->getCount();
         $this->import_resource(array('script' => 'inline_edit.js'));
        $this->_format_page($page);
        $this->assign('filtered', $filter? 1 : 0); //是否有查询条件
        $this->assign('page_info', $page);
        
        $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
        $this->assign('wait_verify', $_GET['wait_verify']);
        $this->assign('page_info', $page); 
        
    
        $this->display('pldangtin.index.html');
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
        $this->assign('regions', $regions);
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
      function drop()
    {
    	 $user_id = isset($_GET['user_id']) ? trim($_GET['user_id']) : '';
    	  $id = isset($_GET['id']) ? trim($_GET['id']) : '';
    	
       
        //var_dump($id);
         if (!$id)
        {
            $this->show_warning('no_such_brand');

            return;
        }
        $id=explode(',', $id);
        $this->_dangtin_mod->drop($id);
        if ($this->_dangtin_mod->has_error())    //删除
        {
            $this->show_warning($this->_dangtin_mod->get_error());

            return;
        }
                  
        $xoa_anh=isset($_GET['picture']) ? trim($_GET['picture']) : '';
        unlink('../'.$xoa_anh);
                           
        $this->show_message('drop_successed');
    }
    function edit()
    {
    	 if (!IS_POST)
        {
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            $this->assign('build_editor', $this->_build_editor(array(
                'name' => 'description',
                'content_css' => SITE_URL . "/themes/store/{$template_name}/styles/{$style_name}" . '/shop.css', // for preview
            )));
             $this->_get_regions();
             $this->assign('scategories', $this->_get_scategory_options());

	        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
            $find_data  = $this->_dangtin_mod->find($id);
            if (empty($find_data))
            {
                $this->show_warning('no_such_brand');

                return;
            }
            $dtin    =   current($find_data);
            //var_dump($dtin);
            $this->assign('dtin', $dtin);
            $region_mod =& m('region');
            $this->assign('regions', $region_mod->get_options(0));
           
            $this->import_resource('jquery.plugins/jquery.validate.js,mlselection.js');
            $this->display('edit_new.form.html');
        }
        else
        {
        	 
             $id = isset($_GET['id']) ? trim($_GET['id']) : '';
             $user_id = isset($_GET['user_id']) ? trim($_GET['user_id']) : '';
             $anh=$_FILES['picture']['name'];
             $ngaydang=time();
            
             if($anh !='')
             {               
                               	 $xoa_anh=isset($_GET['picture']) ? trim($_GET['picture']) : '';
             	                 unlink('../'.$xoa_anh);
                              
             	                //xoa file anh het
								$file_name=$_FILES['picture']['name'];
								$file_path=$_FILES['picture']['tmp_name'];
								if( $user_id ==0)
								{
							       move_uploaded_file($_FILES["picture"]["tmp_name"],"../data/files/mall/anh_0/" . $_FILES["picture"]["name"]);
							       $new_path="../data/files/mall/anh_0/".$file_name;
								}
								else {
									$abcd="../data/files/mall/anh_".$user_id;
									$bbc="../data/files/mall/anh_".$user_id."/";
									if (!file_exists( $abcd )) {
										mkdir("../data/files/mall/anh_".$user_id);
										$dir="../data/files/mall/anh_".$user_id."/";
										//var_dump($dir);
										move_uploaded_file($_FILES["picture"]["tmp_name"],$dir . $_FILES["picture"]["name"]);
									    $new_path=$dir.$file_name;
									}
									 move_uploaded_file($_FILES["picture"]["tmp_name"],$bbc . $_FILES["picture"]["name"]);
									 $new_path=$bbc.$file_name;
					
								}
			                $cut_str=substr($new_path,3);
				           $data = array(
				                       // 'user_id'     => $user_id,
				                        'picture'   => $cut_str,
				                        'title'   => $_POST['title'],
				                        'categories'   => $_POST['categories'],
				                        'address'    => $_POST['region_name'],
				                        'content'      => $_POST['description'],
				                        'thoigianup' => $ngaydang,
				                        'region_id'  => $_POST['region_id'],
				                    );
				            $this->_dangtin_mod->edit($id, $data);
				           
				           
				            if ($this->_dangtin_mod->has_error())
				            {
				                $this->pop_warning($this->_dangtin_mod->get_error());
				                return;
				            }
				            
				            $this->show_message('edit_ok',
				                'back_list',    'index.php?app=plquanly'
				            );
            }
            else
            {
            	//echo 'q111111111';
            	$data = array(
			                        //'user_id'     => $user_id,
			                       // 'picture'   => $new_path,
			                        'title'   => $_POST['title'],
			                        'categories'   => $_POST['categories'],
			                        'address'    => $_POST['region_name'],
			                        'content'      => $_POST['description'],
			                        'thoigianup' => $ngaydang,
			                         'region_id'  => $_POST['region_id'],
			                    );
			            $this->_dangtin_mod->edit($id, $data);
			            if ($this->_dangtin_mod->has_error())
			            {
			                $this->pop_warning($this->_dangtin_mod->get_error());
			                return;
			            }
			            
			            $this->show_message('edit_ok',
			                'back_list',    'index.php?app=plquanly'
			            );
			        
            }
         }
    	
    }
    //Le duc vien
    //Sua phan  up tin rao vat len dautrang
    function  refesh()
    {         
    	       $id = isset($_GET['id']) ? trim($_GET['id']) : '';
    	       $ngaydang=time();
    	       $data = array(
			              'thoigianup' => $ngaydang,
			                       
			                    );
			            $this->_dangtin_mod->edit($id, $data);
			            if ($this->_dangtin_mod->has_error())
			            {
			                $this->pop_warning($this->_dangtin_mod->get_error());
			                return;
			            }
			            
			            $this->show_message('refesh_ok',
			                'back_list',    'index.php?app=plquanly'
			            );
    	
    }
    //phan uptin tu dong cho san pham rao vat
     function  uptin()
    {
    	 $id_uptin = isset($_GET['id']) ? trim($_GET['id']) : '';
    	if(!IS_POST)
    	{
    		if ($id_uptin !='')
    		{
	    		$timkiem = $this->_dangtin_mod->find(array(
		        'count'         => true,
		        'conditions'    => 'id = ' . $id_uptin,
	           ));

		        $this->assign('timkiem',  $timkiem);
		        $this->display('uptin.index.html');
    		}
    		else 
    		{    
		        $this->display('uptin.index.html');
    		}
    		
    	}
    	else 
    	{
            echo 'Tự động cập nhật tin vẫn chưa hoàn thiện';
    	}
    }
    // ham tim kiem trong phan up tin tu dong
    function keyword()
    {
    	
    	$key=$_POST['idNews'];
    	//echo $key;
    	if($key=='')
    	{
    	$arr_no = array("somearray" => array(0 => 'Yêu cầu nhập ký tự tìm kiếm'));
        $this->display('uptin.index.html');
    	}
    	else {
        $timkiem = $this->_dangtin_mod->find(array(
	        'count'         => true,
	        'conditions'    => 'id = ' . $key,
        ));
  
        $this->assign('timkiem',  $timkiem);
        $this->display('uptin.index.html');
    	}
    }
    //phan dang tin vip
    function dangtinvip()
    {
    	$id_tinvip = isset($_GET['id']) ? trim($_GET['id']) : '';
    	if(!IS_POST)
    	{
    		if($id_tinvip!='')
    		{
	    		$timkiem = $this->_dangtin_mod->find(array(
		        'count'         => true,
		        'conditions'    => 'id = ' . $id_tinvip,
	           ));
		        $this->assign('timkiem',  $timkiem);
		        $this->display('dangtinvip.index.html');
    		}
    		else 
    		{
		        $this->display('dangtinvip.index.html');
    		}
    		
    	}
    	else {
    		$songay=$_POST['qty_item'];
            $timevip1=$_POST['thoigianvip'];
            if ($timevip1< time()){// neu chua dang tin vip bao gio hoac tin vip da het han
			   $timevip=time()+24*3600*$songay;	
			   $vip='1';
			}
			else {
				$timevip=$timevip1+24*3600*$songay;	
				 $vip='1';
			}
			 $data = array(
			    'vip'     => $vip,
			    'timevip'=>$timevip,
			       );
			  $this->_dangtin_mod->edit($id_tinvip, $data);
			 if ($this->_dangtin_mod->has_error())
			   {
			       $this->pop_warning($this->_dangtin_mod->get_error());
			       return;
			   }
			    $this->show_message('add_tinvip',
			                'back_list',    'index.php?app=plquanly'
			    );
    	}
    	
    }
    //Phan key vip 
     function key_vip()
    {
    	$key=$_POST['idNews'];
    	//echo $key;
    	if($key=='')
    	{
        $arr_no = array("somearray" => array(0 => 'Yêu cầu nhập ký tự tìm kiếm'));
        $this->display('dangtinvip.index.html');
    	}
    	else {
        $timkiem = $this->_dangtin_mod->find(array(
	        'count'         => true,
	        'conditions'    => 'id = ' . $key,
        ));
       
        $this->assign('timkiem',  $timkiem);
        $this->display('dangtinvip.index.html');
    	}
    	
    }
    //phan dang tin sieu VIP
    function tinsieuvip()
    {
    	$id_tinsvip = isset($_GET['id']) ? trim($_GET['id']) : '';
    	if(!IS_POST)
    	{
    		if($id_tinsvip!='')
    		{
	    		$timkiem = $this->_dangtin_mod->find(array(
		        'count'         => true,
		        'conditions'    => 'id = ' . $id_tinsvip,
	           ));
		        $this->assign('timkiem',  $timkiem);
		        $this->display('dangtinsieuvip.index.html');
    		}
    		else 
    		{
		        $this->display('dangtinsieuvip.index.html');
    		}
    	}else {
    		$songay=$_POST['qty_item'];
            $timevip1=$_POST['thoigianvip'];
            if ($timevip1< time()){// neu chua dang tin vip bao gio hoac tin vip da het han
			   $timevip=time()+24*3600*$songay;	
			   $vip='1';
			}
			else {
				$timevip=$timevip1+24*3600*$songay;	
				 $vip='1';
			}
			 $data = array(
			    'svip'     => $vip,
			    'timesvip'=>$timevip,
			       );
			  $this->_dangtin_mod->edit($id_tinsvip, $data);
			 if ($this->_dangtin_mod->has_error())
			   {
			       $this->pop_warning($this->_dangtin_mod->get_error());
			       return;
			   }
			    $this->show_message('add_tinsieuvip',
			                'back_list',    'index.php?app=plquanly'
			    );
    	}
    }
    //key sieu vip nhap du lieu tim kiem trong phan sieu vip
    function key_sieuvip()
    {
    	$key=$_POST['idNews'];
    	//echo $key;
    	if($key=='')
    	{
    	$arr_no = array("somearray" => array(0 => 'Yêu cầu nhập ký tự tìm kiếm'));
        $this->assign('key_tk',  $key);

        $this->display('dangtinsieuvip.index.html');
    	}
    	else {
        $timkiem = $this->_dangtin_mod->find(array(
	        'count'         => true,
	        'conditions'    => 'id = '. $key,
        ));
        
        $this->assign('timkiem',  $timkiem);
      
        $this->display('dangtinsieuvip.index.html');
    	}
    	
    }
    //phan cap nhat tin sieu vip
    function capnhattinsieuvip()
    {
    	$id_tinsvip = isset($_GET['id']) ? trim($_GET['id']) : '';
    	if(!IS_POST)
    	{
    		if($id_tinsvip!='')
    		{
	    		$timkiem = $this->_dangtin_mod->find(array(
		        'count'         => true,
		        'conditions'    => 'id = ' . $id_tinsvip,
	           ));
		        $this->assign('timkiem',  $timkiem);
		        $this->display('dangtinsieuvip.index.html');
    		}
    		else 
    		{
		        $this->display('dangtinsieuvip.index.html');
    		}
    	}else {
    		$songay=$_POST['qty_item'];
            $timevip1=$_POST['thoigianvip'];
            if ($timevip1< time()){// neu chua dang tin vip bao gio hoac tin vip da het han
			   $timevip=time()+24*3600*$songay;	
			   $vip='1';
			}
			else {
				$timevip=$timevip1+24*3600*$songay;	
				 $vip='1';
			}
			 $data = array(
			    'svip'     => $vip,
			    'timesvip'=>$timevip,
			       );
			  $this->_dangtin_mod->edit($id_tinsvip, $data);
			 if ($this->_dangtin_mod->has_error())
			   {
			       $this->pop_warning($this->_dangtin_mod->get_error());
			       return;
			   }
			    $this->show_message('add_tinsieuvip',
			                'back_list',    'index.php?app=plquanly'
			    );
    	}
    }
    // cập nhật nhiều tin làm mới cùng 1 lúc
    function lammoitin()
    {
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
        $ngaydang=time();
        $id=explode(',', $id);
    	$data = array(
		'thoigianup' => $ngaydang,
		);
		$this->_dangtin_mod->edit($id, $data);
		 if ($this->_dangtin_mod->has_error())
			 {
			     $this->pop_warning($this->_dangtin_mod->get_error());
			     return;
			 }
		$this->show_message('refesh_ok',
			                'back_list',    'index.php?app=plquanly'
		);
    }
    //cap nhat tin VIP len mot ngay
    function capnhattinvip()
    {
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
        $capnhatvip=time()+24*3600*1;
        $id=explode(',', $id);
    	$data = array(
		'timevip' => $capnhatvip,
		);
		$this->_dangtin_mod->edit($id, $data);
		if ($this->_dangtin_mod->has_error())
			 {
			     $this->pop_warning($this->_dangtin_mod->get_error());
			     return;
			 }
		$this->show_message('capnhattinvip_ok',
			                'back_list',    'index.php?app=plquanly'
		);
    	
    }
    //cap nhat tin sieu vip them mot ngay
    function updatesieuvip()
    {
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
        $capnhatsvip=time()+24*3600*1;
        $id=explode(',', $id);
    	$data = array(
		'timesvip' => $capnhatsvip,
		);
		$this->_dangtin_mod->edit($id, $data);
		if ($this->_dangtin_mod->has_error())
			 {
			     $this->pop_warning($this->_dangtin_mod->get_error());
			     return;
			 }
		$this->show_message('capnhattinsieuvip_ok',
			                'back_list',    'index.php?app=plquanly'
		);
    	
    }
    //cập nhật chức năng tin rao vặt vip
    function tinraovatvip()
    {
    	$page = $this->_get_page(10);
         $conditions = $this->_get_query_conditions(array(array(
                'field' => 'title',
                'equal' => 'LIKE',
                'limit' => $page['limit'],
                'assoc' => 'AND',
                'name'  => 'title',
                'type'  => 'string',
               
            ),
        ));
        $vip=1;
        $tinvip = $this->_dangtin_mod->find(array(
            'limit'         => $page['limit'],
	        'count'         => true,
	        'conditions'    => 'vip = 1',
        ));
        $this->assign('tinvip', $tinvip);
         $page['item_count'] = $this->_dangtin_mod->getCount();
         $this->import_resource(array('script' => 'inline_edit.js'));
        $this->_format_page($page);
        $this->assign('filtered', $filter? 1 : 0); //是否有查询条件
        $this->assign('page_info', $page);
        $time_vip=time();
        $this->assign('timevip', $time_vip);
    	$this->display('tinvip.index.html');
    }
    // xóa tin đã đăng vip rồi
     function xoatinvip()
    {
    	$result='0';
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
    	$data = array(
				  'vip'     => $result,
				  'timevip' => $result
			);
				 $this->_dangtin_mod->edit($id, $data);
				 if ( $this->_dangtin_mod->has_error())
				  {
				       $this->pop_warning( $this->_dangtin_mod->get_error());
				       return;
				  }
				    $this->show_message('xoavip',
				    'back_list',    'index.php?app=plquanly&act=tinraovatvip'
				  );
				  
	  }
	  //quan ly tin rao vat sieu vip
	   function tinraovatsieuvip()
      {
    	$page = $this->_get_page(10);
         $conditions = $this->_get_query_conditions(array(array(
                'field' => 'title',
                'equal' => 'LIKE',
                'limit' => $page['limit'],
                'assoc' => 'AND',
                'name'  => 'title',
                'type'  => 'string',
               
            ),
        ));
        $vip=1;
        $tinvip = $this->_dangtin_mod->find(array(
            'limit'         => $page['limit'],
	        'count'         => true,
	        'conditions'    => 'svip = 1',
        ));
        $this->assign('tinvip', $tinvip);
         $page['item_count'] = $this->_dangtin_mod->getCount();
         $this->import_resource(array('script' => 'inline_edit.js'));
        $this->_format_page($page);
        $this->assign('filtered', $filter? 1 : 0); //是否有查询条件
        $this->assign('page_info', $page);
        
        /*Gan bien time den form*/
        $time_vip=time();
        $this->assign('timevip', $time_vip);

    	$this->display('tinsieuvip.index.html');
    }
     
    function tinquantam()
    {
    	$id = '1';
    	$noidung = $this->_dangtin_mod->find(array(
		        'count'         => true,
		        'conditions'    => 'luutin = ' . $id,
	           ));

	    $this->assign('quantam',  $noidung);
    	$this->display('tinquantam.index.html');
    }
    //cap nhat tin khuyen mai
    function check_khuyenmai()
    {
    	$khuyenmai='1';
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
        $id=explode(',', $id);
    	$data = array(
		'khuyenmai' => $khuyenmai,
		);
		$this->_dangtin_mod->edit($id, $data);
		if ($this->_dangtin_mod->has_error())
			 {
			     $this->pop_warning($this->_dangtin_mod->get_error());
			     return;
			 }
		$this->show_message('khuyenmai_ok',
			                'back_list',    'index.php?app=plquanly'
		);
    }
    //huy bo tin khuyen mai
    function debugkhuyenmai()
    {
    	$debug_khuyenmai='0';
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
        $id=explode(',', $id);
    	$data = array(
		'khuyenmai' => $debug_khuyenmai,
		);
		$this->_dangtin_mod->edit($id, $data);
		if ($this->_dangtin_mod->has_error())
			 {
			     $this->pop_warning($this->_dangtin_mod->get_error());
			     return;
			 }
		$this->show_message('debug_khuyenmai_ok',
			                'back_list',    'index.php?app=plquanly'
		);
    }
    
}

?>