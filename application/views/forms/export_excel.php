<div id="export_excel"><p>
	This functionality allows you to download backup of the whole database in csv/excel format bundled in zip.	
	<?php
		echo form_open('items/exportExcel',array('onsubmit'=>"return confirm('Save File?')"));
		echo form_submit(array('name'=>'export_submit', 'class'=>'button'), 'Export');
		echo form_close();
	?>
</p></div>