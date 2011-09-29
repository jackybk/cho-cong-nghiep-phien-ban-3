<?php



/**

 * 最新文章挂件

 *

 * @return  array

 */

class New_articleWidget extends BaseWidget
{

    var $_name = 'new_article';

    function _get_data()
    {
    	//Tin rao vat moi nhat
        $model_dangtin =& m('qldangtin');
        $dangtin = $model_dangtin->find(array(
        'limit'         => 4,
	    'count'         => true,
	    'order'         => 'thoigianup DESC',
        ));
        $this->assign('dangtin', $dangtin);	
       // var_dump($dangtin);
       //Tin khuyen mai
        $value='1';
        $model_dangtin =& m('qldangtin');
        $khuyenmai = $model_dangtin->find(array(
        'limit'         => 4,
	    'count'         => true,
	    'order'         => 'thoigianup DESC',
		'conditions'    => 'khuyenmai ='.$value,
        ));
        $this->assign('khuyenmai', $khuyenmai);
       // var_dump($khuyenmai);
       //san pham moi
        $model_sanpham =& m('goods');
        $sanpham = $model_sanpham->find(array(
        'limit'         => 4,
	    'count'         => true,
	    'order'         => 'add_time DESC',
        ));
       $this->assign('sanpham', $sanpham);

       
    }

   	function _substring($str,$start,$len) 

	{

   		$tmpstr = "";

    	$strlen = $len*3 - $start;

    	for($i = 0; $i < $strlen; $i++)

		 {

        	if(ord(substr($str, $i, 1)) > 0xa0)

			 {

            	$tmpstr .= substr($str, $i, 2);

            	$i++;

        		} 

			else{

            	$tmpstr .= substr($str, $i, 1);

			}

    	  }

   		 return $tmpstr;

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