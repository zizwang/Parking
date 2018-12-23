<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
    <h1>停車場管理系統</h1>
    <?php
        $oldname = $_POST['Oldname'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $name = $_POST['Name'];
        $address = $_POST['Address'];
        $charge = $_POST['Charge'];
        $total = $_POST['Total'];

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "UPDATE Private SET Name = ?, Address = ?, Charge = ?, Total = ? WHERE Name = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sssis', $name, $address, $charge, $total, $oldname);
        $stmt->execute();
    ?>
    <p>修改成功！</p>
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
    <form action="index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="編輯" />
    </form>
    <form action="../delete/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="刪除" />
    </form>
</body>
</html>
