<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
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
        $stmt->bind_param('sss', $username, $password1);
        $stmt->execute();
    ?>
    <p>註冊成功！</p>
    <form action="manage/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>">
        <input type="hidden" name="Password" value="<?=$password1?>">
        <input type="submit" name="Submit" value="立即登入">
    </form>
</body>
</html>
