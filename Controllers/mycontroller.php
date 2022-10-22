<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View\Components\header;
use resources\views\manage\managedata;
use Illuminate\Support\Facades\DB;

class mycontroller extends Controller
{

    //-----------  Login And Signup ------------------------

    function loginCheck(Request $r)
    {
        $count = DB::table("cridentials")->where("username", $r->unm)->where("password", $r->psw)->count();
        if ($count == 1) {
            $user = DB::table("cridentials")->where("username", $r->unm)->where("password", $r->psw)->select("type")->get();
            $type = $user[0]->type;
            $myid = DB::table("cridentials")->where("username", $r->unm)->where("password", $r->psw)->get("id");
            if ($type == 'a') {
                $r->session()->flush();
                $r->session()->put("userid", $myid);
                return view("adminHomepage");
            } else {
                $r->session()->flush();
                $r->session()->put("userid", $myid);
                return view("customerHomepage");
                
            }
        } else {
            echo "<script> alert(\" Invalid Username and Password \") </script>";
            return view("login");
        }
    }

    function registrationcheck(Request $r)
    {
        $c = db::table("cridentials")->where("username", $r->unm)->count();
        if ($c >= 1) {
            echo "<script> alert('Username Already exist');window.location.href='registeration' </script>";
        } else {
            $is_inserted = db::insert("insert into cridentials (id,username,password,type) values(?,?,?,?)", [null, $r->unm, $r->psw, 'c']);
            if ($is_inserted) {

                echo "<script> alert('Customer Register Succesfully');window.location.href='login' </script>";
            } else {
                echo "<script> alert('Customer Register Fail');window.location.href='registeration' </script>";
            }
        }
    }

    //---------------------------------------------


    //----------- HomePages ------------------------

    function adminHomepage()
    {
        return view("adminHomepage");
    }
    function customerHomepage()
    {
        return view("customerHomepage");
    }
    //----------------------------------------------

    function cart(Request $r)
    {
        $uid = $r->session()->get("userid")[0]->id;
        $odata = db::table("myorder")->where("uid", $uid)->get();
        $prices = [];
        $nm = [];
        foreach ($odata as $key => $value) {

            $d = db::table("product")->where("pid", $value->pid)->get();
            array_push($prices, $d[0]->price);
            array_push($nm, $d[0]->pnm);
        }

        return view("cart", ["data" => $odata, "prices" => $prices, "nms" => $nm]);
    }

    function adminCategory()
    {
        $data = db::table("category")->get();
        return view("adminCategory",["allc"=>$data]);
    }
    function addCategory(Request $r)
    {
        DB::insert("insert into category(cid,cnm) values(?,?)", [null, $r->nm]);
        return redirect("adminCategory");
    }

    function adminSubcategory()
    {
        $data = db::table("subcategory")->get();
        $d = DB::table("category")->get();
        return view("adminSubcategory", ["mydata" => $d,"allsc"=>$data]);
    }
    function addSubcategory(Request $r)
    {
        DB::insert("insert into subcategory(scid,scnm,cid) values(?,?,?)", [null, $r->nm, $r->c]);
        return redirect("adminSubcategory");
    }

    function adminProduct()
    {
        $data = db::table("product")->get();
        $d = DB::table("category")->get();
        return view("adminProduct", ["mydata" => $d,"allp"=>$data]);
    }
    function addProduct(Request $r)
    {
        DB::insert("insert into product(pid,pnm,cid,scid,price) values(?,?,?,?,?)", [null, $r->nm, $r->c, $r->sc, $r->price]);
        return redirect("adminProduct");
    }

    function getdata(Request $r)
    {
        // return view("\manage\managedata");
        echo $r->unm . "-->" . $r->psw;
    }


    // AJAX START FROM HERE

    function getorderall(Request $r)
    {
        $data = db::table("myorder")->get();
?>
        <table border="1" align="center">
            <tr>
                <td style="padding-left: 30px;padding-right: 30px;"> order Id </td>
                <td style="padding-left: 30px;padding-right: 30px;"> user id </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product id </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product qty </td>
                <td style="padding-left: 30px;padding-right: 30px;"> order date </td>
            </tr>
            <tr> <?php
                    foreach ($data as $key => $value) {
                        echo "<tr>";
                        // echo "<script> alert(\""+ $value->cid+"->"+$value->scid+"\"); </script>";
                        echo "<td> $value->oid </td>";
                        echo "<td> $value->uid </td>";
                        echo "<td> $value->pid </td>";
                        echo "<td> $value->qty </td>";
                        echo "<td> $value->dt </td>";
                        // echo "<td> <button onclick='addcart($value->pid);'> Add To Cart </button> </td>";
                        echo "</tr>";
                    }
                    ?>
            </tr>
        </table>
    <?php
    }

    function getorderdatewise(Request $r)
    {
        $from = $r->from;
        $to = $r->to;
        if ($from == "" || $to == "") {
            $data = db::table("myorder")->get();
        } else {
            if ($from <= $to) {
                $l = $from;
                $g = $to;
            } else {
                $g = $from;
                $l = $to;
            }
            $data = db::table("myorder")->where("dt", ">=", $l)->where("dt", "<=", $g)->get();
        }
    ?>
        <table border="1" align="center">
            <tr>
                <td style="padding-left: 30px;padding-right: 30px;"> order Id </td>
                <td style="padding-left: 30px;padding-right: 30px;"> user id </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product id </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product qty </td>
                <td style="padding-left: 30px;padding-right: 30px;"> order date </td>
            </tr>
            <tr> <?php
                    foreach ($data as $key => $value) {
                        echo "<tr>";
                        // echo "<script> alert(\""+ $value->cid+"->"+$value->scid+"\"); </script>";
                        echo "<td> $value->oid </td>";
                        echo "<td> $value->uid </td>";
                        echo "<td> $value->pid </td>";
                        echo "<td> $value->qty </td>";
                        echo "<td> $value->dt </td>";
                        // echo "<td> <button onclick='addcart($value->pid);'> Add To Cart </button> </td>";
                        echo "</tr>";
                    }
                    ?>
            </tr>
        </table>
    <?php

    }

    function chkname(Request $r)
    {
        // return "hello";
        $c = db::table("cridentials")->where("username", $r->val)->count();
        if ($c >= 1) {
            return "<b style='color:red'> Username Already Exist </b>";
        } else {
            return "<b style='color:green'> Username is Available </b>";
        }
    }
    function needsc(Request $r)
    {
        $c = $r->val;
        $sc = db::table("subcategory")->where("cid", $c)->get();
        echo "<select name='sc' onchange='myp(this.value)'>";
        foreach ($sc as $key => $value) {
            echo "<option value='$value->scid'> $value->scnm </option>";
        }
        echo "</select>";
        //return "hello brother $sc";
    }
    function custhomeajax(Request $r)
    {
        $mc = $r->val;
        $msc = db::table("category")->get();
        echo "<select name='c' onchange='fsc(this.value);myp(this.value)'>";
        foreach ($msc as $key => $value) {
            echo "<option value='$value->cid'> $value->cnm </option>";
        }
        echo "</select>";
        //return "hello brother $sc";
    }
    function storeid(Request $r)
    {
        $pid = $r->pid;
        $qty = $r->qty;
        $uid = $r->session()->get("userid")[0]->id;
        $count = db::table("myorder")->where("uid", $uid)->where("pid", $pid)->count();
        if ($count == 0) {
            $is_success = db::insert("insert into myorder (oid,uid,pid,qty) values(?,?,?,?)", [null, $uid, $pid, $qty]);
            if ($is_success) {
                return "Added Successfully";
            } else {
                return "Not Added, something went wrong";
            }
        } else {
            return "Product Already Exist in your Cart";
        }
    }
    // storeid
    function myp(Request $r)
    {
        $mc = $r->val;
        $msc = db::table("product")->where("scid", $mc)->get();
        // echo "<select name='c' onchange='fsc(this.value)'>";
    ?>
        <table border="1" align="center">
            <tr>
                <td style="padding-left: 30px;padding-right: 30px;"> Product Id </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product Name </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product Price </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product Category </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Product Sub Category </td>
                <td style="padding-left: 30px;padding-right: 30px;"> Add To Cart </td>
            </tr>
            <tr> <?php
                    foreach ($msc as $key => $value) {
                        echo "<tr>";
                        // echo "<script> alert(\""+ $value->cid+"->"+$value->scid+"\"); </script>";
                        echo "<td> $value->pid </td>";
                        echo "<td> $value->pnm </td>";
                        echo "<td> $value->price </td>";
                        echo "<td> $value->cid </td>";
                        echo "<td> $value->scid </td>";
                        echo "<td> <button onclick='addcart($value->pid);'> Add To Cart </button> </td>";
                        echo "</tr>";
                    } ?>
            </tr>
        </table>
<?php
    }
    // myp
}
