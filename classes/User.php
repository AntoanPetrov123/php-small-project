<?php
/**
 * Summary of User
 */
class User
{
    /**
     * Summary of authenticate
     * @param string $username Username
     * @param string $password Password
     * 
     * @return boolean True if the credentials are correct, false otherwise
     */
    public static function authenticate($username, $password)
    {
        return $username == 'antoan' && $password == 'secret';
    }
}