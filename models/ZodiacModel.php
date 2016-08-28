<?php

class ZodiacModel extends BaseModel
{
//    TODO: Модела не е готов.
    function getAll()
    {
        $statement = self::$db->query("SELECT * FROM blog.zodiacs");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getDaily()
    {
        $statement = self::$db->query("SELECT * FROM `blog`.`zodiacs` WHERE zodiac_type = 'daily' ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getMonth()
    {
        $statement = self::$db->query("SELECT * FROM blog.zodiacs WHERE zodiac_type = 'month'");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getYear()
    {
               $statement = self::$db->query("SELECT * FROM blog.zodiacs WHERE zodiac_type = 'year'");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getAllTypeOfSign(){
        $statement = self::$db->query("SELECT * FROM blog.zodiacs WHERE zodiac_type = 'daily'");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function create(string $content, string $zodiac_sign, $zodiac_type) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO zodiacs (content, zodiac_sign, zodiac_type) VALUES (?, ?, ?)");
        $statement->bind_param("sss", $content, $zodiac_sign, $zodiac_type);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public static function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM zodiacs WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM zodiacs WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function edit (int $id,string $zodiac,string $content, string $zodiac_type) : bool
    {
        $statement = self::$db->prepare("UPDATE zodiacs SET zodiac_sign = ?, " .
            "content = ?, date = ?, zodiac_type = ? WHERE id = ?");
        $statement->bind_param("sssi", $zodiac, $content, $zodiac_type, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
}
