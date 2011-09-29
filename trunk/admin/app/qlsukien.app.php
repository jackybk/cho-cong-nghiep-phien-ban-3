<?php

/**
 *    文章管理控制器
 *
 *    Quan ly su kien
 *    Le Duc Vien
 *    Quan ly su kien
 */
class QlsukienApp extends BackendApp
{
    var $_qlsukien_mod;
    function __construct()
    {
        $this->QlsukienApp();
    }
    function QlsukienApp()
    {
        parent::BackendApp();
        $this->_qlsukien_mod = &m('qlsukien');
        
    }
    function index()
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
         $sukien = $this->_qlsukien_mod->find(array(
            'limit'         => $page['limit'],
	        'order'         => "$sort $order",
	        'count'         => true,
        ));
        $this->assign('news', $sukien);
    	
    	$page['item_count'] = $this->_qlsukien_mod->getCount();
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
        $this->display('qlsukien.index.html');
    }
    function addsukien()
    {
    	if(!IS_POST)
    	{
    		echo 'Yêu cầu nhập đầy đủ thông tin';
    	}
    	else 
    	{
    	    $formdate=date_to_int($_POST['fromdate']);
    	    $todate=date_to_int($_POST['todate']);
	    	$data = array(
	                        'title'   => $_POST['title'],
	                        'formdate'   => $formdate,
	                        'todate'    => $todate,
	                        'stt'      => $_POST['stt'],
	                    );
                $sukien  =& m('qlsukien');
                 //var_dump($dtin_mod);
		            if (!($sukien_id = $sukien->add($data)))
		            {
		               $this->show_warning('no_such_brand');
		                return;
		            }
				            
				$this->show_message('addsukien',
				 'back_list',    'index.php?app=qlsukien'
				);
    	}
    }
    /*Xoa tin su kien*/
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
        $this->_qlsukien_mod->drop($id);
        if ($this->_qlsukien_mod->has_error())    //删除
        {
            $this->show_warning($this->_qlsukien_mod->get_error());

            return;
        }
        $this->show_message('drop_successed');
    }
    
    function edit()
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
         $sukien = $this->_qlsukien_mod->find(array(
            'limit'         => $page['limit'],
	        'order'         => "$sort $order",
	        'count'         => true,
         ));
         $this->assign('news', $sukien);
    	
    	 $page['item_count'] = $this->_qlsukien_mod->getCount();
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

            $find_data  = $this->_qlsukien_mod->find($id);
            if (empty($find_data))
            {
                $this->show_warning('no_such_brand');

                return;
            }
            $edit_sk    =   current($find_data);
            //var_dump($dtin);
             $this->assign('edit_sukien', $edit_sk);
           
            $this->import_resource('jquery.plugins/jquery.validate.js,mlselection.js');
            $this->import_resource(array('script' => 'inline_edit.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
            $this->display('qlsukien.index.html');
        }
        else 
        {
        	 $id = isset($_GET['id']) ? trim($_GET['id']) : '';
        	// var_dump($id);
        	 $formdate=date_to_int($_POST['fromdate']);
    	      $todate=date_to_int($_POST['todate']);
	    	  $data = array(
	                        'title'   => $_POST['title'],
	                        'formdate'   => $formdate,
	                        'todate'    => $todate,
	                        'stt'      => $_POST['stt'],
	                    );
			            $this->_qlsukien_mod->edit($id, $data);
			            if ($this->_qlsukien_mod->has_error())
			            {
			                $this->show_warning('no_such_brand');
		                    return;
			            }
			            
			            $this->show_message('edit_ok',
			                'back_list',    'index.php?app=qlsukien'
			            );
        	
        }
    }
     
}

?>