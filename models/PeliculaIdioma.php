<?php
require_once('../utils/Database.php');
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

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filaviu.pelicula_idiomas";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item) 
            {
                $peliculaIdioma = new PeliculaIdioma($item['idPelicula'], $item['idIdioma'], $item['tipo']);
                array_push($listData, $peliculaIdioma);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filaviu.pelicula_idiomas WHERE ID = ".$this->idPelicula;
            $result = $connection->query($query);

            $peliculaIdioma = null;
            foreach ($result as $item)
            {
                $peliculaIdioma = new PeliculaIdioma($item['idPelicula'], $item['idIdioma'], $item['tipo']);
            }

            $this->database->closeConnection();
            return $peliculaIdioma;
        }

        public function create()
        {
            $peliculaIdiomaCreate = false;
            $connection = $this->database->getConnection();

            if($resultInsert = $connection->query(
                "INSERT INTO filaviu.pelicula_idiomas (idPelicula, idIdioma, tipo) VALUES ('$this->idPelicula, $this->idIdioma, $this->tipo ')"
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
            $connection = $this->database->getConnection();
            $query = "UPDATE filaviu.pelicula_idiomas set idPelicula = ' $this->idPelicula', idIdioma = ' $this->idIdioma ', tipo = ' $this->tipo ' WHERE id = ".$this->idPelicula;

            if($this->exists())
            {
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

            $connection = $this->database->getConnection();
            $query = "DELETE FROM filaviu.pelicula_idiomas WHERE ID = ".$this->idPelicula;

            if($this->exists())
            {
                if($resultRemove = $connection->query($query))
                {
                    $peliculaIdiomaBorrado = true;
                }
            }
            $this->database->closeConnection();
            return $peliculaIdiomaBorrado;
        

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
    }
?>