<?php

class Temporada
    {
        private $numero;
        private $serieId;
        private $id;
        private $fechaLanzamiento;

        function __constructor($numeroTemporada, $serieIdTemporada, $idTemporada, $fechaLanzamientoTemporada)
        {
            $this->numero = $numeroTemporada;
            $this->serieId = $serieIdTemporada;
            $this->id = $idTemporada;
            $this->fechaLanzamiento = $fechaLanzamientoTemporada;
        }

        /**
         * @return mixed
         */
        public function getNumero()
        {
            return $this->numero;
        }

        /**
         * @param mixed $numero
         */
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }

        /**
         * @return mixed
         */
        public function getSerieId()
        {
            return $this->serieId;
        }

        /**
         * @param mixed $serieId
         */
        public function setSerieId($serieId)
        {
            $this->serieId = $serieId;
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
        public function getFechaLanzamiento()
        {
            return $this->fechaLanzamiento;
        }

        /**
         * @param mixed $fechaLanzamiento
         */
        public function setFechaLanzamiento($fechaLanzamiento)
        {
            $this->fechaLanzamiento = $fechaLanzamiento;
        }
    }
?>