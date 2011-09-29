<?php

/**
 * 文章并列显示模块挂件
 */
class BinglieWidget extends BaseWidget
{
    var $_name = 'binglie';
	var $_acategory_mod;
	var $_article_mod;
	var $_ACC; //系统文章cate_id数据
	var $_cate_ids1; //当前分类及子孙分类cate_id1
	var $_cate_ids2; //当前分类及子孙分类cate_id2
	var $_cate_ids3; //当前分类及子孙分类cate_id3
	
    function _get_data()
    {
        if (empty($this->options['num1']) || intval($this->options['num1']) <= 0)
        {
            $this->options['num1'] = 5;
        }
		 if (empty($this->options['num2']) || intval($this->options['num2']) <= 0)
        {
            $this->options['num2'] = 4;//每个UTF-8中文字符占3位
        }
		$cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$this->_acategory_mod = &m('acategory');
			$this->_article_mod = &m('article');
			$this->_ACC = $this->_acategory_mod->get_ACC();
		/* 处理cate_id */
/*		 if($this->options['cate_id1'])
		{*/
			$cate_id1 = !empty($this->options['cate_id1'])? intval($this->options['cate_id1']) : $this->_ACC[ACC_NOTICE]; 
/*		}
        elseif($this->options['cate_id2'])
		{*/
			$cate_id2 = !empty($this->options['cate_id2'])? intval($this->options['cate_id2']) : $this->_ACC[ACC_NOTICE]; 
/*		}
		elseif($this->options['cate_id3'])
		{*/
			$cate_id3 = !empty($this->options['cate_id3'])? intval($this->options['cate_id3']) : $this->_ACC[ACC_NOTICE]; 
/*			}
	else
		{
			$cate_id1 = $this->_ACC[ACC_NOTICE]; 
			$cate_id2 =  $this->_ACC[ACC_NOTICE]; 
			$cate_id3 = $this->_ACC[ACC_NOTICE]; 
		}*/
        	$cate_ids1 = array();
			$cate_ids2 = array();
			$cate_ids3 = array();
        	$cate_ids1 = $this->_acategory_mod->get_descendant($cate_id1);
			$cate_ids2 = $this->_acategory_mod->get_descendant($cate_id2);
			$cate_ids3 = $this->_acategory_mod->get_descendant($cate_id3);
        	$this->_cate_ids1 = $cate_ids1;
			$this->_cate_ids2 = $cate_ids2;
			$this->_cate_ids3 = $cate_ids3;
			!empty($this->_cate_ids1)&& $conditions1 = ' AND cate_id ' . db_create_in($this->_cate_ids1);
			!empty($this->_cate_ids2)&& $conditions2 = ' AND cate_id ' . db_create_in($this->_cate_ids2);
			!empty($this->_cate_ids3)&& $conditions3 = ' AND cate_id ' . db_create_in($this->_cate_ids3);
			
            $articles1 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions1,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         => $this->options['num1'],
            ));
			 $articles2 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions2,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         => $this->options['num1'],
            ));
			$articles3 = $this->_article_mod->find(array(
                'conditions'  => 'if_show=1 AND store_id=0 ' . $conditions3,
                'order'         => 'add_time DESC',
                'fields'        => 'article_id,title,add_time',
                'limit'         => $this->options['num1'],
            ));
            //截取文章标题长度
			foreach($articles1 as $key=>$val)
        	{	
				$articles1[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num2']);
        	}
			foreach($articles2 as $key=>$val)
        	{	
				$articles2[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num2']);
        	}
			foreach($articles3 as $key=>$val)
        	{	
				$articles3[$key]["title"] = $this->smarty_modifier_jiequ($val["title"],$this->options['num2']);
        	}
		}
       return array(
            'module_name1'  => $this->options['module_name1'],
			'module_name2'  => $this->options['module_name2'],
			'module_name3'  => $this->options['module_name3'],
			'cate_id1'  => $this->options['cate_id1'],
			'cate_id2'  => $this->options['cate_id2'],
			'cate_id3'  => $this->options['cate_id3'],
            'articles1'     => $articles1,
			'articles2'     => $articles2,
			'articles3'     => $articles3,
			'num1'      =>  $this->options['num1'],
			'num2'      =>  $this->options['num2'],
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