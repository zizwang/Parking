<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
    <h1>停車場管理系統</h1>
    <?php
        $nameArray = $_POST['Name'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");
        
        foreach ($nameArray as $name) {
            $query = "DELETE FROM Private WHERE Name = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $name);
            $stmt->execute();
        }
    ?>
    <p>刪除成功！</p>
    <form action="../manage/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="回主頁" />
    </form>
    <form action="../manage/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="主頁" />
    </form>
    <form action="../add/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="新增" />
    </form>
    <form action="../edit/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="編輯" />
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="刪除" />
    </form>
</body>
</html>
