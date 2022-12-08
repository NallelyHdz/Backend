<?php
    class Controller{
        public function GetProducts(){
            try{
                $list=array();
                $conexion= new conexion();
                $db=$conexion->getConexion();
                $query ="SELECT * FROM productos";
                $statement = $db -> prepare($query);
                $statement ->execute();


                while($row =$statement->fetch()){
                    $list[]=array(  
                        "Nombre" => $row['Nombre'],
                        "Cantidad" => $row['Cantidad'],
                        "Precio" => $row['Precio']
                    );
                }
                return $list;
            }
            catch(PDOException $e)
            {
                echo("error");
            }
        }

        public function addProducts($data)
        {
                    try{
                    $Nombre = $data['Nombre'];
                    $Cantidad = $data['Cantidad'];
                    $Precio = $data['Precio'];
                    $conexion = new Conexion();
                    $db = $conexion->getConexion();
                    $query = "INSERT INTO productos (Nombre, Cantidad, Precio) VALUES (:name,:Nombre,:Cantidad,:Precio)";
                    $statement = $db->prepare($query);
                    $statement->bindParam(":Nombre", $Nombre);
                    $statement->bindParam(":Cantidad", $Cantidad);
                    $statement->bindParam(":Precio", $Precio);
                    $result = $statement->execute();
                    if($result){
                       return "successfully";
                    }
                     return "error!";
              
                   } 
                   catch (PDOException $e) {
                    echo "¡Error!: " . $e->getMessage() . "<br/>";
                 }
    
    
    
            
        }

    }
?>