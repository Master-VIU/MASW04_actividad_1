<?php

    class Serie{
        private $id;
        private $titulo;
        private $plataforma;
        private $director;
        private $clasificacion;
        private $genero;


        function __constructor($idSerie, $tituloSerie, $plataformaSerie,
             $directorSerie, $clasificacionSerie, $generoSerie){

                $this->id = $idSerie;
                $this->titulo = $tituloSerie;
                $this->plataforma = $plataformaSerie;
                $this->director = $directorSerie;
                $this->clasificacion = $clasificacionSerie;
                $this->genero = $generoSerie;
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

    }
    
?>