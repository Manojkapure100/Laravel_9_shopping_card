<x-header something="customer" pagename="Shopping Cart" />

<script>
    function my1(c){
        alert(c);
    }
</script>

<body>
    <table border="1" align="center">
        <tr>
            <td style="padding-left: 30px;padding-right:30px"> id </td>
            <td style="padding-left: 30px;padding-right:30px"> Product Name </td>
            <td style="padding-left: 30px;padding-right:30px"> Product Price </td>
            <td style="padding-left: 30px;padding-right:30px"> Product Quantity </td>
            <td style="padding-left: 30px;padding-right:30px"> Total </td>
        </tr>
        <!-- {{$c=0}} -->
        <!-- {{$tot=0}} -->
        @foreach($data as $key=>$value)
        <!-- {{$c=$c+1}} -->
        <tr>
            <td> {{$c}} </td>
            <td> {{$nms[$c-1]}} </td>
            <td> {{$prices[$c-1]}} </td>
            <td> {{$value->qty}} </td>
            <td> {{$value->qty * $prices[$c-1]}} </td>
            <!-- {{$tot=$tot+($value->qty * $prices[$c-1])}} -->
        </tr>
        @endforeach
    </table>
    <h3 align="center"> Sub Total : {{$tot}}</h3>
</body>