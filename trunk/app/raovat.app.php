<?php
class RaovatApp extends MallbaseApp
{
	
    function index()
    {      
    	   $id = isset($_GET['id']) ? trim($_GET['id']) : '';
           //lay ra danh muc nhu cau
	        $model_nhucau =& m('dmmenu');
	        $nhucau = $model_nhucau->find(array(
		        'count'         => true,
		            'conditions'    => 'status= 1 AND parent = '.$id,
	        ));
	        $this->assign('need', $nhucau);
	        
	        
            // lay du lieu chung loai
            $model_dmchungloai =& m('dmchungloai');
	        $chungloai = $model_dmchungloai->find(array(
		        'count'         => true,
		        'conditions'    => 'status= 1 AND parent = '.$id,
	        ));
	        $this->assign('category', $chungloai);
	        // lay danh muc san pham vip
	         $tinvip_mod =& m('qldangtin');
             $data = $tinvip_mod->find(array(
                'count' => true,
                'limit'         => $page['limit'],
                'conditions'    => 'svip = 1 or vip = 1 and categories ='.$id,
            ));
              $this->assign('vip', $data); 
	        //hien thi phan noi dung dang tin
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
         //
	        $tinnoibat_mod =& m('qldangtin');
             $data = $tinnoibat_mod->find(array(
                'count' => true,
                'limit'         => $page['limit'],
                'conditions'    => 'categories = '.$id,
            ));
                $page['item_count'] = $tinnoibat_mod->getCount();
		        $this->import_resource(array('script' => 'inline_edit.js'));
		        $this->_format_page($page);
		        $this->assign('filtered', $filter? 1 : 0); //是否有查询条件
		        $this->assign('page_info', $page);
		        
		        $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
		        $this->assign('wait_verify', $_GET['wait_verify']);
		        $this->assign('page_info', $page); 
             $this->assign('noibat', $data);
            $this->display('tinraovat.index.html');
    }
    
 
}

?>
