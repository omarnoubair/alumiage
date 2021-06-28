<?php

class Session {

    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setNotification($message, $type = 'success') {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    public function getNotification() {
        if (isset($_SESSION['flash']['message'])) {

            $html = '<div class="alert alert-';
            $html .= $_SESSION['flash']['type'];
            $html .= '">';
            $html .= '<a class="close" data-dismiss="alert">×</a>';
            $html .= $_SESSION['flash']['message'];
            $html .= '</div>';

            $_SESSION['flash'] = array();

            return $html;
        }
    }

    public function write($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function read($key = null) {
        if ($key) {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }

            return false;
        }

        return $_SESSION;
    }

    public function delete($key) {
        unset($_SESSION[$key]);
    }

    public function checkLogin() {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public function checkAdmin() {

        if (isset($_SESSION['user']) && $_SESSION['user']->role == 0) {

            return true;
        } else {
            return false;
        }
    }

    public function checkProf() {

        if ($_SESSION['user']->role == 1) {

            return true;
        } else {
            return false;
        }
    }

       public function checkStudent() {

        if ($_SESSION['user']->role == 4) {

            return true;
        } else {
            return false;
        }
    }
    public function checkMma() {

        if ($_SESSION['user']->role == 2) {

            return true;
        } else {
            return false;
        }
    }
    public function checkAncien() {

        if ($_SESSION['user']->role == 3) {

            return true;
        } else {
            return false;
        }
    }
    
    public function user($key) {
        if ($this->read('user')) {
            if (isset($this->read('user')->$key)) {
                return $this->read('user')->$key;
            } else {
                return false;
            }
        }

        return false;
    }

}
