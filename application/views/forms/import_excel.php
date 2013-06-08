<?php
echo $this->db->_error_message();
if(isset($_POST["Import"]))
{
$filename=$_FILES["file"]["tmp_name"];
//echo $ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
 if($_FILES["file"]["size"] > 0)
 {
$file = fopen($filename, "r");
$this->db->trans_start();
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {	
		   $data = array(
               'item_code' => $emapData[1],
               'bar_code' => $emapData[0],
               'desc1' => $emapData[2],
               'desc2' => $emapData[3],
               'desc3' => $emapData[4],
               'desc4' => $emapData[5],
			   'division' => $emapData[6],
               'group' => $emapData[7],
               'class1' => $emapData[8],
               'class2' => $emapData[9],
               'cost' => $emapData[10],
               'retail_price' => $emapData[11],
               'model_quantity' => $emapData[12],
               'supplier_code' => $emapData[13],
               'manufacturer' => $emapData[14],
               'quantity' => 0,
               'reorder_point' => 0
            );

			$this->db->insert('item', $data); 
		 }
$this->db->trans_complete();
fclose($file);
if ($this->db->trans_status() === FALSE)
	echo "CSV File not Imported";
else 
	echo "CSV File has been successfully Imported";
}
else
echo "Invalid File:Please Upload CSV File";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Import CSV/Excel file</title>
</head>
<body>
<form enctype="multipart/form-data" method="post">
<table border="1" width="40%" align="center">
<tr >
<td colspan="2" align="center"><strong>Import CSV/Excel file</strong></td>
</tr>

<tr>
<td align="center">CSV/Excel File:</td><td><input type="file" name="file" id="file"></td></tr>
<tr >
<td colspan="2" align="center"><input type="submit" name="Import" value="Import"></td>
</tr>
</table>
</form>
</body>
</html>