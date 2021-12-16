<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller{

    public function index(){

        $libro = new Libro();
        $datos['libros'] = $libro->orderBy('id', 'ASC')->findAll();
        
        $datos['header'] = view('template/header');  
        $datos['footer'] = view('template/footer');  
            
        return view('libros/listar',$datos);
    }

    public function crear(){
        //$this->load->helper('http://localhost:8080/listar/crear');
        
        $datos['header'] = view('template/header');  
        $datos['footer'] = view('template/footer');  
        
        return view('libros/crear', $datos);
    }

    public function guardar(){
        $libro = new Libro();
        
        if($imagen = $this->request->getFile('imagen')){
            
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/upload', $nuevoNombre);

            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'imagen'=>$nuevoNombre];

            $libro->insert($datos);    
        }
        return $this->response->redirect(site_url('/listar'));
        //echo "Ingresando a la BD";    
    }

    public function borrar($id=null){
        
        $libro = new Libro();
        $datosLibro = $libro->where('id',$id)->first();

        $ruta=('../public/upload/'.$datosLibro['imagen']);
        unlink($ruta);

        $libro->where('id',$id)->delete($id)

        return $this->response->redirect(site_url('/listar'));    
    }

    public function editar($id=null){
        
        $libro = new Libro();
        $datos['libro'] = $libro->where('id',$id)->first();
        
        $datos['header'] = view('template/header');  
        $datos['footer'] = view('template/footer');  
        
        return view('libros/editar', $datos);
    }

    public function actualizar(){
        
        $libro = new Libro();
        $datos=[
            'nombre'=>$this->request->getVar('nombre')];
        $id = $this->request->getVar('id');

        $libro->update($id,$datos);
            
    }
}

?>
