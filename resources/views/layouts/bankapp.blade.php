<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="http://localhost/testapp/public/api/bankpost">
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