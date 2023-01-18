<?php

    class Genero
    {

        private $id;
        private $nombre;

        public function __construct($idGenero, $nombreGenero)
        {
            $this->id = $idGenero;
            $this->nombre = $nombreGenero;
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
    }
?>