<?php

class PostsModel extends BaseModel
{
    function getAll()
    {
        $statement = self::$db->query("SELECT  posts.id, title, content, date, full_name, user_id " .
            "FROM posts LEFT JOIN users ON posts.user_id = users.id " .
            "ORDER BY date DESC ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getApprove()
    {
        $statement = self::$db->query("SELECT blog.unaccepted_posts.id, title, content, date, full_name, user_id " .
            "FROM blog.unaccepted_posts LEFT JOIN blog.users ON unaccepted_posts.user_id = users.id " .
            "ORDER BY date DESC ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function userCreate(string $title, string $content, int $user_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO unaccepted_posts (title, content, user_id) VALUES (?, ?, ?)");
        $statement->bind_param("ssi", $title, $content, $user_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public static function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM posts WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }


    public static function getApprovePostById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM unaccepted_posts WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public static function getByIdApprovedPost(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM unaccepted_posts WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public static function approvePost(string $id) : bool
    {
        $statement = self::$db->prepare("INSERT INTO posts (title, content, date, user_id) " .
            "SELECT title, content, date, user_id FROM unaccepted_posts WHERE id = ?; ");
        $statement->bind_param("ii", $id);
        $statement->execute();
        $statement = self::$db->prepare("DELETE FROM unaccepted_posts WHERE id = ?;");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }

    function deleteApprovedPost(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM unaccepted_posts WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function edit (string $id, string $title, string $content,
                   string $date, int $user_id) : bool
    {
        $statement = self::$db->prepare("UPDATE posts SET title = ?, " .
                                        "content = ?, date = ?, user_id = ? WHERE id = ?");
        $statement->bind_param("sssii", $title, $content, $date, $user_id, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
}
