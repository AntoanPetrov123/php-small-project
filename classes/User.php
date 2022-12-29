<?php
/**
 * Summary of User
 */
class User
{
    /**
     * Unique id
     * @var integer
     * Unique username
     * @var string
     * Password
     * @var string
     */
    public $id;
    public $username;
    public $password;

    /**
     * Summary of authenticate
     * @param string $username Username
     * @param string $password Password
     * 
     * @return mixed True if the credentials are correct, null otherwise
     */
    public static function authenticate($username, $password, $conn)
    {
        $sql = "SELECT *
                FROM user
                WHERE username = :username";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute();


        if ($user = $stmt->fetch()) {
            return password_verify($password, $user->password);
        }
    }
}