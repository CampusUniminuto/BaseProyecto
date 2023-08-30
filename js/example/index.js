/* 
 * @package local_editor_uniminuto
 * @author  2023 - Jhoan Avila 
 * Name Archivo
 * Descripcion de Clase
 * Descripcion de Funciones (Datos que recibe, datos que retorna)
*/

//Funciones Javascript
class exampleClass{

    init(){ 
        //example.get_example(); 
    }

    //Ejemplo cargue de datos
    get_example(){
        let total_cursos = "2";
        $.ajax({
            url:'../../methods/example/index.php',
            data: {
                opcn: 'get',
                lenght_cursos: total_cursos
            },
            type: 'post',
            dataType: 'json',
        })
        .done(function(data) {
            if (data.state) { 
                console.log("Ok"); 
                let resultado = "";
                Object.entries(data.data_courses).forEach(([key, value]) => 
                    resultado += "Nombre de Curso: "+value.fullname+"<br>"
                );
                document.querySelector("#result-test-txt").innerHTML = resultado;
            } 
            else { console.log("Error"); }
        });
    }
    
}
var example = new exampleClass();

//Funciones de cargue JQuery
$(document).ready(function(){
    $("#test-txt").click(function(){
        $(this).hide();
      });
});