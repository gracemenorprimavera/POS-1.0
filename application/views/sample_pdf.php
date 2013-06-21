
<html>
<head>
	<title></title>
</head>
<body>

<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
	//Load data
	function LoadData($file)
	{
		//Read file lines
		$lines=file($file);
		$data=array();
		foreach($lines as $line)
			$data[]=explode(';',chop($line));
		return $data;
	}

	//Simple table
	function BasicTable($header,$data)
	{
		//Header
		$w=array(15,15,55,25,25);
		//Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		//Data
		foreach ($data as $eachResult) 
		{
			$this->Cell(15,6,$eachResult["expense_id"],1,0,'C');
			$this->Cell(15,6,$eachResult["date_expense"],1,0,'C');
			$this->Cell(55,6,$eachResult["status"],1);
			$this->Cell(25,6,$eachResult["description"],1,0,'C');
			$this->Cell(25,6,$eachResult["amount"],1,0,'C');
			$this->Ln();
		}
	}

}

$pdf=new PDF();
//Column titles
$header=array('expense_id','date_expense','status','description','amount');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysql_connect('localhost', 'root', '') or die("Error Connect to Database");
$objDB = mysql_select_db('POS',$objConnect);
$objQuery = mysql_query("SELECT * FROM expenses",$objConnect) or die('Cannot Execute:'. mysql_error());
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//



$pdf->SetFont('Arial','',10);

//*** Table 1 ***//
$pdf->AddPage();
$pdf->SetLeftMargin(45);
//$pdf->Image('37775_133264393382068_1100555_n.jpg',80,8,33);
$pdf->Ln(35);
$pdf->BasicTable($header,$resultData);

$pdf->Output("PDF.pdf","F");
?>

<div class="mgr_display">
	PDF generated!
	<br>
	<?php
		echo anchor('pos/download', 'Download Report');

	?>
</div>


</body>
</html>