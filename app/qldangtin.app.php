<?php

class QldangtinApp extends MemberbaseApp 
{
    var $_dangtin_mod;
    function __construct()
    {
        $this->QldangtinApp();
    }
    function QldangtinApp()
    {
        parent::__construct();
        $this->_dangtin_mod = &m('qldangtin');
        
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
    	$model_dangtin =& m('qldangtin');
        $dangtin = $this->_dangtin_mod->find(array(
            'limit'         => $page['limit'],
	        'order'         => "$sort $order",
	        'count'         => true,
	        'conditions'    => 'user_id = ' . $this->visitor->get('user_id'),
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
        
        $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('dangtin_list'));
        $this->_curitem('dangtin');
        $this->_curmenu('dangtin_list');
    
        $this->display('qldangtin.index.html');
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
           unlink($xoa_anh);
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

            $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('edit_new'));
	        $this->_curitem('dangtin');
	        $this->_curmenu('edit_new');
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
             	                //xoa file anh
             	               $xoa_anh=isset($_GET['picture']) ? trim($_GET['picture']) : '';
             	               unlink($xoa_anh);
             	                //xoa file anh het
								$file_name=$_FILES['picture']['name'];
								$file_path=$_FILES['picture']['tmp_name'];
								if( $user_id ==0)
								{
							       move_uploaded_file($_FILES["picture"]["tmp_name"],"data/files/mall/" . $_FILES["picture"]["name"]);
							       $new_path="data/files/mall/".$file_name;
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
									}
									 move_uploaded_file($_FILES["picture"]["tmp_name"],$bbc . $_FILES["picture"]["name"]);
									 $new_path=$bbc.$file_name;
					
								}
			               
			           $data = array(
			                        'user_id'     => $user_id,
			                        'picture'   => $new_path,
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
			                'back_list',    'index.php?app=qldangtin'
			            );
            }
            else
            {
            	//echo 'q111111111';
            	$data = array(
			                        'user_id'     => $user_id,
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
			                'back_list',    'index.php?app=qldangtin'
			            );
			        
            }
         }
    	
    }
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
			                'back_list',    'index.php?app=qldangtin'
			            );
    	
    }
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
	    		$this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
	                            LANG::get('dangtin'), 'index.php?app=qldangtin',
	                            LANG::get('uptin_auto'));
		        $this->_curitem('dangtin');
		        $this->_curmenu('uptin_auto');
		        $this->assign('timkiem',  $timkiem);
		        $this->display('uptin.index.html');
    		}
    		else 
    		{     $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
	                            LANG::get('dangtin'), 'index.php?app=qldangtin',
	                            LANG::get('uptin_auto'));
		        $this->_curitem('dangtin');
		        $this->_curmenu('uptin_auto');
		        $this->display('uptin.index.html');
    		}
    		
    	}else
    	{
    		echo 'tu dong up tin';
        }
    }
    function keyword()
    {
    	
    	$key=$_POST['idNews'];
    	//echo $key;
    	if($key=='')
    	{
    		$arr_no = array("somearray" => array(0 => 'Yêu cầu nhập ký tự tìm kiếm'));
    		 $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('uptin_auto'));
        $this->_curitem('uptin_auto');
        $this->_curmenu('dangtin_list');
        $this->display('uptin.index.html');
    	}
    	else {
        $timkiem = $this->_dangtin_mod->find(array(
	        'count'         => true,
	        'conditions'    => 'id = ' . $key,
        ));
        $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('uptin_auto'));
        $this->_curitem('uptin_auto');
        $this->_curmenu('dangtin_list');
        $this->assign('timkiem',  $timkiem);
        $this->display('uptin.index.html');
    	}
    }
    
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
	    		$this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
	                            LANG::get('dangtin'), 'index.php?app=qldangtin',
	                            LANG::get('dangtin_vip'));
		        $this->_curitem('uptin_auto');
		        $this->_curmenu('dangtin_vip');
		        $this->assign('timkiem',  $timkiem);
		        $this->display('dangtinvip.index.html');
    		}
    		else 
    		{
    			$this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
	                            LANG::get('dangtin'), 'index.php?app=qldangtin',
	                            LANG::get('dangtin_vip'));
		        $this->_curitem('uptin_auto');
		        $this->_curmenu('dangtin_vip');
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
			                'back_list',    'index.php?app=qldangtin'
			    );
    	}
    	
    }
    function key_vip()
    {
    	$key=$_POST['idNews'];
    	//echo $key;
    	if($key=='')
    	{
    		$arr_no = array("somearray" => array(0 => 'Yêu cầu nhập ký tự tìm kiếm'));
    		 $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('dangtin_vip'));
        $this->_curitem('dangtin');
        $this->_curmenu('dangtin_vip');
        $this->display('dangtinvip.index.html');
    	}
    	else {
        $timkiem = $this->_dangtin_mod->find(array(
	        'count'         => true,
	        'conditions'    => 'id = ' . $key. ' and user_id= '. $this->visitor->get('user_id'),
        ));
        $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('dangtin_vip'));
        $this->_curitem('dangtin');
        $this->_curmenu('dangtin_vip');
        $this->assign('timkiem',  $timkiem);
        $this->display('dangtinvip.index.html');
    	}
    	
    }
     function key_sieuvip()
    {
    	$key=$_POST['idNews'];
    	//echo $key;
    	if($key=='')
    	{
    		$arr_no = array("somearray" => array(0 => 'Yêu cầu nhập ký tự tìm kiếm'));
    		 $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('dangtin_svip'));
        $this->_curitem('dangtin');
        $this->_curmenu('dangtin_svip');
        $this->assign('key_tk',  $key);

        $this->display('dangtinsieuvip.index.html');
    	}
    	else {
        $timkiem = $this->_dangtin_mod->find(array(
	        'count'         => true,
	        'conditions'    => 'id = '. $key. ' and user_id= '. $this->visitor->get('user_id'),
        ));
        $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('dangtin_svip'));
        $this->_curitem('dangtin');
        $this->_curmenu('dangtin_svip');
        $this->assign('timkiem',  $timkiem);
      
        $this->display('dangtinsieuvip.index.html');
    	}
    	
    }
    function tinraovatvip()
    {
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
        $vip=1;
        $tinvip = $this->_dangtin_mod->find(array(
            'limit'         => $page['limit'],
	        'count'         => true,
	        'conditions'    => 'vip = 1 AND '.'user_id = ' . $this->visitor->get('user_id'),
        ));
        $this->assign('tinvip', $tinvip);
         $page['item_count'] = $this->_dangtin_mod->getCount();
         $this->import_resource(array('script' => 'inline_edit.js'));
        $this->_format_page($page);
        $this->assign('filtered', $filter? 1 : 0); //是否有查询条件
        $this->assign('page_info', $page);
        $time_vip=time();
        $this->assign('timevip', $time_vip);

        
    	 $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('tin_vip'));
        $this->_curitem('dangtin');
        $this->_curmenu('tin_vip');
    	$this->display('tinvip.index.html');
    }
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
	    		$this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
	                            LANG::get('dangtin'), 'index.php?app=qldangtin',
	                            LANG::get('dangtin_svip'));
		        $this->_curitem('dangtin');
		        $this->_curmenu('dangtin_svip');
		        $this->assign('timkiem',  $timkiem);
		        $this->display('dangtinsieuvip.index.html');
    		}
    		else 
    		{
    			$this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
	                            LANG::get('dangtin'), 'index.php?app=qldangtin',
	                            LANG::get('dangtin_svip'));
		        $this->_curitem('dangtin');
		        $this->_curmenu('dangtin_svip');
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
			                'back_list',    'index.php?app=qldangtin'
			    );
    	}
    }
     function tinraovatsieuvip()
    {
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
        $vip=1;
        $tinvip = $this->_dangtin_mod->find(array(
            'limit'         => $page['limit'],
	        'count'         => true,
	        'conditions'    => 'svip = 1 AND '.'user_id = ' . $this->visitor->get('user_id'),
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
        
    	 $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('tin_svip'));
        $this->_curitem('dangtin');
        $this->_curmenu('tin_svip');
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
    	$this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('tinquantam'));
        $this->_curitem('dangtin');
        $this->_curmenu('tinquantam');
    	$this->display('tinquantam.index.html');
    }
    function xoatinqt()
    {
    	$result='0';
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
    	$data = array(
			                        'luutin'     => $result,
			                    );
			            $this->_dangtin_mod->edit($id, $data);
			            if ($this->_dangtin_mod->has_error())
			            {
			                $this->pop_warning($this->_dangtin_mod->get_error());
			                return;
			            }
			            $this->show_message('xoatinqt_ok',
			                'back_list',    'index.php?app=qldangtin&act=tinquantam'
			            );
    	
    }
    function tinsukien()
    {
    	$this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                            LANG::get('dangtin'), 'index.php?app=qldangtin',
                            LANG::get('tinsukien'));
        $this->_curitem('dangtin');
        $this->_curmenu('tinsukien');
    	$this->display('tinsukien.index.html');
    }
    function xoatinsieuvip()
    {
    	$result='0';
    	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
    	$data = array(
				  'svip'     => $result,
				  'timesvip' => $result
			);
				 $this->_dangtin_mod->edit($id, $data);
				 if ( $this->_dangtin_mod->has_error())
				  {
				       $this->pop_warning( $this->_dangtin_mod->get_error());
				       return;
				  }
				    $this->show_message('xoasieuvip',
				    'back_list',    'index.php?app=qldangtin&act=tinraovatsieuvip'
				  );
				  
	  }
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
				    'back_list',    'index.php?app=qldangtin&act=tinraovatvip'
				  );
				  
	  }
    
}

?>