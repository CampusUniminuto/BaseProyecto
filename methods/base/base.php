<?php
    include_once '../../../../../config.php';
    require_login(0, false);
    if (isguestuser()) {  // Login as real user!
        $SESSION->wantsurl = (string)new moodle_url('index.php');
        redirect(get_login_url());
    }

    class base {
        //Consultamos datos basicos del Usuario
        public function info_users(){
            global $USER;
            $data_user = array(
                'name' => $USER->firstname." ".$USER->lastname,
                'email' => $USER->email,
                'url_profile' => new \moodle_url('/user/profile.php'), 
                'logout' => new \moodle_url('/login/logout.php')."?sesskey=".$USER->sesskey
            );
            return $data_user;
        }

        //Consultamos las notificaciones del Usuario
        public function info_notificaciones(){
            return "";
        }
    }

?>
  