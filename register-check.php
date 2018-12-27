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
        p {
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            font-size: 150%;
            font-weight: bold;
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
    <?php
        $username = $_POST['Username'];
        $password1 = $_POST['Password1'];
        $password2 = $_POST['Password2'];

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "SELECT Username FROM Users WHERE Username = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo "<p>此帳號已有人使用</p>";
            echo "<a href=\"register.php\">返回</a>";
            exit;
        }

        if ($password1 != $password2) {
            echo "<p>密碼與確認密碼不一致</p>";
            echo "<a href=\"register.php\">返回</a>";
            exit;
        }

        $query = "INSERT INTO Users VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $username, $password1);
        $stmt->execute();
    ?>
    <p>註冊成功！</p>
    <form action="manage/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>">
        <input type="hidden" name="Password" value="<?=$password1?>">
        <input type="submit" name="Submit" value="登入">
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
