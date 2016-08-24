<?php

class AdminModel extends BaseModel
{
//    TODO: Модела не е готов.
    function getAll()
    {
        $statement = self::$db->query("SELECT  posts.id, title, content, date, full_name, user_id " .
            "FROM posts LEFT JOIN users ON posts.user_id = users.id " .
            "ORDER BY date DESC ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getLatestPosts(int $maxcount) {
        $statement = self::$db->query("SELECT  posts.id, title, content, date, full_name " .
            "FROM posts LEFT JOIN users ON posts.user_id = users.id " .
            "ORDER BY date DESC LIMIT " . $maxcount);
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getPostById(int $id) {
        $statement = self::$db->prepare(
            "SELECT posts.id, title, content, date, full_name " .
            "FROM posts LEFT JOIN users ON posts.user_id = users.id " .
            "WHERE posts.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }
}
