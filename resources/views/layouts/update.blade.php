<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Update</title>
</head>

<?php

use App\bankapp;

$id = "";
$name = "";
$banknumber = "";
$balance = "";
$status = "ok";

if (!isset($_POST['check'])) {
    $status = "0";
}

// $id=$request["id"];

if ($status == "ok") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $banknumber = $_POST['banknumber'];
    $balance = $_POST['balance'];

    $bankapp = bankapp::find($id);

    if (!$bankapp) {
        $bankapp = new bankapp();
    }
    $bankapp->name = $name;
    $bankapp->banknumber = $banknumber;
    $bankapp->balance = $balance;
    if ($status == "ok") {
        $bankapp->save();
        echo "Save";
    } else {
        echo "error";
    }
}

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="check" value="0">
                    <label>Id</label>
                    <input type="text" name="id"><br>
                    <label>Name</label>
                    <input type="text" name="name"><br>
                    <label>BankNumber</label>
                    <input type="text" name="banknumber"><br>
                    <label>Balance</label>
                    <input type="text" name="balance"><br>
                    <input type="submit" name="submit">

                </form>
            </div>
        </div>
    </div>

</body>

</html>