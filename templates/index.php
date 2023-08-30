<!-- Home Editor || @author  Ago 2023 - Jhoan Avila  -->
<?php
    require_once ('../../../config.php');
    require_once($CFG->dirroot . '/lib/outputrenderers.php');
    global $PAGE, $USER, $DB, $OUTPUT, $CFG, $FULLME, $SESSION;
    require_login(0, false);
    $path_base = new \moodle_url('/local/editor_uniminuto');
    if (isguestuser()) {  // Login as real user!
        $SESSION->wantsurl = (string)new moodle_url('index.php');
        redirect(get_login_url());
    }

    /* Incluir archivos CSS y Title de la pagina */
    $css_stylesheet = [ array('url_css' => "") ]; //Ruta estilos CSS propios $path_base."/css/path/test.css"
    $css_stylesheet_vendor = [ array('url_css' => "") ]; //Ruta estilos CSS del Vendor  $path_base."/css/path/test.css"
    $params_metadata = [ 'title_page' => "Rutas S3 -Editor de Cursos Uniminuto", 'css_stylesheet' => $css_stylesheet, 'css_stylesheet_vendor' => $css_stylesheet_vendor, 'path_base' => $path_base];

    /* Incluir datos de la Miga de Pan y Nombre de Pagina */
    $breadcrumb = [ array('page_breadcrumb' => "Name Module"), array('page_breadcrumb' => "Name Submodule") ]; //Breadcrumb Module - Page
    $params_wrapper =['name_page' => "Name Page", 'breadcrumb' => $breadcrumb];

    require_once ('../methods/base/base.php');
    $params_base =  new base();
    $params_top_page = [ 
        'url_dashboard' => new \moodle_url('/my'), 
        'path_base' => $path_base,
        'info_users' => $params_base->info_users(), 
        'notifications' => $params_base->info_notificaciones(), 
        'wrapper' => $params_wrapper
    ];
    
    echo $OUTPUT->render_from_template('local_editor_uniminuto/base/metadata-page', $params_metadata);
    echo $OUTPUT->render_from_template('local_editor_uniminuto/base/template-blank-header', $params_top_page);
?>

<!-- Create Content Page -->
<div class="card mb-10">
    <div class="card-body d-flex align-items-center p-5 p-lg-8">
		<div class="d-flex h-50px w-50px h-lg-80px w-lg-80px flex-shrink-0 flex-center position-relative align-self-start align-self-lg-center mt-3 mt-lg-0">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-primary h-75px w-75px h-lg-100px w-lg-100px position-absolute opacity-5">
				<path fill="currentColor" d="M10.2,21.23,4.91,18.17a3.58,3.58,0,0,1-1.8-3.11V8.94a3.58,3.58,0,0,1,1.8-3.11L10.2,2.77a3.62,3.62,0,0,1,3.6,0l5.29,3.06a3.58,3.58,0,0,1,1.8,3.11v6.12a3.58,3.58,0,0,1-1.8,3.11L13.8,21.23A3.62,3.62,0,0,1,10.2,21.23Z"></path>
			</svg>
	   		<i class="ki-duotone ki-wrench fs-2x fs-lg-3x text-primary position-absolute"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <div class="ms-6">
            <p class="list-unstyled text-gray-600 fw-semibold fs-6 p-0 m-0">
                En esta seccion añadiremos todo el contenido requerido para construir la pagina o modulo. (Textos, tablas, ventanas modal, etc..)<br>
                Por cada pagina creada siempre deberemos en codigo añadir las rutas de los archivos CSS y JS necesarios, ademas de agregar los textos
                de la <code>etiqueta title</code>, <code>miga de pan</code> y <code>nombre de la pagina</code>.
            </p>
        </div>
    </div>
</div>
<!-- End::Create Content Page -->

<?php
    echo $OUTPUT->render_from_template('local_editor_uniminuto/base/template-blank-footer', '');
    echo $OUTPUT->render_from_template('local_editor_uniminuto/base/modals_base', '');

    /* Incluir datos Js de la pagina */
    $js_scripts = [ array('url_js' => "") ]; //Ruta scripts JS propios $path_base."/js/path/test.js"
    $js_scripts_vendor = [ array('url_js' => "") ]; //Ruta scripts JS del Vendor $path_base."/js/path/test.js"
    $params_scriptsJs = [ 'js_scripts' => $js_scripts, 'js_scripts_vendor' => $js_scripts_vendor, 'path_base' => $path_base];
    echo $OUTPUT->render_from_template('local_editor_uniminuto/base/scripts-page', $params_scriptsJs);
?>

