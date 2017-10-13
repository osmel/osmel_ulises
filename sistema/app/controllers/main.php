<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){ 
		parent::__construct();
		$this->load->model('modelo', 'modelo');
	}

	public function index(){
		/*if ( $this->session->userdata( 'session' ) !== TRUE ){
			$this->login();
		} else {
			$this->dashboard();
		}
		*/

		print_r('oaoao');
	}



 public function cargar_selector() {


      $elementos['1']        = $this->modelo->listado_estados();
      $elementos['5']     = $this->modelo->listado_tipos();
      

    echo json_encode($elementos); 


  }
  


////////////////reportes_obras//////////////////////
 public function reporte_obras(){


    $data['estados'] = $this->modelo->listado_estados();
    $data['tipos'] = $this->modelo->listado_tipos();

 
   $this->load->view( 'catalogos/reporte_obras', $data);
    
}


  public function procesando_reportes_obras(){
    $data=$_POST;
    $busqueda = $this->modelo->buscador_reporte_obras($data);
    echo $busqueda;
  } 










////////////////obras//////////////////////
 public function listado_obras(){
 
    if (is_user_logged_in()){
          $cu = wp_get_current_user();
          if ($cu->ID==1) {
              $this->load->view( 'catalogos/obras');
          } else {
             redirect(get_site_url());
          }
          
    
    } else {
         redirect(get_site_url());
    }
    
}


  public function procesando_cat_obras(){
    $data=$_POST;
    $busqueda = $this->modelo->buscador_cat_obras($data);
    echo $busqueda;
  } 


  // crear
  function nuevo_obra(){
  		 $data['estados'] = $this->modelo->listado_estados();
  		 $data['tipos'] = $this->modelo->listado_tipos();
         $this->load->view( 'catalogos/obras/nuevo_obra',$data);
                
  }


  
function actualizar_celda(){
     $columna =  (string)$this->input->post('campo').'';

   switch ($columna) {
                   case '0':
                        $data['campo'] = 'obra';
                     break;

                   case '1':
                        $data['campo']= 'id_estado'; //estado
                     break;

                   case '2':
                        $data['campo']= 'lugar';
                        
                     break;

                   case '3':
                        $data['campo']= 'ano';
                     break;

                   case '4':
                        $data['campo']= 'monto';
                     break;

                   case '5':
                        $data['campo']= 'id_tipo'; //tipo
                     break;

                   default:
                        $data['campo'] = 'obra';
                     break;
                 }      


   $data['valor']   = $this->input->post('valor');
   $data['id']   =   base64_decode($this->input->post('id'));

    $data         =   $this->security->xss_clean($data);  
    $guardar            = $this->modelo->actualizar_celda( $data );

//    echo $guardar;

        
        if ( $guardar !== FALSE ){
          echo true;
        } else {
          echo '<span class="error"><b>E01</b> - El nuevo valor no pudo cambiarse</span>';
        } 

} 

  function validar_nuevo_obra(){
      $this->form_validation->set_rules('obra', 'obra', 'trim|required|min_length[3]|max_lenght[180]|xss_clean');
      if ($this->form_validation->run() === TRUE){
          $data['obra']   = $this->input->post('obra');
          $data['id_estado']   = $this->input->post('id_estado');
          $data['lugar']   = $this->input->post('lugar');
          $data['ano']   = $this->input->post('ano');
          $data['monto']   = $this->input->post('monto');
          $data['id_tipo']   = $this->input->post('id_tipo');


          $data         =   $this->security->xss_clean($data);  
          $guardar            = $this->modelo->add_obra( $data );
          if ( $guardar !== FALSE ){
            echo true;
          } else {
            echo '<span class="error"><b>E01</b> - El nuevo obra no pudo ser agregada</span>';
          }
      }
  }


  // editar
  function editar_obra( $id = '' ){
		  		
		  	   $data['estados'] = $this->modelo->listado_estados();
  		 	   $data['tipos'] = $this->modelo->listado_tipos();
  		 	
		       $data['id']  = base64_decode($id);
		       $data['obra'] = $this->modelo->get_obra($data);
		       if ( $data['obra'] !== FALSE ){
		                      $this->load->view( 'catalogos/obras/editar_obra', $data );
		       } 
		  
   }


function validacion_edicion_obra(){
      $this->form_validation->set_rules( 'obra', 'obra', 'trim|required|min_length[3]|max_lenght[180]|xss_clean');

      if ($this->form_validation->run() === TRUE){
            $data['id']           = $this->input->post('id');

     	  $data['obra']   = $this->input->post('obra');
          $data['id_estado']   = $this->input->post('id_estado');
          $data['lugar']   = $this->input->post('lugar');
          $data['ano']   = $this->input->post('ano');
          $data['monto']   = $this->input->post('monto');
          $data['id_tipo']   = $this->input->post('id_tipo');


          $data               = $this->security->xss_clean($data);  
          $guardar            = $this->modelo->edit_obra( $data );

          if ( $guardar !== FALSE ){
            echo true;

          } else {
            echo '<span class="error"><b>E01</b> - El nuevo obra no pudo ser agregada</span>';
          }
      } else {      
        echo validation_errors('<span class="error">','</span>');
      }
 }
  
  



  // eliminar


  function eliminar_obra($id = '', $nombrecompleto=''){
 
  	  $data['id']         = base64_decode($id);
      $data['nombrecompleto']   = base64_decode($nombrecompleto);
      
		$this->load->view( 'catalogos/obras/eliminar_obra', $data );      
 

  }


  function validar_eliminar_obra(){
    if (!empty($_POST['id'])){ 
      $data['id'] = $_POST['id'];
    }
    $eliminado = $this->modelo->delete_obra(  $data );
    if ( $eliminado !== FALSE ){
      echo TRUE;
    } else {
      echo '<span class="error">No se ha podido eliminar la obra</span>';
    }
  }   



////////////////estados//////////////////////
 public function listado_estados(){

    if (is_user_logged_in()){
          $cu = wp_get_current_user();
          if ($cu->ID==1) {
              $this->load->view( 'catalogos/estados');
          } else {
             redirect(get_site_url());
          }
          
    
    } else {
         redirect(get_site_url());
    }   
    
}


  public function procesando_cat_estados(){
    $data=$_POST;
    $busqueda = $this->modelo->buscador_cat_estados($data);
    echo $busqueda;
  } 


  // crear
  function nuevo_estado(){
         $this->load->view( 'catalogos/estados/nuevo_estado');
                
  }

  function validar_nuevo_estado(){
      $this->form_validation->set_rules('nombre', 'estado', 'trim|required|min_length[3]|max_lenght[180]|xss_clean');
      if ($this->form_validation->run() === TRUE){
          $data['nombre']   = $this->input->post('nombre');

          $data         =   $this->security->xss_clean($data);  
          $guardar            = $this->modelo->add_estado( $data );
          if ( $guardar !== FALSE ){
            echo true;
          } else {
            echo '<span class="error"><b>E01</b> - El nuevo estado no pudo ser agregada</span>';
          }
      }
  }


  // editar
  function editar_estado( $id = '' ){
		  
		       $data['id']  = base64_decode($id);
		       $data['estado'] = $this->modelo->get_estado($data);
		       if ( $data['estado'] !== FALSE ){
		                      $this->load->view( 'catalogos/estados/editar_estado', $data );
		       } 
		  
   }


function validacion_edicion_estado(){
      $this->form_validation->set_rules( 'nombre', 'estado', 'trim|required|min_length[3]|max_lenght[180]|xss_clean');

      if ($this->form_validation->run() === TRUE){
            $data['id']           = $this->input->post('id');
          $data['nombre']         = $this->input->post('nombre');
          $data               = $this->security->xss_clean($data);  
          $guardar            = $this->modelo->edit_estado( $data );

          if ( $guardar !== FALSE ){
            echo true;

          } else {
            echo '<span class="error"><b>E01</b> - El nuevo estado no pudo ser agregada</span>';
          }
      } else {      
        echo validation_errors('<span class="error">','</span>');
      }
 }
  
  



  // eliminar


  function eliminar_estado($id = '', $nombrecompleto=''){
 
  	  $data['id']         = base64_decode($id);
      $data['nombrecompleto']   = base64_decode($nombrecompleto);
      
		$this->load->view( 'catalogos/estados/eliminar_estado', $data );      
 

  }


  function validar_eliminar_estado(){
    if (!empty($_POST['id'])){ 
      $data['id'] = $_POST['id'];
    }
    $eliminado = $this->modelo->delete_estado(  $data );
    if ( $eliminado !== FALSE ){
      echo TRUE;
    } else {
      echo '<span class="error">No se ha podido eliminar la estado</span>';
    }
  }   


////////////////tipos//////////////////////
 public function listado_tipos(){
  
   //$this->load->view( 'catalogos/tipos');

    if (is_user_logged_in()){
          $cu = wp_get_current_user();
          if ($cu->ID==1) {
              $this->load->view( 'catalogos/tipos');
          } else {
             redirect(get_site_url());
          }
          
    
    } else {
         redirect(get_site_url());
    }   
  
    
}


  public function procesando_cat_tipos(){
    $data=$_POST;
    $busqueda = $this->modelo->buscador_cat_tipos($data);
    echo $busqueda;
  } 


  // crear
  function nuevo_tipo(){
         $this->load->view( 'catalogos/tipos/nuevo_tipo');
                
  }

  function validar_nuevo_tipo(){
      $this->form_validation->set_rules('nombre', 'tipo', 'trim|required|min_length[3]|max_lenght[180]|xss_clean');
      if ($this->form_validation->run() === TRUE){
          $data['nombre']   = $this->input->post('nombre');

          $data         =   $this->security->xss_clean($data);  
          $guardar            = $this->modelo->add_tipo( $data );
          if ( $guardar !== FALSE ){
            echo true;
          } else {
            echo '<span class="error"><b>E01</b> - El nuevo tipo no pudo ser agregada</span>';
          }
      }
  }


  // editar
  function editar_tipo( $id = '' ){
		  
		       $data['id']  = base64_decode($id);
		       $data['tipo'] = $this->modelo->get_tipo($data);
		       if ( $data['tipo'] !== FALSE ){
		                      $this->load->view( 'catalogos/tipos/editar_tipo', $data );
		       } 
		  
   }


function validacion_edicion_tipo(){
      $this->form_validation->set_rules( 'nombre', 'tipo', 'trim|required|min_length[3]|max_lenght[180]|xss_clean');

      if ($this->form_validation->run() === TRUE){
            $data['id']           = $this->input->post('id');
          $data['nombre']         = $this->input->post('nombre');
          $data               = $this->security->xss_clean($data);  
          $guardar            = $this->modelo->edit_tipo( $data );

          if ( $guardar !== FALSE ){
            echo true;

          } else {
            echo '<span class="error"><b>E01</b> - El nuevo tipo no pudo ser agregada</span>';
          }
      } else {      
        echo validation_errors('<span class="error">','</span>');
      }
 }
  
  



  // eliminar


  function eliminar_tipo($id = '', $nombrecompleto=''){
 
  	  $data['id']         = base64_decode($id);
      $data['nombrecompleto']   = base64_decode($nombrecompleto);
      
		$this->load->view( 'catalogos/tipos/eliminar_tipo', $data );      
 

  }


  function validar_eliminar_tipo(){
    if (!empty($_POST['id'])){ 
      $data['id'] = $_POST['id'];
    }
    $eliminado = $this->modelo->delete_tipo(  $data );
    if ( $eliminado !== FALSE ){
      echo TRUE;
    } else {
      echo '<span class="error">No se ha podido eliminar la tipo</span>';
    }
  }   





}

/* End of file main.php */
/* Location: ./app/controllers/main.php */