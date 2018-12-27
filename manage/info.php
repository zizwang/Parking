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
        p[class=p] {
            margin: 10px 0px 0px 0px;
            padding: 0px 0px 0px 0px; 
            font-size: 150%;
            font-weight: bold;
            text-align: left;
            position: relative;
            left: 5%;
            width: 90%;
        }
        p[class=info] {
            padding: 10px 0px 10px 0px; 
            font-size: 120%;
            width: 90%;
            position: relative;
            left: 5%;
            background-color: #ffffff;
            border-radius: 5px;
        }
        input[type=submit] {
            margin: 10px 0px 0px 0px;
            padding: 10px 0px 10px 0px; 
            width: 30%;
            background: #00a600; 
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
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
        .input-group {
            margin: 0px 0px -20px 0px;
            width: 90%;
            position: relative;
            left: 5%;
        }
    </style>
</head>
<body>
    <?php
        $name = $_POST['Name'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
    ?>
    <h3>停車場管理系統</h3>
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
        if (!isset($charge) || $charge == "")
            $charge = "未提供資訊";
        if (!isset($total) || $total == 0) {
            $total = "未提供資訊";
            $max = 999;
        }
        echo "<p class=\"p\">名稱</p>";
        echo "<p class=\"info\">".$name."</p>";
        echo "<p class=\"p\">地址</p>";
        echo "<p class=\"info\">".$address."</p>";
        echo "<p class=\"p\">收費方式</p>";
        echo "<p class=\"info\">".$charge."</p>";
        echo "<p class=\"p\">總車位數</p>";
        echo "<p class=\"info\">".$total."</p>";
    ?>
    <form action="update.php" method="post">
        <input type="hidden" name="Username" value="<?=$username?>" />
        <input type="hidden" name="Password" value="<?=$password?>" />
        <p class="p">剩餘車位</p>
        <input type="number" name="Remain" min="0" max="<?=$max?>" value="<?=$remain?>" /><br />
        <input type="hidden" name="Name" value="<?=$name?>" />
        <input type="submit" name="Update" value="Update" />
    </form>
    <div class="fixed-bottom">
        <form action="index.php" method="post" class="column">
            <input type="hidden" name="Username" value="<?=$username?>" />
            <input type="hidden" name="Password" value="<?=$password?>" />
            <input type="submit" name="Submit" id="manage" class="bar active" value="♞ 主頁" />
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
        <form action="../delete/index.php" method="post" class="column">
            <input type="hidden" name="Username" value="<?=$username?>" />
            <input type="hidden" name="Password" value="<?=$password?>" />
            <input type="submit" name="Submit" id="delete" class="bar" value="✘ 刪除" />
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../bootstrap-input-spinner.js"></script>
    <script type="text/javascript">
        $("input[type='number']").inputSpinner();
    </script>
</body>
</html>
