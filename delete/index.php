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

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "SELECT Name FROM Private WHERE Username = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name);

        echo "<form action=\"delete-confirm.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"Username\" value=\"".$username."\" />";
        echo "<input type=\"hidden\" name=\"Password\" value=\"".$password."\" />";
        while ($stmt->fetch())
            echo "<input type=\"checkbox\" id=\"".$name."\"name=\"Name[]\" value=\"".$name."\" /><label for=\"".$name."\">".$name."<lable><br />";
        echo "<input type=\"submit\" name=\"Submit\" value=\"刪除所選的停車場\" />";
        echo "</form>";
    ?>
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
