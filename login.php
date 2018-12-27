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
        p {
          overflow: hidden;
          text-align: center;
          margin: 10px 0px 0px 0px;
        }
        p:before, p:after {
          background-color: #d0d0d0;
          content: "";
          display: inline-block;
          height: 1px;
          position: relative;
          vertical-align: middle;
          width: 50%;
        }
        p:before {
          right: 0.5em;
          margin-left: -50%;
        }
        p:after {
          left: 0.5em;
          margin-right: -50%;
        }
        a {
            display: block;
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            width: 30%;
            background: #00a600; 
            color: #ffffff;
            border-radius: 5px;
            margin-left: auto;
            margin-right: auto;
            font-weight: bold;
        }
        a:hover{
            color: #ffffff;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <h3>停車場管理系統</h3>
    <form action="manage/index.php" method="post">
        <input type="text" name="Username" required="required" placeholder="帳號" /><br />
        <input type="password" name="Password" required="required" placeholder="密碼" /><br />
        <input type="submit" name="Submit" id="Submit" value="登入">
        <p>或</p>
        <a href="register.php">建立新帳號</a>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
