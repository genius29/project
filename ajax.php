<!DOCTYPE html>
<html lang="en">
<head>
	<title>array</title>
	<script>
	function showHint(str) {
	    if (str.length == 0) { 
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else {
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
	        }
	        xmlhttp.open("GET", "gethint.php?q="+str, true);
	        xmlhttp.send();
	    }
	}
	</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form> 
Pangita ug Gwapo: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Gwapo si: <span id="txtHint"></span></p>
</body>
</html>