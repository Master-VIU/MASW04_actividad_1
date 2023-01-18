<?php

    require_once('../utils/Database.php');

    class Idioma
    {

        private $id;
        private $nombre;
        private $isoCode;
        private $database;

    private function __constructor($idIdioma, $nombreIdioma, $isoCodeIdioma)
    {
        $this->id = $idIdioma;
        $this->nombre = $nombreIdioma;
        $this->isoCode = $isoCodeIdioma; 
        $this->database = new Database();
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


        /**
         * Método encargado de obtener todos los idiomas
         * que existan en la tabla Idiomas.
         */
        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = ("SELECT * FROM filaviu.idiomas");
            $result = $connection->query($query);
            $listLanguages = [];

            foreach ($query as $language)
            {
                $languageObjet =  new Idioma($language['id'], $language['nombre'], $language['isoCode']);
                array_push($listLanguages, $languageObjet);
            }

            $this->database->closeConnection();

            return $listLanguages;
        }

        /**
         * Método que obtiene un idioma 
         * por su id
         */

        public function get()
        {
            $languageObjet = null;
            $connection = $this->database->getConnection();

            $query = ("SELECT * FROM filaviu.idiomas WHERE id = " .$this->id;
            $result = $connection->query($query);

            foreach ($query as $language)
            {
                $languageObjet = new Idioma($language['id'], $language['nombre'], $language['isoCode']);
                break;

            }
            $this->database->closeConnection();
            return $languageObjet;
        }

        /**
         * Método que realiza la creacón de un nuevo idioma.
         */

        public function create()
        {
            $languageCreated = false;
            $connection = $this->database->getConnection();
            
            if($resultInsert = $mysqli->query(
                "INSERT INTO filaviu.idiomas (nombre, isoCode) VALUES (' $this->nombre, $this->isoCode ')"))
            {
                $languageCreated = true;
            }

            $this->database->closeConnection();
            return $languageCreated;
            
        }

        /**
         * Metodo que actualiza un registro en bbdd
         */

        public function update()
        {
            $idiomaActualizado = false;
            $connection = $this->database->getConnection();

            $query = "UPDATE filaviu.idioma set nombre = '$this->nombre ', isoCode = '$this->isoCode ' WHERE id = ".$this->id;

            if($this->exists())
            {
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
            $connection = $this->database->getConnection();
            $query = "DELETE FROM filaviu.idioma WHERE id = ".$this->id;

            if($this->exists())
            {
                if($resultRemove = $connection->query($query))
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
}
?>