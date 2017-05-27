<?php

/**
 * 
 */
class Auto
{

//Atributos
//---------------------------------------------------------------------------------------------------------------

protected $_marca;
protected $_patente;
protected $_color;    
    
//Constructor
//----------------------------------------------------------------------------------------------------------------    
    function __construct($marca,$patente,$color)
    {
        $this->_marca=$marca;
        $this->patente=$patente;
        $this->_color=$color;
    }
//--------------------------------------------------------------------------------------------------------------------
//Metodos Getters
//-------------------------------------------------------------------------------------------------------------------

public function getMarca()
{
    return $this->_marca;
}

public function getPatente()
{
    return $this->_patente;
}

public function getColor()
{
    return $this->_color;
}
//--------------------------------------------------------------------------------------------------------------------
//Metodos
//------------------------------------------------------------------------------------------------------------------

public function toString()
{
    return $this->_marca . "-" . $this->_patente . "-" . $this->_color . "-";
}

 public function GuardarAutoEnTxt()
    {
        // $escritura = fopen("nombre.txt","w");
        // fwrite($escritura,$nombre);
        // fclose($escritura);   
        // $arcivotxt = "/../txt/productos.txt" ;
        $escritura = fopen("autos.txt","a");
        fwrite($escritura,self::ToString());
        fclose($escritura);
    }

    public function LeerAutoEnTxt()
    {
        $lectura = fopen("autos.txt","r");
        fread($lectura,filesize("autos.txt"));
        fclose($lectura);
    }
}//class Auto
//----------------------------------------------------------------------------------------------------------------------

 $foto_dir = "__dir__./img/";
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

$auto = new Autos($_POST['marca'],$_POST['patente'],$_POST['color'],$nombreFoto);

var_dump($auto);

$auto->GuardarAutoEnTxt();
$auto->LeerAutoEnTxt();

?>