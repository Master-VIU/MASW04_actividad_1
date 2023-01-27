<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
class PeliculaIdioma
    {
        private $idPelicula;
        private $idIdioma;
        private $tipo;

        function constructor($idPelicula, $idIdioma, $tipo)
        {
            $this->idPelicula = $idPelicula;
            $this->idIdioma = $idIdioma;
            $this->tipo = $tipo;
            $this->database = Database::getInstance();
        }

        public function constructorVacio()
        {
            $this->database = Database::getInstance();
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

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.pelicula_idiomas";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item) 
            {
                $peliculaIdioma = new PeliculaIdioma($item['ID_PELICULA'], $item['ID_IDIOMA'], $item['TIPO']);
                array_push($listData, $peliculaIdioma);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.pelicula_idiomas WHERE ID_PELICULA = ".$this->idPelicula;
            $result = $connection->query($query);

            $peliculaIdioma = null;
            foreach ($result as $item)
            {
                $peliculaIdioma = new PeliculaIdioma($item['ID_PELICULA'], $item['ID_IDIOMA'], $item['TIPO']);
            }

            $this->database->closeConnection();
            return $peliculaIdioma;
        }

        public function create()
        {
            $peliculaIdiomaCreate = false;
            $connection = $this->database->getConnection();
            if($resultInsert = $connection->query(
                "INSERT INTO filmaviu.pelicula_idiomas (ID_PELICULA, ID_IDIOMA, TIPO) VALUES ($this->idPelicula, $this->idIdioma, '$this->tipo')"
            ))
            {
                $peliculaIdiomaCreate =  true;
            }

            $this->database->closeConnection();
            return $peliculaIdiomaCreate;
        }

        public function update()
        {
            $peliculaIdiomaActualizado = false;            
            $query = "UPDATE filmaviu.pelicula_idiomas set ID_PELICULA = '$this->idPelicula', ID_IDIOMA = '$this->idIdioma', TIPO = '$this->tipo' WHERE ID_PELICULA = ".$this->idPelicula;
            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultInsert = $connection->query($query))
                {
                    $peliculaIdiomaActualizado = true;
                }
            }
            $this->database->closeConnection();
            return $peliculaIdiomaActualizado;
        }

        public function remove()
        {
            $peliculaIdiomaBorrado = false;           
            $query = "DELETE FROM filmaviu.pelicula_idiomas WHERE ID_PELICULA = ".$this->idPelicula;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultRemove = $connection->query($query))
                {
                    $peliculaIdiomaBorrado = true;
                }
            }
            $this->database->closeConnection();
            return $peliculaIdiomaBorrado;
        }

            public function exists()
            {
                $existePeliculaIdioma = false;
                $peliculaIdioma = $this->get();
                if($peliculaIdioma != null)
                {
                    $existePeliculaIdioma = true;
                }
                return $existePeliculaIdioma;
            }

        public function getAllIdiomasTipo(){

            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.pelicula_idiomas ID_IDIOMA WHERE TIPO = '$this->tipo' AND ID_PELICULA = ".$this->idPelicula;
            $result = $connection->query($query);
            $peliculaIdioma = null;
            foreach ($result as $item)
            {
                $peliculaIdioma = new PeliculaIdioma($item['ID_PELICULA'], $item['ID_IDIOMA'], $item['TIPO']);
            }

            $this->database->closeConnection();
            return $peliculaIdioma;
        }

        public function getAllIdiomas(){

            $connection = $this->database->getConnection();
            $query = "SELECT * FROM filmaviu.pelicula_idiomas ID_IDIOMA WHERE ID_PELICULA = ".$this->idPelicula;
            $result = $connection->query($query);
            $peliculaIdioma = null;
            foreach ($result as $item)
            {                
                $peliculaIdioma = new PeliculaIdioma($item['ID_PELICULA'], $item['ID_IDIOMA'], $item['TIPO']);
            }

            $this->database->closeConnection();
            return $peliculaIdioma;
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

        /**
         * @return mixed
         */
        public function getTipo()
        {
            return $this->tipo;
        }

        /**
         * @param mixed $tipo
         */
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

    }
?>