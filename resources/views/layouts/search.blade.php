<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Find</title>
</head>

<?php
use Illuminate\Support\Facades\DB;
use App\bankapp;


$name = "";
$banknumber = "";
$balance = "";
$status = "ok";

if (!isset($_POST['check'])) {
    $status = "0";
}

if ($status == "ok") {
    $banknumber = $_POST['banknumber'];
    
    $bankapp = DB::table('bankapp')->where([
        ['banknumber', '=', $banknumber],
       
    ])->first();
if($bankapp){
    echo "Record is name: {$bankapp->name}, Banknumber : {$bankapp->banknumber}, Balance:{$bankapp->balance}";
}
else{
     echo"Data Not found";
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
                   
                    <label>BankNumber</label>
                    <input type="text" name="banknumber">
                    
                    <input type="submit" name="submit">

                </form>
            </div>
        </div>
    </div>

</body>

</html>