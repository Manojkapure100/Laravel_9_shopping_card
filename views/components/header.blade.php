<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    <!-- <h1> Hello I am Header Componant in <u>{{ $msg }} </u></h1>
    <h2> {{ $something }} </h2> -->
    <div>
        <?php
        if ($something == "admin") {
            ?>
            <!-- <a href="view1"> Go to View 1 </a><br> -->
            <table align="center">
                <tr>
                    <td style="padding-right:30px;"> <a href="adminHomepage"> Homepage </a> </td>
                    <td style="padding-right:30px;"> <a href="adminCategory"> Category table </a> </td>
                    <td style="padding-right:30px;"> <a href="adminSubcategory"> Sub Category table </a> </td>
                    <td style="padding-right:30px;"> <a href="adminProduct"> Product table </a> </td>
					<td style="padding-right:30px;"> <a href="login"> Logout </a> </td>
                </tr>
            </table>
            <?php
        } else {
            ?>
            <!-- <a href="view2"> Go to View 2 </a> -->
			            <table align="center">
                <tr>
                    <td style="padding-right:100px;"> <a href="customerHomepage"> Homepage </a> </td>
					<td style="padding-right:100px;"> <a href="cart"> Shopping Cart </a> </td>
					<td style="padding-right:50px;"> <a href="login"> Logout </a> </td>
                </tr>
            </table>

            <?php
        }
        ?>
        <h1 align="center"> {{ $pagename }}</h1>

    </div>
</div>