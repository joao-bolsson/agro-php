<?php
/**
 * Class to update data.
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @version 2018, Oct 25.
 */

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . '/../../defines.php';

spl_autoload_register(function (string $class_name) {
    include_once $class_name . '.class.php';
});

class Update {

    /**
     * Update user informations.
     *
     * @param int $id User id.
     * @param string $name User name.
     * @param string $email User e-mail.
     * @param string $pass User password.
     */
    public static function updateUser(int $id, string $name, string $email, string $pass) {
        $name = Query::getInstance()->real_escape_string($name);
        $email = Query::getInstance()->real_escape_string($email);
        $pass = crypt($pass, SALT);

        $builder = new SQLBuilder(SQLBuilder::$UPDATE);
        $builder->setTables(['usuario']);
        $builder->setColumns(['nome', 'email', 'senha']);
        $builder->setValues([$name, $email, $pass]);
        $builder->setWhere('id = ' . $id);

        Query::getInstance()->exe($builder->__toString());
    }

    /**
     * Resets user password.
     *
     * @param string $email User e-mail.
     * @return string New random password.
     */
    public static function resetPass(string $email): string {
        $p = Util::randPassword();
        $pass = crypt($p, SALT);

        $builder = new SQLBuilder(SQLBuilder::$UPDATE);
        $builder->setTables(['usuario']);
        $builder->setColumns(['senha']);
        $builder->setValues([$pass]);
        $builder->setWhere("email= '" . $email . "'");

        Query::getInstance()->exe($builder->__toString());

        return $p;
    }

}