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
    ?>
    <form action="add.php" method="post">
    	<p>*為必須輸入</p>
    	<label for="Name">*名稱</label>
    	<input type="text" name="Name" id="Name" required="required" /><br />
    	<label for="Address">*地址</label>
    	<input type="text" name="Address" id="Address" required="required" /><br />
    	<label for="Charge">收費方式</label>
    	<input type="text" name="Charge" id="Charge" /><br />
    	<label for="Total">總車位數</label>
    	<input type="number" name="Total" id="Total" min="0" max="999" /><br />
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="新增停車場" />
    </form>
    <form action="../manage/index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="主頁" />
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <input type="submit" name="Submit" value="新增" />
    </form>
    <form action="../edit/index.php" method="post">
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
