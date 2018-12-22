<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
    <h1>停車場管理系統</h1>
    <?php
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $name = $_POST['Name'];
        $address = $_POST['Address'];
        $charge = $_POST['Charge'];
        $total = $_POST['Total'];

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "INSERT INTO Private VALUES (?, ?, ?, ?, ?, 0, 0, 0)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssssi', $username, $name, $address, $charge, $total);
        $stmt->execute();
    ?>
    <p>新增成功！</p>
    <form action="index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="回到管理頁面" />
    </form>
</body>
</html>
