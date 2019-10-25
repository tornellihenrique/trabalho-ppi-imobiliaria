<?php

class Login {

    public static function isLoggedIn() {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyPassword($password, $pHash) {
        return password_verify($password, $pHash);
    }

    public static function getUser($username) {
        return Database::query("SELECT * FROM funcionarios WHERE usuario = :usuario", array(':usuario'=>$username));
    }

    public static function loginUser($username, $password) {
        $user = self::getUser($username);

        if (empty($user)) {
            Toast::showToast('Usuário ou senha incorretos!');
            return false;
        }

        if (self::verifyPassword($password, $user[0]['senha'])) {
            $_SESSION['username'] = $user[0]['usuario'];
            Toast::showToast('Login bem sucedido!');
            return true;
        } else {
            Toast::showToast('Usuário ou senha incorretos!');
            return false;
        }
    }

    public static function logout() {
        session_destroy();
    }

}
