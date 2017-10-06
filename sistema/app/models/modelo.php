<?php if(! defined('BASEPATH')) exit('No tienes permiso para acceder a este archivo');

	class modelo extends CI_Model{
		
		private $key_hash;
		private $timezone;

		function __construct(){
			parent::__construct();
			$this->load->database("default");
			$this->key_hash    = $_SERVER['HASH_ENCRYPT'];
			$this->timezone    = 'UM1';

				//usuarios
			$this->catalogos_estados    = $this->db->dbprefix('catalogo_estado');

      $this->catalogos_tipos    = $this->db->dbprefix('catalogo_tipo_obra');

      //$this->registros_obras    = $this->db->dbprefix('registros_obras');

      $this->registros_obras    = $this->db->dbprefix('registros_temporal');

      


		}


//listado de la regilla
public function buscador_reporte_obras($data){


          $cadena = addslashes($data['search']['value']);
          $inicio = $data['start'];
          $largo = $data['length'];
          

          $columa_order = $data['order'][0]['column'];
                 $order = $data['order'][0]['dir'];

           if ($data['draw'] ==1) { //que se ordene por el ultimo
                 $columa_order ='-1';
                 $order = 'desc';
           } 



          switch ($columa_order) {
                   case '0':
                        $columna = 'r.obra';
                     break;
                  case '1':
                        $columna = 'r.lugar'; //, e.nombre
                     break;                     

                  case '2':
                        $columna = 'r.ano';
                     break;                     

                  case '3':
                        $columna = 'r.monto';
                     break;                     

                  case '4':
                        $columna = 't.nombre';
                     break;                     


                   default:
                        $columna = 'r.id';
                     break;
                 }                 

                         


          $id_session = $this->db->escape($this->session->userdata('id'));

          $this->db->select("SQL_CALC_FOUND_ROWS *", FALSE); //
          
          //id, obra, id_estado, lugar, ano, monto, id_tipo, fecha_mac
          $this->db->select('r.id'); //, r.nombre
          $this->db->select('r.obra,r.lugar, r.ano, r.monto ');
          $this->db->select('e.nombre estado');
          $this->db->select('t.nombre tipo');

          $this->db->from($this->registros_obras.' as r');
          $this->db->join($this->catalogos_estados.' As e' , 'e.id = r.id_estado','LEFT');
          $this->db->join($this->catalogos_tipos.' As t' , 't.id = r.id_tipo','LEFT');
          
          //filtro de busqueda
       


          if ($data['id_estado']!=0) {
             $id_estadoid = ' ( r.id_estado =  '.$data['id_estado'].' ) and ';  
          } else {
             $id_estadoid = '';
          }    


          if ($data['id_tipo']!=0) {
             $id_tipoid = '  ( r.id_tipo =  '.$data['id_tipo'].' )  and';  
          } else {
             $id_tipoid = '';
          }    


          $where = '('.$id_estadoid.$id_tipoid.'

                       ( 
                         ( r.obra LIKE  "%'.$cadena.'%" ) OR 
                         ( r.lugar LIKE  "%'.$cadena.'%" ) OR 
                         ( r.ano LIKE  "%'.$cadena.'%" ) OR 
                         ( r.monto LIKE  "%'.$cadena.'%" ) OR 
                         ( e.nombre LIKE  "%'.$cadena.'%" ) OR 
                         ( t.nombre LIKE  "%'.$cadena.'%" )  
                        )
            )';   


  
          $this->db->where($where);
    
          //ordenacion
          $this->db->order_by($columna, $order); 

          //paginacion
          $this->db->limit($largo,$inicio); 


          $result = $this->db->get();

              if ( $result->num_rows() > 0 ) {

                    $cantidad_consulta = $this->db->query("SELECT FOUND_ROWS() as cantidad");
                    $found_rows = $cantidad_consulta->row(); 
                    $registros_filtrados =  ( (int) $found_rows->cantidad);

                  $retorno= " ";  
                  foreach ($result->result() as $row) {
                               $dato[]= array(
                                      0=>$row->id,
                                      1=>$row->obra,
                                      2=>$row->estado,
                                      3=>$row->lugar,
                                      4=>$row->ano,
                                      5=>$row->monto,
                                      6=>$row->tipo,
                                      
                                    );
                      }




                      return json_encode ( array(
                        "draw"            => intval( $data['draw'] ),
                        "recordsTotal"    => $registros_filtrados, 
                        "recordsFiltered" =>   $registros_filtrados, 
                        "data"            =>  $dato 
                      ));
                    
              }   
              else {
                  
                  $output = array(
                  "draw" =>  intval( $data['draw'] ),
                  "recordsTotal" => 0,
                  "recordsFiltered" =>0,
                  "aaData" => array()
                  );
                  $array[]="";
                  return json_encode($output);
                  

              }

              $result->free_result();           

      } 


 //obras
  public function get_obra( $data ){

          $this->db->select('r.id'); //, r.nombre
          $this->db->select('r.obra,r.lugar, r.ano, r.monto ');
          $this->db->select('r.id_estado');
          $this->db->select('r.id_tipo');
            
            $this->db->from($this->registros_obras.' As r');
            $this->db->where('r.id',$data['id']);
            $result = $this->db->get(  );
                if ($result->num_rows() > 0)
                    return $result->row();
                else 
                    return FALSE;
                $result->free_result();
  }  

      //crear
  public function add_obra( $data ){

          $this->db->set( 'obra', $data['obra'] );  
          $this->db->set( 'id_estado', $data['id_estado'] );  
          $this->db->set( 'lugar', $data['lugar'] );  
          $this->db->set( 'ano', $data['ano'] );  
          $this->db->set( 'monto', $data['monto'] );  
          $this->db->set( 'id_tipo', $data['id_tipo'] );  


          $this->db->insert($this->registros_obras );
            if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();
  }          


        //editar
  public function edit_obra( $data ){

      $this->db->set( 'obra', $data['obra'] );  
      $this->db->set( 'id_estado', $data['id_estado'] );  
      $this->db->set( 'lugar', $data['lugar'] );  
      $this->db->set( 'ano', $data['ano'] );  
      $this->db->set( 'monto', $data['monto'] );  
      $this->db->set( 'id_tipo', $data['id_tipo'] );  

      $this->db->where('id', $data['id'] );
      $this->db->update($this->registros_obras );
          if ($this->db->affected_rows() > 0) {
              return TRUE;
          }  else
               return FALSE;
              $result->free_result();
  }   


        //eliminar obra
        public function delete_obra( $data ){
            $this->db->delete( $this->registros_obras, array( 'id' => $data['id'] ) );
            if ( $this->db->affected_rows() > 0 ) return TRUE;
            else return FALSE;
        }   


 //busqueda sensible
 public function buscador_obras($data){
            $this->db->select( 'id' );
            $this->db->select("nombre", FALSE);  
            $this->db->from($this->registros_obras);
            $this->db->like("nombre" ,$data['key'],FALSE);

              $result = $this->db->get();
              if ( $result->num_rows() > 0 ) {
                  foreach ($result->result() as $row) 
                      {
                            $dato[]= array("value"=>$row->nombre,
                                       "key"=>$row->id
                                    );
                      }
                      return json_encode($dato);
              }   
              else 
                 return False;
              $result->free_result();
}  

    //checar si existe
    public function check_existente_obras($data){
            $this->db->select("id", FALSE);         
            $this->db->from($this->registros_obras);
            $this->db->where('nombre',$data['nombre']);  
            $login = $this->db->get();
            if ($login->num_rows() > 0)
                return true;
            else
                return false;
            $login->free_result();
    } 


//listado de la regilla
public function buscador_cat_obras($data){


          $cadena = addslashes($data['search']['value']);
          $inicio = $data['start'];
          $largo = $data['length'];
          

          $columa_order = $data['order'][0]['column'];
                 $order = $data['order'][0]['dir'];

           if ($data['draw'] ==1) { //que se ordene por el ultimo
                 $columa_order ='-1';
                 $order = 'desc';
           } 



          switch ($columa_order) {
                   case '0':
                        $columna = 'r.obra';
                     break;

                   default:
                        $columna = 'r.id';
                     break;
                 }                 

                                      

          $id_session = $this->db->escape($this->session->userdata('id'));

          $this->db->select("SQL_CALC_FOUND_ROWS *", FALSE); //
          
          //id, obra, id_estado, lugar, ano, monto, id_tipo, fecha_mac
          $this->db->select('r.id'); //, r.nombre
          $this->db->select('r.obra,r.lugar, r.ano, r.monto ');
          $this->db->select('e.nombre estado');
          $this->db->select('t.nombre tipo');

          $this->db->from($this->registros_obras.' as r');
          $this->db->join($this->catalogos_estados.' As e' , 'e.id = r.id_estado','LEFT');
          $this->db->join($this->catalogos_tipos.' As t' , 't.id = r.id_tipo','LEFT');
          
          //filtro de busqueda
       
          $where = '(
                        ( r.id LIKE  "%'.$cadena.'%" ) OR (r.obra LIKE  "%'.$cadena.'%")
            )';   



  
          $this->db->where($where);
    
          //ordenacion
          $this->db->order_by($columna, $order); 

          //paginacion
          $this->db->limit($largo,$inicio); 


          $result = $this->db->get();

              if ( $result->num_rows() > 0 ) {

                    $cantidad_consulta = $this->db->query("SELECT FOUND_ROWS() as cantidad");
                    $found_rows = $cantidad_consulta->row(); 
                    $registros_filtrados =  ( (int) $found_rows->cantidad);

                  $retorno= " ";  
                  foreach ($result->result() as $row) {
                               $dato[]= array(
                                      0=>$row->id,
                                      1=>$row->obra,
                                      2=>$row->estado,
                                      3=>$row->lugar,
                                      4=>$row->ano,
                                      5=>$row->monto,
                                      6=>$row->tipo,
                                      
                                    );
                      }




                      return json_encode ( array(
                        "draw"            => intval( $data['draw'] ),
                        "recordsTotal"    => $registros_filtrados, 
                        "recordsFiltered" =>   $registros_filtrados, 
                        "data"            =>  $dato 
                      ));
                    
              }   
              else {
                  
                  $output = array(
                  "draw" =>  intval( $data['draw'] ),
                  "recordsTotal" => 0,
                  "recordsFiltered" =>0,
                  "aaData" => array()
                  );
                  $array[]="";
                  return json_encode($output);
                  

              }

              $result->free_result();           

      } 

  //estados

  public function listado_estados(){
            $this->db->select("c.id, c.nombre");         
            $this->db->from($this->catalogos_estados.' As c');
            $result = $this->db->get(  );
                if ($result->num_rows() > 0)
                    return $result->result();
                else 
                    return FALSE;
                $result->free_result();
  }   

  public function get_estado( $data ){
              
            $this->db->select("c.id, c.nombre");         
            $this->db->from($this->catalogos_estados.' As c');
            $this->db->where('c.id',$data['id']);
            $result = $this->db->get(  );
                if ($result->num_rows() > 0)
                    return $result->row();
                else 
                    return FALSE;
                $result->free_result();
  }  

      //crear
  public function add_estado( $data ){

          $this->db->set( 'nombre', $data['nombre'] );  

          $this->db->insert($this->catalogos_estados );
            if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();
  }          


        //editar
  public function edit_estado( $data ){

     $this->db->set( 'nombre', $data['nombre'] );  

      $this->db->where('id', $data['id'] );
      $this->db->update($this->catalogos_estados );
          if ($this->db->affected_rows() > 0) {
              return TRUE;
          }  else
               return FALSE;
              $result->free_result();
  }   


        //eliminar estado
        public function delete_estado( $data ){
            $this->db->delete( $this->catalogos_estados, array( 'id' => $data['id'] ) );
            if ( $this->db->affected_rows() > 0 ) return TRUE;
            else return FALSE;
        }   


 //busqueda sensible
 public function buscador_estados($data){
            $this->db->select( 'id' );
            $this->db->select("nombre", FALSE);  
            $this->db->from($this->catalogos_estados);
            $this->db->like("nombre" ,$data['key'],FALSE);

              $result = $this->db->get();
              if ( $result->num_rows() > 0 ) {
                  foreach ($result->result() as $row) 
                      {
                            $dato[]= array("value"=>$row->nombre,
                                       "key"=>$row->id
                                    );
                      }
                      return json_encode($dato);
              }   
              else 
                 return False;
              $result->free_result();
}  

    //checar si existe
    public function check_existente_estados($data){
            $this->db->select("id", FALSE);         
            $this->db->from($this->catalogos_estados);
            $this->db->where('nombre',$data['nombre']);  
            $login = $this->db->get();
            if ($login->num_rows() > 0)
                return true;
            else
                return false;
            $login->free_result();
    } 


//listado de la regilla
public function buscador_cat_estados($data){


          $cadena = addslashes($data['search']['value']);
          $inicio = $data['start'];
          $largo = $data['length'];
          

          $columa_order = $data['order'][0]['column'];
                 $order = $data['order'][0]['dir'];

           if ($data['draw'] ==1) { //que se ordene por el ultimo
                 $columa_order ='-1';
                 $order = 'desc';
           } 



          switch ($columa_order) {
                   case '0':
                        $columna = 'c.nombre';
                     break;

                   default:
                        $columna = 'c.id';
                     break;
                 }                 

                                      

          $id_session = $this->db->escape($this->session->userdata('id'));

          $this->db->select("SQL_CALC_FOUND_ROWS *", FALSE); //
          
          $this->db->select('c.id, c.nombre');

          $this->db->from($this->catalogos_estados.' as c');
          
          //filtro de busqueda
       
          $where = '(
                        ( c.id LIKE  "%'.$cadena.'%" ) OR (c.nombre LIKE  "%'.$cadena.'%")
            )';   



  
          $this->db->where($where);
    
          //ordenacion
          $this->db->order_by($columna, $order); 

          //paginacion
          $this->db->limit($largo,$inicio); 


          $result = $this->db->get();

              if ( $result->num_rows() > 0 ) {

                    $cantidad_consulta = $this->db->query("SELECT FOUND_ROWS() as cantidad");
                    $found_rows = $cantidad_consulta->row(); 
                    $registros_filtrados =  ( (int) $found_rows->cantidad);

                  $retorno= " ";  
                  foreach ($result->result() as $row) {
                               $dato[]= array(
                                      0=>$row->id,
                                      1=>$row->nombre,
                                    );
                      }




                      return json_encode ( array(
                        "draw"            => intval( $data['draw'] ),
                        "recordsTotal"    => $registros_filtrados, 
                        "recordsFiltered" =>   $registros_filtrados, 
                        "data"            =>  $dato 
                      ));
                    
              }   
              else {
                  
                  $output = array(
                  "draw" =>  intval( $data['draw'] ),
                  "recordsTotal" => 0,
                  "recordsFiltered" =>0,
                  "aaData" => array()
                  );
                  $array[]="";
                  return json_encode($output);
                  

              }

              $result->free_result();           

      } 



  /////////////////////////////////////tipos de obras/////////////////////////////////////
  public function listado_tipos(){
            $this->db->select("c.id, c.nombre");         
            $this->db->from($this->catalogos_tipos.' As c');
            $result = $this->db->get(  );
                if ($result->num_rows() > 0)
                    return $result->result();
                else 
                    return FALSE;
                $result->free_result();
  }   

  
  

  public function get_tipo( $data ){
              
            $this->db->select("c.id, c.nombre");         
            $this->db->from($this->catalogos_tipos.' As c');
            $this->db->where('c.id',$data['id']);
            $result = $this->db->get(  );
                if ($result->num_rows() > 0)
                    return $result->row();
                else 
                    return FALSE;
                $result->free_result();
  }  

      //crear
  public function add_tipo( $data ){

          $this->db->set( 'nombre', $data['nombre'] );  

          $this->db->insert($this->catalogos_tipos );
            if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();
  }          


        //editar
  public function edit_tipo( $data ){

     $this->db->set( 'nombre', $data['nombre'] );  

      $this->db->where('id', $data['id'] );
      $this->db->update($this->catalogos_tipos );
          if ($this->db->affected_rows() > 0) {
              return TRUE;
          }  else
               return FALSE;
              $result->free_result();
  }   


        //eliminar tipo
        public function delete_tipo( $data ){
            $this->db->delete( $this->catalogos_tipos, array( 'id' => $data['id'] ) );
            if ( $this->db->affected_rows() > 0 ) return TRUE;
            else return FALSE;
        }   


 //busqueda sensible
 public function buscador_tipos($data){
            $this->db->select( 'id' );
            $this->db->select("nombre", FALSE);  
            $this->db->from($this->catalogos_tipos);
            $this->db->like("nombre" ,$data['key'],FALSE);

              $result = $this->db->get();
              if ( $result->num_rows() > 0 ) {
                  foreach ($result->result() as $row) 
                      {
                            $dato[]= array("value"=>$row->nombre,
                                       "key"=>$row->id
                                    );
                      }
                      return json_encode($dato);
              }   
              else 
                 return False;
              $result->free_result();
}  

    //checar si existe
    public function check_existente_tipos($data){
            $this->db->select("id", FALSE);         
            $this->db->from($this->catalogos_tipos);
            $this->db->where('nombre',$data['nombre']);  
            $login = $this->db->get();
            if ($login->num_rows() > 0)
                return true;
            else
                return false;
            $login->free_result();
    } 


//listado de la regilla
public function buscador_cat_tipos($data){


          $cadena = addslashes($data['search']['value']);
          $inicio = $data['start'];
          $largo = $data['length'];
          

          $columa_order = $data['order'][0]['column'];
                 $order = $data['order'][0]['dir'];

           if ($data['draw'] ==1) { //que se ordene por el ultimo
                 $columa_order ='-1';
                 $order = 'desc';
           } 



          switch ($columa_order) {
                   case '0':
                        $columna = 'c.nombre';
                     break;

                   default:
                        $columna = 'c.id';
                     break;
                 }                 

                                      

          $id_session = $this->db->escape($this->session->userdata('id'));

          $this->db->select("SQL_CALC_FOUND_ROWS *", FALSE); //
          
          $this->db->select('c.id, c.nombre');

          $this->db->from($this->catalogos_tipos.' as c');
          
          //filtro de busqueda
       
          $where = '(
                        ( c.id LIKE  "%'.$cadena.'%" ) OR (c.nombre LIKE  "%'.$cadena.'%")
            )';   



  
          $this->db->where($where);
    
          //ordenacion
          $this->db->order_by($columna, $order); 

          //paginacion
          $this->db->limit($largo,$inicio); 


          $result = $this->db->get();

              if ( $result->num_rows() > 0 ) {

                    $cantidad_consulta = $this->db->query("SELECT FOUND_ROWS() as cantidad");
                    $found_rows = $cantidad_consulta->row(); 
                    $registros_filtrados =  ( (int) $found_rows->cantidad);

                  $retorno= " ";  
                  foreach ($result->result() as $row) {
                               $dato[]= array(
                                      0=>$row->id,
                                      1=>$row->nombre,
                                    );
                      }




                      return json_encode ( array(
                        "draw"            => intval( $data['draw'] ),
                        "recordsTotal"    => $registros_filtrados, 
                        "recordsFiltered" =>   $registros_filtrados, 
                        "data"            =>  $dato 
                      ));
                    
              }   
              else {
                  
                  $output = array(
                  "draw" =>  intval( $data['draw'] ),
                  "recordsTotal" => 0,
                  "recordsFiltered" =>0,
                  "aaData" => array()
                  );
                  $array[]="";
                  return json_encode($output);
                  

              }

              $result->free_result();           

      } 




	} 
?>