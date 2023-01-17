<?php

    class Actor
    {

        private $id;
        private $nombre;
        private $apellidos;
        private $fechaNacimiento;
        private $nacionalidad;


        function __constructor($idDirector, $nombreDirector,
             $apellidosDirector, $fechaNacimientoDirector, $nacionalidadDirector)
        {

            $this->id = $idDirector;
            $this->nombre = $nombreDirector;
            $this->apellidos = $apellidosDirector;
            $this->fechaNacimiento = $fechaNacimientoDirector;
            $this->nacionalidad = $nacionalidadDirector;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

           /**
         * @return mixed 
         */
        public function getApellidos()
        {
            return $this->apellidos;
        }

        /**
         * @param mixed $apellidos
         */
        public function setApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }

           /**
         * @return mixed
         */
        public function getFechaNacimiento()
        {
            return $this->fechaNacimiento;
        }

        /**
         * @param mixed $fechaNacimiento
         */
        public function setFechaNacimiento($fechaNacimiento)
        {
            $this->fechaNacimiento = $fechaNacimiento;
        }

           /**
         * @return mixed
         */
        public function getNacionalidad()
        {
            return $this->nacionalidad;
        }

        /**
         * @param mixed $nacionalidad
         */
        public function setNacionalidad($nacionalidad)
        {
            $this->nacionalidad = $nacionalidad;
        }
    }
?>