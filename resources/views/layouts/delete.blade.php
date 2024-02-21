<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Delete</title>
</head>

<?php

use App\bankapp;

$id = "";
$status = "ok";
$request=$_POST;

if (!isset($_POST['check'])) {
    $status = "0";
}

// $id=$request["id"];
if ($status == "ok") {
    $id=$request['id'];
    $bankapp = bankapp::find($id);
    if ($bankapp) {
        $bankapp->delete();
        echo "Delete Successfull";
    } else {
        echo "Id Not Found";
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

                    <input type="submit" name="submit">

                </form>
            </div>
        </div>
    </div>

</body>

</html>