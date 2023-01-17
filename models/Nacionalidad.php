<?php


    class Nacionalidad{

        private $id;
        private $pais;


        function __constructor($idNacionalidad, $paisNacionalidad){
            $this->id = $idNacionalidad;
            $this->pais = $paisNacionalidad;
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
        public function getPais()
        {
            return $this->pais;
        }

        /**
         * @param mixed $pais
         */
        public function setPais($pais)
        {
            $this->pais = $pais;
        }
    }
?>