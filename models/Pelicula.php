<?php

class Pelicula
    {
        private $id;
        private $titulo;
        private $plataforma;
        private $director;
        private $puntuacion;
        private $clasificacion;
        private $genero;
        private $portada;
        private $duracion;

        function __constructor($idPelicula, $tituloPelicula, $plataformaPelicula, $directorPelicula,
                               $puntuacionPelicula, $clasificacionPelicula, $generoPelicula, $portadaPelicula,
                               $duracionPelicula)
        {
            $this->id = $idPelicula;
            $this->titulo = $tituloPelicula;
            $this->plataforma = $plataformaPelicula;
            $this->director = $directorPelicula;
            $this->puntuacion = $puntuacionPelicula;
            $this->clasificacion = $clasificacionPelicula;
            $this->genero = $generoPelicula;
            $this->portada = $portadaPelicula;
            $this->duracion = $duracionPelicula;
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
        public function getPlataforma()
        {
            return $this->plataforma;
        }

        /**
         * @param mixed $plataforma
         */
        public function setPlataforma($plataforma)
        {
            $this->plataforma = $plataforma;
        }

        /**
         * @return mixed
         */
        public function getDirector()
        {
            return $this->director;
        }

        /**
         * @param mixed $director
         */
        public function setDirector($director)
        {
            $this->director = $director;
        }

        /**
         * @return mixed
         */
        public function getPuntuacion()
        {
            return $this->puntuacion;
        }

        /**
         * @param mixed $puntuacion
         */
        public function setPuntuacion($puntuacion)
        {
            $this->puntuacion = $puntuacion;
        }

        /**
         * @return mixed
         */
        public function getClasificacion()
        {
            return $this->clasificacion;
        }

        /**
         * @param mixed $clasificacion
         */
        public function setClasificacion($clasificacion)
        {
            $this->clasificacion = $clasificacion;
        }

        /**
         * @return mixed
         */
        public function getGenero()
        {
            return $this->genero;
        }

        /**
         * @param mixed $genero
         */
        public function setGenero($genero)
        {
            $this->genero = $genero;
        }

        /**
         * @return mixed
         */
        public function getPortada()
        {
            return $this->portada;
        }

        /**
         * @param mixed $portada
         */
        public function setPortada($portada)
        {
            $this->portada = $portada;
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