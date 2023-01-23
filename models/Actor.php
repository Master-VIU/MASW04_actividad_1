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
                $plataforma = new Actor($item['ID'], $item['NOMBRE'], $item['APELLIDOS'], $item['FECHA_NACIMIENTO'], $item['NACIONALIDAD']);
                array_push($listData, $plataforma);
            }

            $this->database->closeConnection();
            return $listData;
        }

        function get()
        {
            
        }

        function create()
        {
            $actorCreado = false;
            $connection = $this->database->getConnection();

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

        function update()
        {

        }

        function remove()
        {

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