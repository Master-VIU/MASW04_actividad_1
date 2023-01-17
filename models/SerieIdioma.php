<?php


    class SerieIdioma{
        private $idSerie;
        private $idIdioma;

        function __constructor($idSerieIdioma, $idIdiomaSerie){
            $this->idSerie = $idSerieIdioma;
            $this->idIdioma = $idIdiomaSerie;
        }

                 /**
         * @return mixed
         */
        public function getIdSerie()
        {
            return $this->idSerie;
        }

        /**
         * @param mixed $idSerie
         */
        public function setIdSerie($idSerie)
        {
            $this->idSerie = $idSerie;
        }

           /**
         * @return mixed
         */
        public function getIdIdioma()
        {
            return $this->idIdioma;
        }

        /**
         * @param mixed $idIdioma
         */
        public function setIdIdioma($idIdioma)
        {
            $this->idIdioma = $idIdioma;
        }
    }
?>