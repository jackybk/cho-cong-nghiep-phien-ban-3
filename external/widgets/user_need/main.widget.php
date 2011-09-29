<?php

/**
 * 用户须知显示模块挂件
 */
class User_needWidget extends BaseWidget
{
    var $_name = 'user_need';
	var $_acategory_mod;
	var $_article_mod;
	var $_ACC; //系统文章cate_id数据
	var $_cate_ids1; //当前分类及子孙分类cate_id1
	var $_ca66pyiyp0te_ids2; //当前分类及子孙分类cate_id2
	var $_cate_ids3; //当前分类及子孙分类cate_id3
	//var $_cate_ids4; //当前分类及子孙分类cate_id4
	//var $_cate_ids5; //当前分类及子孙分类cate_id5
	//var $_cate_ids6; //当前分类及子孙分类cate_id6
	var $_num  = 5;
	
    function _get_data()
    {
		$cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$this->_acategory_mod = &m('acategory');
			$this->_article_mod = &m('article');
			$this->_ACC = $this->_acategory_mod->get_ACC();
			if (empty($this->options['num1']) || intval($this->options['num1']) <= 0)
			{
				$this->options['num1'] = 4;
			}
		/* 处理cate_id */
			$cate_id1 = !empty($this->options['cate_id1'])? intval($this->options['cate_id1']) : $this->_ACC[ACC_NOTICE]; 
			$cate_id2 = !empty($this->options['cate_id2'])? intval($this->options['cate_id2']) : $this->_ACC[ACC_NOTICE]; 
			$cate_id3 = !empty($this->options['cate_id3'])? intval($this->options['cate_id3']) : $this->_ACC[ACC_NOTICE]; 
			//$cate_id4 = !empty($this->options['cate_id4'])? intval($this->options['cate_id4']) : $this->_ACC[ACC_NOTICE];
			//$cate_id5 = !empty($this->options['cate_id5'])? intval($this->options['cate_id5']) : $this->_ACC[ACC_NOTICE];
			//$cate_id6 = !empty($this->options['cate_id6'])? intval($this->options['cate_id6']) : $this->_ACC[ACC_NOTICE];
			
        	$cate_ids1 = array();
			$cate_ids2 = array();
			$cate_ids3 = array();
			//$cate_ids4 = array();
			//$cate_ids5 = array();
			//$cate_ids6 = array();
        	$cate_ids1 = $this->_acategory_mod->get_descendant($cate_id1);
			$cate_ids2 = $this->_acategory_mod->get_descendant($cate_id2);
			$cate_ids3 = $this->_acategory_mod->get_descendant($cate_id3);
			//$cate_ids4 = $this->_acategory_mod->get_descendant($cate_id4);
			//$cate_ids5 = $this->_acategory_mod->get_descendant($cate_id5);
			//$cate_ids6 = $this->_acategory_mod->get_descendant($cate_id6);
        	$this->_cate_ids1 = $cate_ids1;
			$this->_cate_ids2 = $cate_ids2;
			$this->_cate_ids3 = $cate_ids3;
			//$this->_cate_ids4 = $cate_ids4;
			//$this->_cate_ids5 = $cate_ids5;
			//$this->_cate_ids6 = $cate_ids6;

			!empty($this->_cate_ids1)&& $conditions1 = ' AND cate_id ' . db_create_in($this->_cate_ids1);
			!empty($this->_cate_ids2)&& $conditions2 = ' AND cate_id ' . db_create_in($this->_cate_ids2);
			!empty($this->_cate_ids3)&& $conditions3 = ' AND cate_id ' . db_create_in($this->_cate_ids3);
			//!empty($this->_cate_ids4)&& $conditions4 = ' AND cate_id ' . db_create_in($this->_cate_ids4);
			//!empty($this->_cate_ids5)&& $conditions5 = ' AND cate_id ' . db_create_in($this->_cate_ids5);
			//!empty($this->_cate_ids6)&& $conditions6 = ' AND cate_id ' . db_create_in($this->_cate_ids6);
			
            $articles1 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions1,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         =>  $this->_num,
            ));
			 $articles2 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions2,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         =>  $this->_num,
            ));
			$articles3 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions3,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         => $this->_num,
            ));
			/*$articles4 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions4,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         => $this->_num,
            ));
			/*$articles5 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions5,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         => $this->_num,
            ));
			/*$articles6 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions6,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         => $this->_num,
            ));*/
            //截取文章标题长度
			foreach($articles1 as $key=>$val)
        	{	
				$articles1[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num1']);
        	}
			foreach($articles2 as $key=>$val)
        	{	
				$articles2[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num1']);
        	}
			foreach($articles3 as $key=>$val)
        	{	
				$articles3[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num1']);
        	}
			//foreach($articles4 as $key=>$val)
        	//{	
			//	$articles4[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num1']);
        	//}
			//foreach($articles5 as $key=>$val)
        	//{	
			//	$articles5[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num1']);
        	//}
			//foreach($articles6 as $key=>$val)
        	//{	
			//	$articles6[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num1']);
        	//}
		}
       return array(
            'module_name1'  => $this->_get_acategory_name($this->options['cate_id1']),
			'module_name2'  => $this->_get_acategory_name($this->options['cate_id2']),
			'module_name3'  => $this->_get_acategory_name($this->options['cate_id3']),
			//'module_name4'  => $this->_get_acategory_name($this->options['cate_id4']),
			//'module_name5'  => $this->_get_acategory_name($this->options['cate_id5']),
			//'module_name6'  => $this->_get_acategory_name($this->options['cate_id6']),

            'articles1'     => $articles1,
			'articles2'     => $articles2,
			'articles3'     => $articles3,
			//'articles4'     => $articles4,
			//'articles5'     => $articles5,
			//'articles6'     => $articles6,
			'num1'      =>  $this->options['num1'],
        	);
    }


	function smarty_modifier_jiequ($string, $length = 15, $etc = '...')  
	{  
     	if ($length == 0)  
         	return '';  
     	if (mb_strlen($string,'UTF-8') > $length) {  
  			$string = mb_substr($string,0,$length,'UTF-8');  
   			return $string.$etc;  
  		}else{  
   			return $string;  
  			}  
 	}  
	function _get_acategory_name($cate_id)
    {
        $this->_acategory_mod = &m('acategory');
		$conditions = " AND cate_id = '$cate_id'";
		$acategories = current($this->_acategory_mod->find(array(
		'conditions' => '1=1' . $conditions,		
		)));

		return $acategories['cate_name'];
    }
	
	function _get_acategory($cate_id)
    {
        //显示子级文章分类
		$acategories = $this->_acategory_mod->get_list($cate_id);
        if ($acategories)
		 {
            unset($acategories[$this->_ACC[ACC_SYSTEM]]);
            return $acategories;
        }
        //显示父级文章分类
		else
        {
            $parent = $this->_acategory_mod->get($cate_id);
            if (isset($parent['parent_id']))
            {
                return $this->_get_acategory($parent['parent_id']);
            }
        }
    }
	function get_config_datasrc()
    {
        $this->_acategory_mod = &m('acategory');
		$this->_ACC = $this->_acategory_mod->get_ACC();
		$acategories = $this->_get_acategory($cate_id);
		// 取得文章分类
        $this->assign('acategorys', $acategories);
    }
	function parse_config($input)
    {
		 return $input;
    }

}

?>