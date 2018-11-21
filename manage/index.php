<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
    <h1>停車場管理</h1>
    <?php
        // ini_set("display_errors", "On");
        // error_reporting(E_ALL & ~E_NOTICE);
        $username = $_POST['Username'];
        $password = $_POST['Password'];

        $db = new mysqli('mysql.cs.ccu.edu.tw', 'wtc105u', 'rqXexGSzNw', 'wtc105u_parking');
        $db->query("set names utf8");

        $query = "SELECT Username, Password FROM Users WHERE Username = ? AND Password = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 0) {
            echo "<p>密碼錯誤</p>";
            echo "<a href=\"../login.php\">返回</a>";
            exit;
        }

        $query = "SELECT Name FROM Private WHERE Username = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name);

        echo "<form action=\"info.php\" method=\"post\">";
        while ($stmt->fetch())
            echo "<input type=\"submit\" name=\"Name\" value=\"".$name."\" /><br />";
        echo "</form>";
    ?>
    <form action="add_input.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>">
        <input type="submit" name="Submit" value="新增停車場" />
    </form>
</body>
</html>
