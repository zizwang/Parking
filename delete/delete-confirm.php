<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>停車場管理系統</title>
</head>
<body>
	<?php
        $nameArray = $_POST['Name'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
    ?>
    <form action="index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="<" />
    </form>
    <h1>停車場管理系統</h1>
    <?php
        foreach ($nameArray as $name)
            echo "<p>".$name."</p>";
        echo "<p>確定要刪除這些停車場嗎？</p>";

        echo "<form action=\"delete.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"Username\" value=\"".$username."\" />";
        echo "<input type=\"hidden\" name=\"Password\" value=\"".$password."\" />";
        foreach ($nameArray as $name)
            echo "<input type=\"hidden\" name=\"Name[]\" value=\"".$name."\" />";
        echo "<input type=\"submit\" name=\"Submit\" value=\"是\" />";
        echo "</form>";
        
        echo "<form action=\"index.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"Username\" value=\"".$username."\" />";
        echo "<input type=\"hidden\" name=\"Password\" value=\"".$password."\" />";
        echo "<input type=\"submit\" name=\"Submit\" value=\"否\" />";
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
