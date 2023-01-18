<?php

    class Director
    {

        private $id;
        private $temporadaId;
        private $numero;
        private $titulo;
        private $duracion;


        function __construct($idEpisodio, $temporadaIdEpisodio, $numeroEpisodio, $tituloEpisodio, $duracionEpisodio)
        {
            $this->id = $idEpisodio;
            $this->temporadaId = $temporadaIdEpisodio;
            $this->numero = $numeroEpisodio;
            $this->titulo = $tituloEpisodio;
            $this->duracion = $duracionEpisodio;
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