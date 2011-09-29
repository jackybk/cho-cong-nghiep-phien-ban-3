<?php
class ChangecatApp extends MallbaseApp
{
	 
    var $_uploadedfile_mod;
    var $_Changecat_mod;
    function __construct()
    {
        $this->ChangecatApp();
    }
    function ChangecatApp()
    {
        parent::__construct();
        
    }

    function index()
    { 
    	$catid = empty($_POST['catid']) ? 0 : intval($_POST['catid']);
    	$result=mysql_query("SELECT * FROM ecm_need WHERE category=$catid") or die(mysql_error());
    	echo "<select name=\"nhucau\" >
                       <option>Xin chọn nhu cầu</option>
             </select>";
    }
}
?>