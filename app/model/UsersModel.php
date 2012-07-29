<?php
/**
 * The Users model
 *
 * @author Pavel Ptacek
 */
class UsersModel extends BaseModel implements \Nette\Security\IAuthenticator {
    /**
     * Performs an authentication
     * @param  array
     * @return Nette\Security\Identity
     * @throws UserDoesNotExistsException
     * @throws UserPasswordIncorrectException
     */
    public function authenticate(array $credentials) {
        list($username, $password) = $credentials;


        $row = $this->database->select('*')->from('users')->where('[username] = %s', $username)->fetch();

        if (!$row) {
            throw new UserDoesNotExistsException('The username or password is incorrect.', self::IDENTITY_NOT_FOUND);
        }

        if ($row->password !== self::calculateHash($password, $row->password)) {
            throw new UserPasswordIncorrectException('The username or password is incorrect.', self::INVALID_CREDENTIAL);
        }

        unset($row->password);
        return new \Nette\Security\Identity($row->id, $row->role, $row->toArray());
    }

    /**
     * Computes salted password hash.
     * @param  string
     * @param  string
     * @return string
     */
    public static function calculateHash($password, $salt = null) {
        if($salt === null) {
            $salt = '$2a$07$' . md5(uniqid(time())) . '$';
        }

        return crypt($password, $salt);
    }

    /**
     * Setup ACL
     *
     * @static
     * @param GlobalAcl $acl
     */
    public static function setAcl(GlobalAcl $acl) {
        // set acl regarding users in here...
    }
}

/**
 * The specified user doesn't exists
 */
class UserDoesNotExistsException extends \Nette\Security\AuthenticationException {}

/**
 * The password is incorrect
 */
class UserPasswordIncorrectException extends \Nette\Security\AuthenticationException {}

/**
 * The usermockup class
 */
class UserMockup extends DibiRow {
    /** @var int */
    public $id;

    /** @var string */
    public $username;

    /** @var string */
    public $password;

    /** @var string */
    public $role;
}