<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();

    use App\login;

    $status="ok";
    $name="";
    $password="";
    if(!isset($_POST['check'])){
        $status="0";
    }
    if($status=="ok"){
        $name=$_POST['name'];
        $password=$_POST['password'];
       
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="check" value="0">
                    <label>Name</label>
                    <input type="text" name="name">
                    <label>Password</label>
                    <input type="text" name="password">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>