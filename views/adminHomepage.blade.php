<x-header something="admin" pagename="Shopping Report" />

<script>
    function getdate() {
        var to = document.getElementById("to").value;
        var from = document.getElementById("from").value;
        var url = "getorderdatewise/" + from + "/" + to;
        if (to != "" && from != "") {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    document.getElementById("myo").innerHTML = this.responseText;
                }
            }
            xhttp.open("get", url, true);
            xhttp.send();
        }
    }

    function getorderall() {
        var url = "getorderall";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myo").innerHTML = this.responseText;
            }
        }
        xhttp.open("get", url, true);
        xhttp.send();
    }
</script>

<body onload="getorderall()">

    <table align="center" border="0">
        <tr>

            <td> From : </td>
            <td> <input type="date" id='from' name='from' onchange="getdate()"> </td>

            <td style="padding-left: 50px;"> <span> </td>

            <td> To : </td>
            <td> <input type="date" id='to' name='to' onchange="getdate()"> </td>

        </tr>
    </table>
    <br><br>
    <div id="myo"></div>
</body>