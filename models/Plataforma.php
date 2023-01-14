<?php

    class Plataforma
    {
        private $id;
        private $nombre;

        public function __constructor($idPlataforma, $nombrePlataforma)
        {
            $this->id = $idPlataforma;
            $this->nombre = $nombrePlataforma;
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