<?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php';
    
    class Actor
    {

        private $id;
        private $nombre;
        private $apellidos;
        private $fechaNacimiento;
        private $nacionalidad;
        private $database;


        private function constructor($idActor, $nombreActor,
             $apellidosActor, $fechaNacimientoActor, $nacionalidadActor)
        {
            $this->id = $idActor;
            $this->nombre = $nombreActor;
            $this->apellidos = $apellidosActor;
            $this->fechaNacimiento = $fechaNacimientoActor;
            $this->nacionalidad = $nacionalidadActor;
            $this->database = new Database();
        }

        public function constructorVacio()
        {
            $this->database = new Database();
        }
    
        public function constructorUnParametro($idActor)
        {
            $this->id = $idActor;
            $this->database = new Database();
        }

        public function __construct()
        {
            $params = func_get_args();
            $num_params = func_num_args();

            if ($num_params == 0) {
                call_user_func_array(array($this,'constructorVacio'),$params);
            } elseif($num_params == 1)
            {
                call_user_func_array(array($this,'constructorUnParametro'),$params);
            }
            else {
                call_user_func_array(array($this,'constructor'),$params);
            }
        }
        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.actores";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $actor = new Actor($item['ID'], $item['NOMBRE'], $item['APELLIDOS'], $item['FECHA_NACIMIENTO'], $item['NACIONALIDAD']);
                array_push($listData, $actor);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
           
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.actores WHERE ID = " .$this->id;
            $result = $connection->query($query);

            $actor = null;
            foreach ($result as $item)
            {
                $actor = new Actor($item['ID'], $item['NOMBRE'], $item['APELLIDOS'], $item['FECHA_NACIMIENTO'], $item['NACIONALIDAD']);
            }

            $this->database->closeConnection();
            return $actor;
        }

        function create()
        {
            $actorCreado = false;
            $connection = $this->database->getConnection();  

            $queryNacionalidad = "SELECT PAIS FROM filmaviu.nacionalidades WHERE ID = " .$this->nacionalidad;
            
            echo $queryNacionalidad;      
            if($resultInsert = $connection->query(
                "INSERT INTO filmaviu.actores (NOMBRE, APELLIDOS, FECHA_NACIMIENTO, NACIONALIDAD) VALUES 
                ('$this->nombre', '$this->apellidos', '$this->fechaNacimiento', '$this->nacionalidad')"
            ))
            {
                $actorCreado = true;
            }

            $this->database->closeConnection();
            return $actorCreado;
        }

        public function update()
        {
            $actorActualizado = false;            
            $query = "UPDATE filmaviu.actores set nombre = '$this->nombre', apellidos = '$this->apellidos', fecha_nacimiento = '$this->fechaNacimiento',
            nacionalidad = '$this->nacionalidad' WHERE id = " . $this->id;
                     
            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultInsert = $connection->query($query))
                {
                    $actorActualizado = true;
                }
            }

            $this->database->closeConnection();
            return $actorActualizado;
        }

        function remove()
        {
            $actorBorrado = false;
            $query = "DELETE FROM filmaviu.actores WHERE id = ".$this->id;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($connection->query($query))
                {
                    $actorBorrado = true;
                }
            }
            $this->database->closeConnection();
            return $actorBorrado;
        }

        public function exists()
        {
            $existeActor = false;
            $actor = $this->get();
            if ($actor != null)
            {
                $existeActor = true;
            }
            return $existeActor;
        }

        // GETTERS Y SETTERS

        // ID
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        // NOMBRE
        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        // APELLIDOS
        public function getApellidos()
        {
            return $this->apellidos;
        }

        public function setApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }

        // FECHA NACIMIENTO
        public function getFechaNacimiento()
        {
            return $this->fechaNacimiento;
        }

        public function setFechaNacimiento($fechaNacimiento)
        {
            $this->fechaNacimiento = $fechaNacimiento;
        }

        // NACIONALIDAD
        public function getNacionalidad()
        {
            return $this->nacionalidad;
        }

        public function setNacionalidad($nacionalidad)
        {
            $this->nacionalidad = $nacionalidad;
        }
    
    }
?>