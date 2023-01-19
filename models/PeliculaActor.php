<?php
   require_once('../utils/Database.php');

    class PeliculaActor
    {
        private $idPelicula;
        private $idActor;

        function constructor($idPelicula, $idActor)
        {

            $this->idPelicula = $idPelicula;
            $this->idActor = $idActor;
            $this->database = new Database();
        }

        public function constructorVacio()
        {
            $this->database = new Database();
        }

        public function __construct()
        {
            $params = func_get_args();
            $num_params = func_num_args();

            if ($num_params == 0) {
                call_user_func_array(array($this,'constructorVacio'),$params);
            } else {
                call_user_func_array(array($this,'constructor'),$params);
            }
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

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filaviu.pelicula_actores";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item) 
            {
             $peliculaActor = new PeliculaActor($item['idPelicula'], $item['idActor']);
             array_push($listData, $peliculaActor);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filaviu.pelicula_actores WHERE ID = ".$this->id;
            $result = $connection->query($query);

            $peliculaActor = null;
            foreach ($result as $item) 
            {
             $peliculaActor = new PeliculaActor($item['idPelicula'], $item['idActor']);
            }

            $this->database->closeConnection();
            return $peliculaActor;
        }


    }
?>