<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
        
    <div class="visible-print text-center">
    		{!! QrCode::size(200)->generate($str_json); !!}
    		<!-- <img src="!! QrCode::format('png')->generate($str_json);" height="200" width="200"> -->
    		<p>
    			<h5>ID:
    				{{ $emp->id }}
    			</h5>	
    		</p>
    		<!-- <button onclick="window.print()">Print this page</button> -->
    		<input id="printpagebutton" type="button" value="Print QrCode" onclick="printpage()"/>
	</div>
     
     <script type="text/javascript">
     	function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
     </script>
    
</body>
</html>