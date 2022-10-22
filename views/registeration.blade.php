<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <script>
        function chkname(val) {
            // alert(val);
            var xhttp = new XMLHttpRequest();
            var url = "chkname/" + val;
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("chkname").innerHTML = this.responseText;
                } else { 
                }
            };
            xhttp.open("get", url, true);
            xhttp.send();
            return true;
        }
    </script>

</head>

<body>
    <form action="registrationcheck" method="POST">
        @csrf
        <div align="center">
            <h1> Signup </h1>
            <table>
                <tr>
                    <td> Name </td>
                    <td> <input type="text" name="unm" id="" onkeyup="chkname(this.value);" /> </td>
                    <td> <span id="chkname"> </td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="text" name="psw" id="" /> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> <button type="submit"> Signup </button> </td>
                    <td> <button type="reset"> Reset </button> </td>
                </tr>
            </table>
        </div>
    </form>
    <div align="center">
        <h4> Already have a account ? <a href="login"> Login </a> </h4>
    </div>
</body>

</html>