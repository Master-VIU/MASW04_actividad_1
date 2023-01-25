<?php

require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
class Portada

{
        private $id;
        private $imagen;
        private $database;

        function __construct($idPortada, $imagenPortada)
        {

            $this->id = $idPortada;
            $this->imagen = $imagenPortada;
            $this-> database= Database::getInstance();
        }
        
      /** Este metodo se encarga de obtener 
       * todas las portadas de la bbdd
       */

        function getAll()
        {
            $connection = $this->database -> getconnection(); 
            $query ="SELECT * FROM filmaviu.portada";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $portada =  new Portada($item['ID'], $item['IMAGEN']);
                array_push($listData, $portada);
            }

            $this->database->closeConnection();

            return $listData;
        }
        
        /**Ese metodo se encarga de obtener una portada
         * en especifico usando su id 
         * */


        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.portada WHERE ID = '$this->id'";
            $result = $connection->query($query);

            $portada = null;
            foreach ($result as $item)
            {
                $portada = new Portada($item['ID'], $item['IMAGEN']);
            }

            $this->database->closeConnection();
            return $portada;
        }   
        
        /** Este metodo permite crear una nueva portada
         *  */    

        public function create()
        {
            $portadaCreada = false;
           $connection = $this->database->getConnection();
           if($resultInsert = $connection->query("INSERT INTO filmaviu.idiomas (IMAGEN) VALUES ('$this->imagen')"))
            {
                $portadaCreada = false;
            }

            $this->database->closeConnection();
            return $portadaCreada;

        }
        
        /**Este metodo permte actualizar una portada ya creada en bbdd */

        public function update()
        {
            $portadaActualizada = false;
            $connection = $this->database->getConnection();
            $query = "UPDATE filmaviu.portada set IMAGEN = '$this->imagen' WHERE id = '$this->id'";

            if ($this->exists())
            {
                if ($resultInsert = $connection->query($query))
                {
                    $portdaActualizada = true;
                }
            }

            $this->database->closeConnection();
            return $portadaActualizada;
        }

        /**
         * Metodo que elimina una portada de bbdd
         */
        public function remove()
        {
            $portadaBorrada = false;
            $query = "DELETE FROM filmaviu.portada WHERE id = '$this->id'";

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($connection->query($query))
                {
                    $portadaBorrada = true;
                }
            }
            $this->database->closeConnection();
            return $portadaBorrada;
        }


        /**Metodp que comprueba si un registro existe en la bbdd
         * 
         */
        public function exists()
        {
            $existeportada = false;
            $portada = $this->get();
            if($portada != null)
            {
                $existeportada = true;
            }
            return $existeportada;
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
        public function getImagen()
        {
            return $this->imagen;
        }

        /**
         * @param mixed $imagen
         */
        public function setImagen($imagen)
        {
            $this->imagen = $imagen;
        }

    }
?>