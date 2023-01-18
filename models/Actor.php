<?php
    require_once ('../utils/Database.php');
    class Actor
    {

        private $id;
        private $nombre;
        private $apellidos;
        private $fechaNacimiento;
        private $nacionalidad;
        private $database;


        function __construct($idActor, $nombreActor,
             $apellidosActor, $fechaNacimientoActor, $nacionalidadActor)
        {
            $this->id = $idActor;
            $this->nombre = $nombreActor;
            $this->apellidos = $apellidosActor;
            $this->fechaNacimiento = $fechaNacimientoActor;
            $this->nacionalidad = $nacionalidadActor;
            $this->database = new Database();
        }

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.actores";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $plataforma = new Actor($item['id'], $item['nombre'], $item['apellidos'], $item['fecha_nacimiento'], $item['nacionalidad']);
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