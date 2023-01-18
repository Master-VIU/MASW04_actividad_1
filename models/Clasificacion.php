<?php


    class Clasificacion
    {

        private $id;
        private $tipo;


    public function __construct($idClasificacion, $tipoClasificacion)
    {
        $this->id = $idClasificacion;
        $this->tipo = $tipoClasificacion;
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
        public function getTipo()
        {
            return $this->tipo;
        }

        /**
         * @param mixed $nombre
         */
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

    }
?>