<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>停車場管理系統</title>
    <style type="text/css">
        body {
            padding-top: 60px;
            text-align: center;
            background: #d2e9ff;
        }
        h3 {
            position: fixed;
            top: 0px;
            width: 100%;
            background: #004b97;
            color: #ffffff;
            padding: 10px 0px 10px 0px;
            font-weight: bold;
            z-index: 1;
        }
        a {
            display: block;
            text-align: left;
            font-size: 150%;
            position: fixed;
            top: 5px;
            left: 5%;
            color: #ffffff;
            font-weight: bold;
            z-index: 2;
        }
        a:hover{
            color: #ffffff;
            text-decoration:none;
        }
        input[type=text]{
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 10px;
            width: 90%;
            border-radius: 5px;
        }
        input[type=password]{
            margin: 0px 0px 0px 0px;
            padding: 10px 0px 10px 10px;
            width: 90%;
            border-radius: 5px;
        }
        input[type=submit] {
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            width: 90%;
            background: #0072e3;
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
            border-color: #0072e3;
        }
    </style>
</head>
<body>
    <h3>停車場管理系統</h3>
    <a href="login.php"><</a>
    <form action="register-check.php" method="post">
        <input type="text" name="Username" id="Username" required="required" placeholder="帳號" /><br />
        <input type="password" name="Password1" id="Password1" required="required" placeholder="密碼" /><br />
        <input type="password" name="Password2" id="Password2" required="required" placeholder="確認密碼" /><br />
        <input type="submit" name="Submit" value="註冊">
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
