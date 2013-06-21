
 
<!DOCTYPE HTML>
<html>
	<head>
		<title>JS-PDF</title>
		<script type="text/javascript" src="../../jspdf/libs/base64.js"></script>
	<script type="text/javascript" src="../../jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="../../jspdf/libs/jspdf.js"></script>
	<link href="../../style.1.2.1.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../../subPages.css" media="screen" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="../../../themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../../themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../../themes/dark/dark.css" type="text/css" media="screen" />
   	<link rel="stylesheet" href="../../../themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../nivo-slider.css" type="text/css" media="screen" />
   
   
	
<!--Clock code-->
    <script type="text/javascript">
	function startTime()
	{
		var today=new Date();
		var hh=today.getHours();
		var m=today.getMinutes();
		var months = ['Jan.','Feb.','Mar.','Apr.','May','Jun.','Jul.','Aug.','Sep.','Oct.','Nov.','Dec.'];
		var weekday = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];  
		// add a zero in front of numbers<10
		m=checkTime(m);
		 var h = hh;
    if (h >= 12) {
        h = hh-12;
        dd = "PM";
    }
    if (h == 0) {
        h = 12;
    }
		today.setTime(today.getTime()); 
		  document.getElementById('clock').innerHTML=h+":"+m+"<br /><br />"+weekday[today.getDay()]+"<br /><br />"+today.getDate()+" "+months[today.getMonth()];
		t=setTimeout(function(){startTime()},500);
	}
	
	function checkTime(i)
	{
	if (i<10)
	  {
	  i="0" + i;
	  }
	return i;
	}
    </script>
	
</head>

<body onload="startTime()">	
	<div id="naviSub">
    	<div id="half1">
            <div class="tile bg-color-red" id="logOut">
                <a href="goToLogin"><img src="../../img/invisible-LINK.png" /></a>
            </div>
            <div class="tile bg-color-green" id="home">
                <a href="goToMain"><img src="../../img/invisible-LINK.png" /></a>
            </div>
        </div>
    	<div class="tile double-vertical bg-color-red" id="clocktile">
            <div id="clock"></div>
        </div>
        <div class="tile double bg-color-blue" id="slide">
           <div id="slide">
        	 <div id="wrapper">        
                <div class="slider-wrapper theme-default">
                      <div id="slider" class="nivoSlider">
                                <img src="../../images/women.jpg" data-thumb="../../images/women.jpg" alt="" title="#htmlcaption1"/>
                             	<img src="../../images/women1.jpg" data-thumb="../../images/women1.jpg" alt="" title="#htmlcaption2" />
                                <img src="../../images/women2.jpg" data-thumb="../../images/women2.jpg" alt="" title="#htmlcaption3" />
                                <img src="../../images/uplb.jpg" data-thumb="../../images/uplb.jpg" alt="" title="#htmlcaption4" />
                            </div>
                </div>
        
            </div>
           <script type="text/javascript" src="../../scripts/jquery-1.7.1.min.js"></script>
            <script type="text/javascript" src="../../jquery.nivo.slider.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        </div>
        </div>
        <div class="tile bg-color-greenDark" id="manageResident">
           	<a href="goToManageResident"><img src="../../img/invisible-LINK.png" /></a>
        </div>
        <div class="tile bg-color-greenLight" id="room">
            	<a href="goToManageDorm"><img src="../../img/invisible-LINK.png" /></a>
        </div>
    </div>
	
	<div id="content">
    	<header>
            <h1>Search Dormer</h1>
        </header>
        <section>
		<div class="desc bg-color-green">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque posuere convallis ante eget condimentum. Aliquam porttitor gravida leo eget egestas. Nulla facilisi. Aenean placerat diam lectus. Phasellus id rutrum massa. Fusce fringilla, neque in ullamcorper placerat, sapien dolor fermentum nisi, ut gravida dui lorem eu nisi. Vivamus tincidunt cursus molestie. Mauris enim lacus, vestibulum eget dapibus sit amet, tempus eu augue.
	</div>
<div id="infosheet">
       <br />
		
				<form name="form1" action = "javascript:exportToPDF()">
					Student Number:
					<input type="text" name="stnum" id="stnum" pattern="[0-9]{4}-[0-9]{5}"   required/>
					<input type="submit" value="Export as PDF File">
				</form>
				<!--<input type="submit">
				<a href = "javascript:exportToPDF()"> EXPORT </button>-->
<br />
        </div>
        </section>
        <footer>
            (C)2013 <a class="link link-blue" href="#/">cs128 - Group 4</a>
        </footer>
    </div>

</body>

</html>



	<script type="text/javascript">
		function exportToPDF() {
			
			
			var doc = new jsPDF();
			doc.setFontSize(16);
			doc.text(75, 20, "Women's Residence Hall");		
			doc.setFontSize(11);
			doc.text(20, 40, "Name: _______________________________________");
			doc.text(125, 40, "Student number: _________________");
			doc.text(20, 50, "Birthday: _________________");
			doc.text(85, 50, "Age: _____");
			doc.text(20, 60, "Course: _________________");
			doc.text(80, 60, "College: _________");
			doc.text(120, 60, "Classification: ______________");
			doc.text(20, 70, "Time of Graduation: _________________");
			doc.text(20, 80, "Civil Status: _________________");
			doc.text(20, 90, "Home Address: _________________________________________________________");
			doc.text(20, 100, "Cellphone number: _________________");
			doc.text(100, 100, "Email Address: _______________________________");
			doc.text(70, 110, "Scholarship: __________________________________");
			doc.text(20, 110, "STFAP Bracket: _____");
			doc.text(20, 120, "Monthly Allowance: _________________");
			doc.text(20, 130, "Religion: ______________________");
			doc.text(20, 140, "Affiliation(s): _________________________________________________");
			doc.text(20, 150, "Number of siblings: _________________");
			doc.text(20, 160, "Ailment(s): __________________________________");
			doc.text(120, 160, "Medication: ______________________");
			doc.text(20, 170, "Room number: ________");
			doc.text(20, 180, "Guardian ID: __________________");
			
			
			// Output as Data URI
			doc.output('datauri');
			
			
		}
	</script>

	</body>

</html>
