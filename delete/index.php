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
        input[type=checkbox] {
            -webkit-transform: scale(2);
            position: relative;
        }
        label[class=form-check-label] {
            margin: 10px 0px 0px 10px;
            padding: 10px 0px 10px 0px; 
            width: 90%;
            background: #ffffff;
            color: #000079;
            border-radius: 5px;
            font-weight: bold;
            border-color: #ffffff;
        }
        input[type=submit] {
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            width: 45%;
            background: #ea0000;
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
            border-color: #ea0000;
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
	<h3>停車場管理系統</h3>
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
        if ($stmt->num_rows) {
            echo "<form action=\"delete-confirm.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"Username\" value=\"".$username."\" />";
            echo "<input type=\"hidden\" name=\"Password\" value=\"".$password."\" />";
            while ($stmt->fetch()) {
                echo '<div class="form-check">';
                echo "<input class=\"form-check-input\" type=\"checkbox\" id=\"".$name."\"name=\"Name[]\" value=\"".$name."\" />";
                echo "<label class=\"form-check-label\" for=\"".$name."\">".$name."<lable>";
                echo '</div>';
            }
            echo "<input type=\"submit\" name=\"Submit\" value=\"刪除所選的停車場\" />";
            echo "</form>";
        }
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
