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

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "SELECT Name, Address, Charge, Total, Remain FROM Private WHERE Name = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name, $address, $charge, $total, $remain);
        $stmt->fetch();

        $max = $total;
        if (!isset($charge))
            $charge = "未提供資訊";
        if (!isset($total)) {
            $total = "未提供資訊";
            $max = 999;
        }
        echo "<p>名稱: ".$name."</p>";
        echo "<p>地址: ".$address."</p>";
        echo "<p>收費方式: ".$charge."</p>";
        echo "<p>總車位數: ".$total."</p>";
    ?>
    <form action="update.php" method="post">
        <label for="Remain">剩餘車位: </label>
        <input type="number" name="Remain" id="Remain" min="0" max="<?=$max?>" value="<?=$remain?>" />
        <input type="hidden" name="Name" value="<?=$name?>" />
        <input type="submit" name="Update" value="Update" />
    </form>
</body>
</html>
