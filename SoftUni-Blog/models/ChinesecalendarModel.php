<?php

class ChinesecalendarModel extends BaseModel
{
//    TODO: Модела не е готов.
    function getAll()
    {
        $statement = self::$db->query("SELECT * FROM blog.chinese_zodiacs");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    
    

    public function create(string $content, string $date, string $zodiac_sign) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO chinese_zodiacs (content, date, zodiac_sign) VALUES (?, ?, ?)");
        $statement->bind_param("sss", $content, $date, $zodiac_sign);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public static function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM chinese_zodiacs WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM chinese_zodiacs WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function edit (int $id, string $content,
                          string $date, string $zodiac_sign) : bool
    {
        $statement = self::$db->prepare("UPDATE chinese_zodiacs SET " .
            "content = ?, date = ?, zodiac_sign = ? WHERE id = ?");
        $statement->bind_param("sssi", $content, $date, $zodiac_sign, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
}
