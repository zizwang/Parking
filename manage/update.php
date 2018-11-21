<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
    <h1>停車場管理</h1>
    <?php
        $name = $_POST['Name'];
        $remain = $_POST['Remain'];

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "UPDATE Private SET Remain = ? WHERE Name = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('is', $remain, $name);
        $stmt->execute();
    ?>
    <p>更新成功！</p>
    <form action="info.php" method="post">
        <input type="hidden" name="Name" value="<?=$name?>" />
        <input type="submit" name="Submit" value="返回" />
    </form>
</body>
</html>
