<?php

class PeliculaActor
    {
        private $idPelicula;
        private $idActor;

        function __constructor($idPelicula, $idActor)
        {

            $this->idPelicula = $idPelicula;
            $this->idActor = $idActor;
        }

        /**
         * @return mixed
         */
        public function getIdPelicula()
        {
            return $this->idPelicula;
        }

        /**
         * @param mixed $idPelicula
         */
        public function setIdPelicula($idPelicula)
        {
            $this->idPelicula = $idPelicula;
        }

        /**
         * @return mixed
         */
        public function getIdActor()
        {
            return $this->idActor;
        }

        /**
         * @param mixed $idActor
         */
        public function setIdActor($idActor)
        {
            $this->idActor = $idActor;
        }

    }
?>