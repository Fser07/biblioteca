<?php 
namespace App\Models;

use CodeIgniter\Model;

class Libro extends Model{
    
    protected $table = 'libros';
    protected $primarykey = 'id';
    protected $allowedFields= ['nombre','imagen'];
}


?>
