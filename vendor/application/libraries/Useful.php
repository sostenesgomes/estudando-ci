<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Useful {

    public function encrypt_password($email, $password){
        $md5 = md5(strtolower($email . $password));
        return base64_encode($md5 ^ md5($password));
    }

    public function formatDate($d, $format = 'd/m/Y') {

        if($this->void($d))
            return $d;

        $date = date($format, strtotime($d));
        return $date;
    }

    public function void($text) {
        return !preg_match('/\S/', $text);
    }

    public function populate(&$obj, $data) {
        foreach ($data AS $name => $value) {
            $name = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $name))));
            $method = 'set' . $name;
            if (method_exists($obj, $method)) {
                call_user_func(array($obj, $method), $value);
            } else {
                $obj->{$name} = $value;
            }
        }

        return true;
    }

}

/* End of file Useful.php */