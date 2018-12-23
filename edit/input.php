<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
    <?php
        $name = $_POST['Name'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $oldname = $name;
    ?>
    <form action="index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="<" />
    </form>
    <h1>停車場管理系統</h1>
    <?php
        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "SELECT Address, Charge, Total, Remain FROM Private WHERE Name = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($address, $charge, $total, $remain);
        $stmt->fetch();

        $max = $total;
        if (!isset($charge))
            $charge = "";
        if (!isset($total))
            $total = 0;
    ?>
    <form action="edit.php" method="post">
        <p>*為必須輸入</p>
        <label for="Name">*名稱</label>
        <input type="text" name="Name" id="Name" required="required" value="<?=$name?>" /><br />
        <label for="Address">*地址</label>
        <input type="text" name="Address" id="Address" required="required" value="<?=$address?>" /><br />
        <label for="Charge">收費方式</label>
        <input type="text" name="Charge" id="Charge" value="<?=$charge?>" /><br />
        <label for="Total">總車位數</label>
        <input type="number" name="Total" id="Total" min="0" max="999" value="<?=$total?>" /><br />
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="hidden" name="Oldname" value="<?=$oldname?>" />
        <input type="submit" name="Submit" value="完成" />
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
</body>
</html>