<x-header something="admin" pagename="Products" />

<script>
    function f(val) {
        // alert(val);
        var xhttp = new XMLHttpRequest();
        // var url="{{url('needsc/"+val+"')}}";
        var url = "needsc/" + val;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subc").innerHTML = this.responseText;
                // alert("come",val); 
            } else {
                // document.getElementById("subc").innerHTML="not comes";  
            }
        };
        xhttp.open("get", url, true);
        xhttp.send();
        return true;
    }

    function f1() {
       // alert("f1");
    }
</script>

<body onload="f(1)">

    <form action="addProduct" method="POST">
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
    </form>
    </td>
    </tr>
    <!-- <span id="subc"> -->
    <tr>
        <td> Sub Category Name </td>
        <td>
            <!-- <select name="sc" onchange="f1(this.value)"> -->
                <span id="subc">
            <!-- </select> -->
        </td>
    </tr>
    <tr>
        <td> Product Name </td>
        <td> <input type="text" name="nm" required /> </td>
    </tr>
    <tr>
        <td> Product Price </td>
        <td> <input type="number" name="price" required /> </td>
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
            <td> Product id </td>
            <td> Product Name</td>
            <td> Product price </td>
            <td> Subcategory id </td>
            <td> Category id </td>
        </tr>
        @foreach($allp as $p)
        <tr>
            <td> {{$p->pid}} </td>
            <td> {{$p->pnm}} </td>
            <td> {{$p->cid}} </td>
            <td> {{$p->scid}} </td>
            <td> {{$p->price}} </td>
        </tr>
        @endforeach
    </table>
</div>

</body>