<?php

class validate
{
    public static $email_pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    public static function isEmail($input)
    {
        return preg_match(self::$email_pattern, $input);
    }
}
$email = 'nhungabc.zom';
echo validate::$email_pattern;
