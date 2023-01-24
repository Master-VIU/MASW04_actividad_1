<?php
   include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php';

    class Idioma
    {

        private $id;
        private $nombre;
        private $isoCode;
        private $database;

    private function constructor($idIdioma, $nombreIdioma, $isoCodeIdioma)
    {
        $this->id = $idIdioma;
        $this->nombre = $nombreIdioma;
        $this->isoCode = $isoCodeIdioma; 
        $this->database = new Database();
    }

    public function constructorVacio()
    {
        $this->database = new Database();
    }

    public function constructorUnParametro($idIdioma)
    {
        $this->id = $idIdioma;
        $this->database = new Database();
    }

    public function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();

        if ($num_params == 0) {
            call_user_func_array(array($this,'constructorVacio'),$params);
        } elseif($num_params == 1)
        {
            call_user_func_array(array($this,'constructorUnParametro'),$params);
        }
        else {
            call_user_func_array(array($this,'constructor'),$params);
        }
    }

         /**
         * Método encargado de obtener todos los idiomas
         * que existan en la tabla Idiomas.
         */
        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.idiomas";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $idioma =  new Idioma($item['ID'], $item['NOMBRE'], $item['ISO_CODE']);
                array_push($listData, $idioma);
            }

            $this->database->closeConnection();

            return $listData;
        }

        /**
         * Método que obtiene un idioma 
         * por su id
         */

        public function get()
        {
           
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.idiomas WHERE ID = " .$this->id;
            $result = $connection->query($query);

            $idioma = null;
            foreach ($result as $item)
            {
                $idioma = new Idioma($item['ID'], $item['NOMBRE'], $item['ISO_CODE']);
            }

            $this->database->closeConnection();
            return $idioma;
        }
       
        /**
         * Método que realiza la creacón de un nuevo idioma.
         */

        public function create()
        {
            $idiomaCreado = false;            
            if($this->existsNameCode())
            {
                $connection = $this->database->getConnection();
                if($resultInsert = $connection->query(
                    "INSERT INTO filmaviu.idiomas (NOMBRE, ISO_CODE) VALUES ('$this->nombre', '$this->isoCode')"
                ))
                {
                    $idiomaCreado = true;
                }
            }

            $this->database->closeConnection();
            return $idiomaCreado;
            
        }
        

        /**
         * Metodo que actualiza un registro en bbdd
         */

        public function update()
        {
            $idiomaActualizado = false;            
            $query = "UPDATE filmaviu.idiomas set nombre = '$this->nombre', iso_code = '$this->isoCode' WHERE id = " . $this->id;
                     
            if($this->existsNameCode())
            {
                $connection = $this->database->getConnection();
                if($resultInsert = $connection->query($query))
                {
                    $idiomaActualizado = true;
                }
            }

            $this->database->closeConnection();
            return $idiomaActualizado;
        }

        /**
         * Metodo que elimina un registo de bbdd
         */
        public function remove()
        {
            $idiomaBorrado = false;
            $query = "DELETE FROM filmaviu.idiomas WHERE id = ".$this->id;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($connection->query($query))
                {
                    $idiomaBorrado = true;
                }
            }
            $this->database->closeConnection();
            return $idiomaBorrado;
        }

        /**
         * Metodo que comprueba si el registro existe en bbdd
         */
        public function exists()
        {
            $existeIdioma = false;
            $idioma = $this->get();
            if($idioma != null)
            {
                $existeIdioma = true;
            }
            return $existeIdioma;
        }

        public function existsNameCode()
        {
            $existeIdioma = false;
            $idioma = $this->getNameCode();
            if($idioma == null)
            {
                $existeIdioma = true;
            }
            return $existeIdioma;
        }

        public function getNameCode()
        {
           
            $connection = $this->database->getConnection();

            $queryName = "SELECT * FROM filmaviu.idiomas WHERE NOMBRE = '$this->nombre'";
            $queryCode = "SELECT * FROM filmaviu.idiomas WHERE ISO_CODE = '$this->isoCode'";
            $resultName = $connection->query($queryName);
            $resultCode = $connection->query($queryCode);       

            $idiomaName = null;
            $idiomaCode = null;
            foreach ($resultName as $item)
            {
                $idiomaName = new Idioma($item['ID'], $item['NOMBRE'], $item['ISO_CODE']);
            }
            foreach($resultCode as $item2)
            {
                $idiomaCode = new Idioma($item2['ID'], $item2['NOMBRE'], $item2['ISO_CODE']);
            }           
            
            if(($idiomaName != null) && ($idiomaCode != null))
            {
                return $idiomaCode;
            }
            
            $this->database->closeConnection();
            return null;
           
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
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

         /**
         * @return mixed
         */
        public function getIsoCode()
        {
            return $this->isoCode;
        }

        /**
         * @param mixed $isoCode
         */
        public function setIsoCode($isoCode)
        {
            $this->isoCode = $isoCode;
        }
}
?>