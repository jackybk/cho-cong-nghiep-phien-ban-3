<?php

/**
 *    文章管理控制器
 *
 *    Quan ly su kien
 *    Le Duc Vien
 *    Quan ly danh muc chung loai
 */
class DmmenuApp extends BackendApp
{
    var $_qlsukien_mod;
    function __construct()
    {
        $this->DmmenuApp();
    }
    function DmmenuApp()
    {
        parent::BackendApp();
        $this->_dmmenu_mod = &m('dmmenu');
        
    }
    function index()
    { 
    	//Phan phan trang cua website
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
       $this->import_resource(array(
			                'script' => 'jquery.plugins/jquery.validate.js',
			            ));
			            
          if (isset($_GET['sort']) && isset($_GET['order']))
        {
            $sort  = strtolower(trim($_GET['sort']));
            $order = strtolower(trim($_GET['order']));
            if (!in_array($order,array('asc','desc')))
            {
             $sort  = 'id';
             $order = 'asc';
            }
        }
        else
        {
            $sort  = 'id';
            $order = 'asc';
        }
         $dm_menu = $this->_dmmenu_mod->find(array(
            'limit'         => $page['limit'],
	        'order'         => "$sort $order",
	        'count'         => true,
        ));
        $this->assign('chungloai', $dm_menu);
    	
    	$page['item_count'] = $this->_dmmenu_mod->getCount();
        $this->import_resource(array('script' => 'inline_edit.js'));
        $this->_format_page($page);
        $this->assign('filtered', $filter? 1 : 0); //是否有查询条件
        $this->assign('page_info', $page);
        
        $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
        $this->assign('wait_verify', $_GET['wait_verify']);
        $this->assign('page_info', $page); 
        
        $this->import_resource('jquery.plugins/jquery.validate.js,mlselection.js');
        $this->import_resource(array('script' => 'inline_edit.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
         $this->assign('scategories', $this->_get_scategory_options());  
        $this->display('dmmenu.index.html');
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
    function add()
    {
    	if(!IS_POST)
    	{
    		echo 'Yêu cầu nhập đầy đủ thông tin';
    	}
    	else 
    	{
    		   $status='1';
	    	   $data = array(
	                        'category'   => $_POST['name'],
	                        'parent'   => $_POST['group'],
	                        'status'    => $status,
	                        'stt'      => $_POST['order'],
	                    );
                  $dmmenu  =& m('dmmenu');
                 //var_dump($dtin_mod);
		            if (!($menudm_id = $dmmenu->add($data)))
		            {
		               $this->show_warning('no_such_brand');
		                return;
		            }
				            
				$this->show_message('add_dmchungloai',
				 'back_list',    'index.php?app=dmmenu'
				);
    	}
    	
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
        $this->_dmmenu_mod->drop($id);
        if ($this->_dmmenu_mod->has_error())    //删除
        {
            $this->show_warning($this->_dmmenu_mod->get_error());

            return;
        }
        $this->show_message('drop_successed');
    } 
    //hàm ẩn nhóm loại danh mục
     function annhom()
     {
     	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
     	$status_id='0';
     	$id_dis=explode(',', $id);
     	$data = array(
	                        'status'     =>  $status_id,
	                    );
			            $this->_dmmenu_mod->edit($id_dis, $data);
			            if ($this->_dmmenu_mod->has_error())
			            {
			                $this->show_warning('no_such_brand');
		                    return;
			            }
			            
			            $this->show_message('disable_ok',
			                'back_list',    'index.php?app=dmmenu'
			            );
     }
     function showgroup()
     {
     	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
     	$status_id='1';
     	$id_show=explode(',', $id);
     	$data = array(
	                        'status'     =>  $status_id,
	                    );
			            $this->_dmmenu_mod->edit($id_show, $data);
			            if ($this->_dmmenu_mod->has_error())
			            {
			                $this->show_warning('no_such_brand');
		                    return;
			            }
			            
			            $this->show_message('showgroup',
			                'back_list',    'index.php?app=dmmenu'
			            );
     }
     
     
     function  edit()
       {
       	if (!IS_POST)
        {
        	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
        	
        	//hien thi thong tin
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
         $this->import_resource(array(
			                'script' => 'jquery.plugins/jquery.validate.js',
			            ));
			
          $this->assign('scategories', $this->_get_scategory_options());            
          if (isset($_GET['sort']) && isset($_GET['order']))
          {
             $sort  = strtolower(trim($_GET['sort']));
            $order = strtolower(trim($_GET['order']));
            if (!in_array($order,array('asc','desc')))
            {
             $sort  = 'id';
             $order = 'asc';
            }
         }
         else
         {
            $sort  = 'id';
            $order = 'asc';
         }
         $sukien = $this->_dmmenu_mod->find(array(
            'limit'         => $page['limit'],
	        'order'         => "$sort $order",
	        'count'         => true,
         ));
         $this->assign('chungloai', $sukien);
    	
    	 $page['item_count'] = $this->_dmmenu_mod->getCount();
         $this->import_resource(array('script' => 'inline_edit.js'));
         $this->_format_page($page);
         $this->assign('filtered', $filter? 1 : 0); //是否有查询条件
         $this->assign('page_info', $page);
        
         $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
         $this->assign('wait_verify', $_GET['wait_verify']);
         $this->assign('page_info', $page); 

        	//ket thuc
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));

            $find_data  = $this->_dmmenu_mod->find($id);
            if (empty($find_data))
            {
                $this->show_warning('no_such_brand');

                return;
            }
            $edit_dmcl    =   current($find_data);
            //var_dump($dtin);
             $this->assign('edit_dm', $edit_dmcl);
           
            $this->import_resource('jquery.plugins/jquery.validate.js,mlselection.js');
            $this->import_resource(array('script' => 'inline_edit.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
            
            $sgrade_mod =& m('dmmenu');
            $this->assign('sgrades', $sgrade_mod->get_options());                           
                                      
            $this->display('dmmenu.index.html');
        }
        else 
        {
        	$id = isset($_GET['id']) ? trim($_GET['id']) : '';
        	// var_dump($id);
	    	  $data = array(
	                        'category'   => $_POST['name'],
	                        'parent'   => $_POST['group'],
	                        'stt'      => $_POST['order'],
	                    );
			            $this->_dmmenu_mod->edit($id, $data);
			            if ($this->_dmmenu_mod->has_error())
			            {
			                $this->show_warning('no_such_brand');
		                    return;
			            }
			            
			            $this->show_message('edit_ok',
			                'back_list',    'index.php?app=dmmenu'
			            );
        }
       	
     }
}

?>