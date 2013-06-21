<?php
$data = file_get_contents("C:/xampp/htdocs/POS/MyPDF.pdf"); // Read the file's contents
$name = 'report.pdf';

force_download($name, $data);

?>