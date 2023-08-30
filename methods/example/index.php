<?php
/* 
 * @package local_editor_uniminuto
 * @author  2023 - Jhoan Avila 
 * Name Archivo
 * Descripcion de Clase
 * Descripcion de Funciones (Datos que recibe, datos que retorna)
*/

include_once '../../../../config.php';
require_login(0, false);
if (isguestuser()) {
    // Login as real user!
    $SESSION->wantsurl = (string)new moodle_url('index.php');
    redirect(get_login_url());
}

class example {

    public static function run() {
        $obj = new self();
        switch ($_POST["opcn"]) {
            case 'get':
                $result = $obj->get_example_simple($_POST["lenght_cursos"]);
                break;
            default:
                # code...
                break;
        }
        echo json_encode($result);
    }

    /**
      * Consultamos una tabla compo ejemplo.
      * @param    array    $data   Datos de origen Ajax.
     */
    public function get_example_simple($total_cursos) {
        global $DB;
        $data_sql = array();

        $data_sql = $DB->get_records_sql("SELECT id, fullname FROM {course} LIMIT ".$total_cursos.";");
        //Si se obtuvo registro 
        if ( !empty($data_sql) ) { 
            return array("state"=>true, "data_courses"=>$data_sql);
        } else {
            return array("state"=>false);
        }
    }

} example::run();
