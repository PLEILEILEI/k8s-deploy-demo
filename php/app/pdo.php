<?php
class Db {
    function getUser($selectName) {
        $host = 'IP:3306';
        $database = 'test_db';
        $username = 'root';
        $password = 'root';
        if (empty($selectName)) {
            echo "params error";
        }
	date_default_timezone_set("Asia/Shanghai");

        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->exec("set names 'utf8'");
        $sql = "select * from user_time where name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($selectName));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($row)) {
            $time = date("Y-m-d H:i:s",time());
            $last_time = $row['last_time'];

            $update = $pdo->prepare('update user_time set last_time = ? where name = ?');
            $update->bindParam(1, $time, PDO::PARAM_STR);
            $update->bindParam(2, $selectName, PDO::PARAM_STR);
            $result = $update->execute();
            return "your last login time : ".$last_time;
        } else {
            $last_time = date("Y-m-d H:i:s",time());
            $update = $pdo->prepare('INSERT INTO user_time (name, last_time) VALUES (?,?)');
            $update->bindParam(1, $selectName, PDO::PARAM_STR);
            $update->bindParam(2, $last_time, PDO::PARAM_STR);
            $result = $update->execute();
            return "first login";
        }
    }
}
