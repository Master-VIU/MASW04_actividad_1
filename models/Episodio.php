<?php

    class Episodio
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
        public function getTemporadaId()
        {
            return $this->temporadaId;
        }

        /**
         * @param mixed $temporadaId
         */
        public function setTemporadaId($temporadaId)
        {
            $this->temporadaId = $temporadaId;
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
        public function getTitulo()
        {
            return $this->titulo;
        }

        /**
         * @param mixed $titulo
         */
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }

        /**
         * @return mixed
         */
        public function getDuracion()
        {
            return $this->duracion;
        }

        /**
         * @param mixed $duracion
         */
        public function setDuracion($duracion)
        {
            $this->duracion = $duracion;
        }


    }
?>