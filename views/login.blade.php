<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="loginCheck" method="POST">
        @csrf
        <div align="center">
            <h1> LogIn </h1>
            <table>
                <tr>
                    <td> Name </td>
                    <td> <input type="text" name="unm" id="" /> </td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="text" name="psw" id="" /> </td>
                </tr>
                <tr>
                    <td> <button type="submit"> Login </button> </td>
                    <td> <button type="reset"> Reset </button> </td>
                </tr>
            </table>
        </div>
    </form>
    <div align="center">
        <h4> New Here? <a href="registeration"> Create Account </a> </h4>
    </div>
</body>

</html>