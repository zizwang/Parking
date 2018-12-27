<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>停車場管理系統</title>
    <style type="text/css">
        body {
            padding: 60px 0px 60px 0px;
            text-align: center;
            background: #d2e9ff;
        }
        h3 {
            position: fixed;
            top: 0px;
            width: 100%;
            background: #004b97;
            color: #ffffff;
            padding: 10px 0px 10px 0px;
            font-weight: bold;
            z-index: 1;
        }
        p[class=name] {
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            width: 90%;
            background: #ffffff;
            color: #000079;
            border-radius: 5px;
            font-weight: bold;
            border-color: #ffffff;
            margin-left: auto;
            margin-right: auto;
        }
        p[class=q] {
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            font-size: 150%;
            font-weight: bold;
        }
        input[type=submit] {
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            width: 30%;
            background: #ea0000;
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
            border-color: #ea0000;
        }
        input[class=yes] {
            float: left;
            position: relative;
            left: 15%;
        }
        input[class=no] {
            position: relative;
            left: 5%;
            background: #00a600;
            border-color: #00a600;
        }
        input[class~=bar] {
            background: #004b97;
            width: 100%;
            margin: 0px 0px 0px 0px;
            border-color: #004b97;
            border-radius: 0px;
        }
        input[class~=active] {
            background: #0072e3;
            border-color: #0072e3;
        }
        .column {
            width: 25%;
            float: left;
        }
    </style>
</head>
<body>
	<?php
        $nameArray = $_POST['Name'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
    ?>
    <h3>停車場管理系統</h3>
    <?php
        foreach ($nameArray as $name)
            echo "<p class=\"name\">".$name."</p>";
        echo "<p class=\"q\">確定要刪除這些停車場嗎？</p>";

        echo "<form action=\"delete.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"Username\" value=\"".$username."\" />";
        echo "<input type=\"hidden\" name=\"Password\" value=\"".$password."\" />";
        foreach ($nameArray as $name)
            echo "<input type=\"hidden\" name=\"Name[]\" value=\"".$name."\" />";
        echo "<input type=\"submit\" name=\"Submit\" class=\"yes\" value=\"✓ 是\" />";
        echo "</form>";
        
        echo "<form action=\"index.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"Username\" value=\"".$username."\" />";
        echo "<input type=\"hidden\" name=\"Password\" value=\"".$password."\" />";
        echo "<input type=\"submit\" name=\"Submit\" class=\"no\" value=\"✘ 否\" />";
        echo "</form>";
    ?>
	<div class="fixed-bottom">
        <form action="../manage/index.php" method="post" class="column">
            <input type="hidden" name="Username" value="<?=$username?>" />
            <input type="hidden" name="Password" value="<?=$password?>" />
            <input type="submit" name="Submit" id="manage" class="bar" value="♞ 主頁" />
        </form>
        <form action="../add/index.php" method="post" class="column">
            <input type="hidden" name="Username" value="<?=$username?>" />
            <input type="hidden" name="Password" value="<?=$password?>" />
            <input type="submit" name="Submit" id="add" class="bar" value="✚ 新增" />
        </form>
        <form action="../edit/index.php" method="post" class="column">
            <input type="hidden" name="Username" value="<?=$username?>" />
            <input type="hidden" name="Password" value="<?=$password?>" />
            <input type="submit" name="Submit" id="edit" class="bar" value="✎ 編輯" />
        </form>
        <form action="index.php" method="post" class="column">
            <input type="hidden" name="Username" value="<?=$username?>" />
            <input type="hidden" name="Password" value="<?=$password?>" />
            <input type="submit" name="Submit" id="delete" class="bar active" value="✘ 刪除" />
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
