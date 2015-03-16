﻿ <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

	
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" type="image/ico" href="http://www.sprymedia.co.uk/media/images/favicon.ico">
		
		<title>Using DataTable with column filter plugin - Server Side Example</title>
		<style type="text/css" title="currentStyle">
			@import "includes/jquery-datatables-column-filter/media/css/demo_page.css";
			@import "includes/jquery-datatables-column-filter/media/css/demo_table.css";
			@import "includes/jquery-datatables-column-filter/media/css/themes/base/jquery-ui.css";
			@import "includes/jquery-datatables-column-filter/media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
		</style>

        <script src="includes/jquery-datatables-column-filter/media/js/jquery-1.4.4.min.js" type="text/javascript"></script>
        <script src="includes/jquery-datatables-column-filter/media/js/jquery.dataTables.js" type="text/javascript"></script>

        <script src="includes/jquery-datatables-column-filter/media/js/jquery-ui.js" type="text/javascript"></script>

        <script src="includes/jquery-datatables-column-filter/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready( function () {
           			$('#example').dataTable({
                                      "bProcessing": true,
                                      "sAjaxSource": "http://localhost:81/reviews/ajaxSource.js"
                                      
                                    }
                                    ).columnFilter({
			aoColumns: [ 
				     { type: "text" },
				     { type: "text" },
				     { type: "number-range" },
				     { type: "select",
					   values: function(aoData, oSettings){
							var keys = new Array();
							var values = new Array()
							for(i=0; i<aoData.length; i++){
								var item = aoData[i]._aData[3];
								if(keys[item]==null){
									keys[item] = true;
									//values.push(item);
									values.push({ value: item, label: 'The ' + item});
								}
							}
							return values;
						}
						}
				]

		});
				
			} );
		</script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-17838786-4']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

</script>
	</head>




<body id="dt_example">
		<div id="container">
			<a href="index.html">Home</a>
			<a href="http://code.google.com/p/jquery-datatables-column-filter/wiki/ColumnFilter">Wiki</a> 
			<div class="full_width big">

				JQuery DataTable Column Filter - Server Side Example
			</div>
			
			<h1>Preamble</h1>
			<p>
				DataTables ColumnFilter add-in works in the Server-side mode. Live example below is configured to use serer-side
				processing code. Note that this example does not perform filtering because on the google code site are not hosted
				php fles where can be implemented server side processing. However, if you see request trace in FireBug you will see
				that filtering requests are sent to the server side.
			</p>

			
	
			
			
			<h1>Live example</h1>







			<div id="demo">

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</tfoot>
	<tbody>
			</tbody>
</table>

			</div>
			<div class="spacer"></div>

			
			

			
			<h1>Initialization code</h1>

<p>There are no additional settings here - if you set-up dataTables in the server-side processing mode, filter requests will just be redirected to the server-side.</p>	


			<h1>Other examples</h1>
			<ul>

				<li><a href="default.html">Basic usage</a></li>
				<li><a href="customFilters.html">Custom filters</a></li>
				<li><a href="dateRange.html">Date ranges</a></li>
				<li><a href="numberRange.html">Number ranges</a></li>
				<li><a href="ajaxSource.html">Ajax source filtering</a></li>
				<li><a href="serverSide.html">Server-side filtering</a></li>
		                <li><a href="regex.html">Regular expression filtering</a></li>
		        	<li><a href="external.html">Filtering via external form</a></li>
			</ul>
			
			<div id="footer" style="text-align:center;">
				<span style="font-size:10px;">
					DataTables Column Filter Add-on &copy; Jovan Popovic 2011.<br>
					DataTables designed and created by <a href="http://www.sprymedia.co.uk">Allan Jardine</a> &copy; 2007-2011<br>
				</span>
			</div>
		</div>
	</body>





</html>