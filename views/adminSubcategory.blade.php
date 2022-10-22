<x-header something="admin" pagename="Subcategory" />

<script>
    function f(val) {
        // alert(val);  
    }
</script>

<form action="addSubcategory" method="POST">
    @csrf
    <table align="center">
        <tr>
            <td> Category Name </td>
            <td>
                <select name="c" onchange="f(this.value)">
                    @foreach($mydata as $my)
                    <option value="{{$my->cid}}"> {{$my->cnm}} </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td> Sub Category Name </td>
            <td> <input type="text" name="nm" required /> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"> <br> <input type="submit" name="submit" value="Add Into Sub Category" /> </td>
        </tr>
    </table>
</form>
<br><br><br>
<div>
    <table align="center" border="1">
        <tr>
            <td> Subcategory id </td>
            <td> Subcategory Name</td>
            <td> Category id </td>
        </tr>
        @foreach($allsc as $sc)
        <tr>
            <td> {{$sc->scid}} </td>
            <td> {{$sc->scnm}} </td>
            <td> {{$sc->cid}} </td>
        </tr>
        @endforeach
    </table>
</div>

