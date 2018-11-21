<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
    <form action="manage/index.php" method="post">
        <label for="Username">帳號</label>
        <input type="text" name="Username" id="Username" required="required" /><br />
        <label for="Password">密碼</label>
        <input type="password" name="Password" id="Password" required="required" /><br />
        <a href="register.php">註冊</a>
        <input type="submit" name="Submit" value="登入">
    </form>
</body>
</html>