<?php

    require_once('../utils/Database.php');

    class Idioma
    {

        private $id;
        private $nombre;
        private $isoCode;

    private function __construct($idIdioma, $nombreIdioma, $isoCodeIdioma)
    {
        $this->id = $idIdioma;
        $this->nombre = $nombreIdioma;
        $this->isoCode = $isoCodeIdioma; 
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
            $mysqli = new Database();
            $mysql->getConnection();

            $query = $mysqli->query("SELECT * FROM idiomas");
            $listLanguages = [];

            foreach ($query as $language)
            {
                $languageObjet =  new Idioma($language['id'], $language['nombre'], $language['isoCode']);
                array_push($listLanguages, $languageObjet);
            }

            $mysqli->close();

            return $listLanguages;
        }

        /**
         * Método que obtiene un idioma 
         * por su id
         */

        public function getOne()
        {
            $mysqli = new Database();
            $mysql->getConnection();

            $query = $mysqli->query("SELECT * FROM idiomas WHERE id = " .$this->id;);

            foreach ($query as $language)
            {
                $languageObjet = new Idioma($language['id'], $language['nombre'], $language['isoCode']);
                break;
            }
            $mysqli->close();
            return $languageObjet;
        }

        /**
         * Método que realiza la creacón de un nuevo idioma.
         */

        public function createOne()
        {
            $languageCreated = false;
            $mysqli = new Database();
            $mysql->getConnection();    
            
            if($resultInsert = $mysqli->query("INSERT INTO idiomas (nombre, isoCode) VALUES (' $this->nombre, $this->isoCode ')"))
            {
                $languageCreated = true;
            }

            $mysqli->close();
            return $languageCreated;
            
        }
}
?>