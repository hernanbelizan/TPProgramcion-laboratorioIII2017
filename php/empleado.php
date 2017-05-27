<?php

class Empleado
{

//Atributos
//--------------------------------------------------------------------------------------
protected $_nombre;
protected $_apellido;
protected $_edad;
protected $_id;
protected $_turno;
protected $_sueldo;
protected $_foto;
//--------------------------------------------------------------------------------------------------------------
//Constructor
//---------------------------------------------------------------------------------------------------------------
public function __construct($nombre,$apellido,$edad,$id,$turno,$sueldo,$foto)
{
    $this->_nombre=$nombre;
    $this->_apellido=$apellido;
    $this->_edad=$edad;
    $this->_id=$_id;
    $this->_turno=$turno;
    $this->_foto=$foto;

}
//----------------------------------------------------------------------------------------------------------------
//Metodos getters
//-----------------------------------------------------------------------------------------------------------------
     public function getNombre()
    {
        return $this->_nombre;
    }

    public function getApellido()
    {
        return $this->_apellido;
    }

    public function getEdad()
    {
        return $this->_edad;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getFoto()
    {
        return $this->_foto;
    }
//-------------------------------------------------------------------------------------------------------------
//Meodos
//-------------------------------------------------------------------------------------------------------------
   public function ToString()
    {
        return $this->_nombre . "-" . $this->_apelido . "-" . $this->_edad . "-" . $this->_id . "-" . $this->_turno . "-" . $this->_foto . "-" ;
    }

    public function GuardarEmpleadoEnTxt()
    {
        // $escritura = fopen("nombre.txt","w");
        // fwrite($escritura,$nombre);
        // fclose($escritura);   
        // $arcivotxt = "/../txt/productos.txt" ;
        $escritura = fopen("empleado.txt","a");
        fwrite($escritura,self::ToString());
        fclose($escritura);
    }

    public function LeerEmpleadoEnTxt()
    {
        $lectura = fopen("empleado.txt","r");
        fread($lectura,filesize("empleado.txt"));
        fclose($lectura);
    }
}
//-------------------------------------------------------------------------------------------------------------------

}//class Empleado
//-------------------------------------------------------------------------------------------------------------------


// $foto_dir = "__dir__./img/";
// move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__.'/../img/'.$_FILES['foto']['name']);
$nombreFoto = $_FILES['foto']['name'];
$destinoFoto = __DIR__."/../img/" . $_FILES['foto']['name'];
    if (file_exists("/../img/" . $_FILES['foto']['name']))
    {
        echo "<div class='error'> 'Ya existe'  </div>";
    }else
    {
        echo "<h1>Archivo Guardado</h1>";
        move_uploaded_file($_FILES['foto']['tmp_name'], $destinoFoto);
    }

$empleado = new Empleado($_POST['nombre'],$_POST['apellido'],$_POST['edad'],$_POST['id'],$_POST['turno'] ,$nombreFoto);

var_dump($empleado);

$empleado->GuardarEmpleadoEnTxt();
$empleado->LeerEmpleadoEnTxt();

?>