<?php


    class SerieActor{
        private $idSerie;
        private $idActor;

        function __constructor($idSerieActor, $idActorSerie){
            $this->idSerie = $idSerieActor;
            $this->idActor = $idActorSerie;
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