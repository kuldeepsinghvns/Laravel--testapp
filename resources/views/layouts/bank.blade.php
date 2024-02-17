<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Document</title>
</head>

<?php

use App\bankapp;


$name = "";
$banknumber = "";
$balance = "";
$status = "ok";

if (!isset($_POST['check'])) {
    $status = "0";
};

if ($status == "ok") {
    $name = $_POST['name'];
    $banknumber = $_POST['banknumber'];
    $balance = $_POST['balance'];

    $bankapp = new bankapp();
    $bankapp->name = $name;
    $bankapp->banknumber = $banknumber;
    $bankapp->balance = $balance;
    $bankapp->save();
    echo "Save";
} else {
    echo "error";
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