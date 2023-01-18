<?php

class Portada
    {
        private $id;
        private $tamanio;
        private $imagen;

        function __construct($idPortada, $tamanioPortada, $imagenPortada)
        {

            $this->id = $idPortada;
            $this->tamanio = $tamanioPortada;
            $this->imagen = $imagenPortada;
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
        public function getTamanio()
        {
            return $this->tamanio;
        }

        /**
         * @param mixed $tamanio
         */
        public function setTamanio($tamanio)
        {
            $this->tamanio = $tamanio;
        }

        /**
         * @return mixed
         */
        public function getImagen()
        {
            return $this->imagen;
        }

        /**
         * @param mixed $imagen
         */
        public function setImagen($imagen)
        {
            $this->imagen = $imagen;
        }

    }
?>