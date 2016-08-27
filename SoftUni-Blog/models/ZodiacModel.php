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
        //Пресмята деня днес в 00:00:00 часа
        //$dateNow = date("Y-m-d H:i:s", strtotime("now", mktime(0, 0, 0)));
        //Пресмята деня утре в 00:00:00 часа
        //$dateAfterOneDay = date("Y-m-d H:i:s", strtotime("+1 day", mktime(0, 0, 0)));

        // TODO: 
        //SELECT * FROM blog.zodiacs where (
        //    date BETWEEN
        //    '2016-08-21 14:11:20'
        //    AND
        //    '2016-08-25 03:04:19')
        // AND zodiac_type = 'year'
        // AND zodiac_sign = 'риби'
        // ORDER BY DATE desc;

        $statement = self::$db->query("SELECT * FROM blog.zodiacs WHERE zodiac_type = 'daily' AND DATE(`date`) = DATE(CURDATE());");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getMonth()
    {
        //Пресмята деня днес в 00:00:00 часа
        $dateNow = date("Y-m-d H:i:s", strtotime("now", mktime(0, 0, 0)));
        //Пресмята деня след един месец в 00:00:00 часа
        $dateAfterOneMonth = date("Y-m-d H:i:s", strtotime("+1 month", mktime(0, 0, 0)));

        $query = "SELECT * FROM blog.zodiacs WHERE date BETWEEN " .
            "'" .$dateNow . "'" .
            " AND ".
            "'" . $dateAfterOneMonth . "'" .
            " ORDER BY DATE desc;";

        $statement = self::$db->query($query);
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getYear()
    {
        //Пресмята деня днес в 00:00:00 часа
        $dateNow = date("Y-m-d H:i:s", strtotime("now", mktime(0, 0, 0)));
        //Пресмята деня след една година в 00:00:00 часа
        $dateAfterOneYear = date("Y-m-d H:i:s", strtotime("+1 year", mktime(0, 0, 0)));

        $query = "SELECT * FROM blog.zodiacs WHERE date BETWEEN " .
            "'" .$dateNow . "'" .
            " AND ".
            "'" . $dateAfterOneYear . "'" .
            " ORDER BY DATE desc;";

        $statement = self::$db->query($query);
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getAllTypeOfSign(){
        $statement = self::$db->query("SELECT * FROM blog.zodiacs WHERE zodiac_type = 'daily' AND DATE(`date`) = DATE(CURDATE());");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function create(string $content, string $date, string $zodiac_sign, $zodiac_type) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO zodiacs (content, date, zodiac_sign, zodiac_type) VALUES (?, ?, ?, ?)");
        $statement->bind_param("ssss", $content, $date, $zodiac_sign, $zodiac_type);
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

    public function edit (int $id,string $zodiac,string $content,string $date,string $zodiac_type) : bool
    {
        $statement = self::$db->prepare("UPDATE zodiacs SET zodiac_sign = ?, " .
            "content = ?, date = ?, zodiac_type = ? WHERE id = ?");
        $statement->bind_param("ssssi", $zodiac, $content, $date, $zodiac_type, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
}
