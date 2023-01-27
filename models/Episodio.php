<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class Episodio
    {
        private $id;
        private $temporadaId;
        private $numero;
        private $titulo;
        private $duracion;
        private $database;

        private function constructor($idEpisodio, $temporadaIdEpisodio, $numeroEpisodio, $tituloEpisodio, $duracionEpisodio)
        {

            $this->id = $idEpisodio;
            $this->temporadaId = $temporadaIdEpisodio;
            $this->numero = $numeroEpisodio;
            $this->titulo = $tituloEpisodio;
            $this->duracion = $duracionEpisodio;
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
            } 
            else {
                call_user_func_array(array($this,'constructor'),$params);
            }
        }

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.episodios";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $episodio =  new Episodio($item['ID'], $item['TEMPORADA_ID'], $item['NUMERO'], $item['TITULO'], $item['DURACION']);
                array_push($listData, $episodio);
            }

            $this->database->closeConnection();

            return $listData;
        }


        public function get()
        {
           
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.episodios WHERE ID = '$this->id'";
            $result = $connection->query($query);
            $episodio = null;
            foreach ($result as $item)
            {
                $episodio = new Episodio($item['ID'], $item['TEMPORADA_ID'], $item['NUMERO'], $item['TITULO'], $item['DURACION']);
            }

            $this->database->closeConnection();
            return $episodio;
        }
/**--------------------------------------------------------------------- */
public function create()
{
    $episodioCreado = false;
    /**if(!$this->existsEpisodio())
    {*/
        $connection = $this->database->getConnection();

        if ($resultInsert = $connection->query(
            "INSERT INTO filmaviu.episodios (TEMPORADA_ID,NUMERO,TITULO) VALUES ('$this->temporadaId', '$this->numero', '$this->titulo')"
        ))
        {
            $episodioCreado = true;
        }
    /**}*/
    $this->database->closeConnection();
    return $episodioCreado;
}

public function update()
{
    $episodioActualizado = false;
    if(!$this->existsEpisodio())
    {
        $query = "UPDATE filmaviu.episodios set numero = '$this->numero', temporada_id = '$this->temporadaId', titulo = '$this->titulo', duracion = '$this->duracion' WHERE id = '$this->id'";
        echo $query;
        if ($this->exists())
        {
            $connection = $this->database->getConnection();
            if ($resultInsert = $connection->query($query))
            {
                $episodioActualizado = true;
            }
        }
    }
    $this->database->closeConnection();
    return $episodioActualizado;
}

public function remove()
{
    $generoBorrado = false;            
    $query = "DELETE FROM filmaviu.episodios WHERE id = '$this->id'";

    if ($this->exists())
    {
        $connection = $this->database->getConnection();
        if ($resultRemove = $connection->query($query))
        {
            $generoBorrado = true;
        }
    }

    $this->database->closeConnection();
    return $generoBorrado;
}

public function exists()
{
    $existeEpisodio = false;
    $episodio = $this->get();
    if ($episodio != null)
    {
        $existeEpisodio = true;
    }
    return $existeEpisodio;
}


public function existsEpisodio()
{
    $connection = $this->database->getConnection();
    $existeEpisodio = false;

    if($this->titulo != null)
    {
        $query = "SELECT ID FROM filmaviu.episodios WHERE TITULO = '$this->titulo'";
        $result = $connection->query($query);
        $episodio = null;
        foreach ($result as $item)
        {
            $episodio = new Episodio(
                $item['ID'], null, null, null, null
            );
        }
        if ($episodio != null)
        {
            $existeEpisodio = true;
        }
    }
    $this->database->closeConnection();
    return $existeEpisodio;
}






/**---------------------------------------------------------------------- */




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