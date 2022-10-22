<x-header something="admin" pagename="Category"/>

<form action="addCategory" method="POST">
    @csrf
    <table align="center">
        <tr>
            <td> Category Name </td>
            <td> <input type="text" name="nm" required/> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"> <br> <input type="submit" name="submit" value="Add Into Category" /> </td>
        </tr>
    </table>
</form>
<br><br><br>
<div>
    <table align="center" border="1">
        <tr>
            <td> category id </td>
            <td> category Name</td>
        </tr>
        @foreach($allc as $c)
        <tr>
            <td> {{$c->cid}} </td>
            <td> {{$c->cnm}} </td>
        </tr>
        @endforeach
    </table>
</div>