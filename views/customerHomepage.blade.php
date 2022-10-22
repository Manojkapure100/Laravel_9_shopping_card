<x-header something="customer" pagename="Product List"/>

<script>
	function fc(val){
		// alert("fc");
		var xhttp = new XMLHttpRequest();
        // var url="{{url('custhomeajax/"+val+"')}}";
        var url = "custhomeajax/" + val;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("spanc").innerHTML = this.responseText;
                // alert("come",val); 
            } else {
                // document.getElementById("subc").innerHTML="not comes";  
            }
        };
        xhttp.open("get", url, true);
        xhttp.send();
        return true;
	}
	function fsc(val){
		// alert("fsc");
		var xhttp = new XMLHttpRequest();
        // var url="{{url('needsc/"+val+"')}}";
        var url = "needsc/" + val;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("spansc").innerHTML = this.responseText;
                // alert("come",val); 
            } else {
                // document.getElementById("subc").innerHTML="not comes";  
            }
        };
        xhttp.open("get", url, true);
        xhttp.send();
        return true;
	}   
    function myp(val){
		var xhttp = new XMLHttpRequest();
        var url = "myp/" + val;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myp").innerHTML = this.responseText;
            } else {
                // document.getElementById("myp").innerHTML = "error";
            }
        };
        xhttp.open("get", url, true);
        xhttp.send();
        return true;
	}  
    function addcart(pid){
        var qty = prompt("enter Qty: ");
		var xhttp = new XMLHttpRequest();
        var url = "storeid/"+pid+"/"+qty;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("myp").innerHTML = this.responseText;
                alert(this.responseText);
            } else {
                // alert("error");
            }
        };
        xhttp.open("get", url, true);
        xhttp.send();
        return true;
	}
</script>

<body onload="fsc(1);fc(1);myp(1);">

<table align="center" border="0">
<tr>
<td> Category: </td>
<td> <span id="spanc"> </td>
<td> Sub Category: </td>
<td> <span id="spansc"> </td>
</tr>
</table>
<br><br>
<div id="myp"></div>
</body>