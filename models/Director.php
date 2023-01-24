<?php

    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php';
    class Director
    {

        private $id;
        private $nombre;
        private $apellidos;
        private $dni;
        private $fechaNacimiento;
        private $nacionalidad;
        private $database;


        function constructor($idDirector, $nombreDirector,
                             $apellidosDirector, $dniDirector, $fechaNacimientoDirector, $nacionalidadDirector)
        {

            $this->id = $idDirector;
            $this->nombre = $nombreDirector;
            $this->apellidos = $apellidosDirector;
            $this->dni = $dniDirector;
            $this->fechaNacimiento = $fechaNacimientoDirector;
            $this->nacionalidad = $nacionalidadDirector;
            $this->database = new Database();
        }

        public function constructorVacio()
        {
            $this->database = new Database();
        }
    
        public function constructorUnParametro($idDirector)
        {
            $this->id = $idDirector;
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

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.directores";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $director = new Director($item['ID'], $item['NOMBRE'], $item['APELLIDOS'], $item['DNI'], $item['FECHA_NACIMIENTO'], $item['NACIONALIDAD']);
                array_push($listData, $director);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
           
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.directores WHERE ID = " .$this->id;
            $result = $connection->query($query);

            $director = null;
            foreach ($result as $item)
            {
                $director = new Director($item['ID'], $item['NOMBRE'], $item['APELLIDOS'], $item['DNI'], $item['FECHA_NACIMIENTO'], $item['NACIONALIDAD']);
            }

            $this->database->closeConnection();
            return $director;
        }

        function create()
        {
            $directorCreado = false;
            if(!$this->existsDni())
            {
                $connection = $this->database->getConnection();  

                $queryNacionalidad = "SELECT PAIS FROM filmaviu.nacionalidades WHERE ID = " .$this->nacionalidad;
                
                echo $queryNacionalidad;      
                if($resultInsert = $connection->query(
                    "INSERT INTO filmaviu.directores (NOMBRE, APELLIDOS, DNI, FECHA_NACIMIENTO, NACIONALIDAD) VALUES 
                    ('$this->nombre', '$this->apellidos', '$this->dni', '$this->fechaNacimiento', '$this->nacionalidad')"
                ))
                {
                    $directorCreado = true;
                }
            } 
            $this->database->closeConnection();
            return $directorCreado;
        }

        public function update()
        {
            $directorActualizado = false;         
                $query = "UPDATE filmaviu.directores set nombre = '$this->nombre', apellidos = '$this->apellidos', dni = '$this->dni', fecha_nacimiento = '$this->fechaNacimiento',
                nacionalidad = '$this->nacionalidad' WHERE id = " . $this->id;
                        
                if($this->exists())
                {
                    $connection = $this->database->getConnection();
                    if($resultInsert = $connection->query($query))
                    {
                        $directorActualizado = true;
                    }
                }
            $this->database->closeConnection();
            return $directorActualizado;
        }

        function remove()
        {
            $directorBorrado = false;
            $query = "DELETE FROM filmaviu.directores WHERE id = ".$this->id;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($connection->query($query))
                {
                    $directorBorrado = true;
                }
            }
            $this->database->closeConnection();
            return $directorBorrado;
        }

        public function exists()
        {
            $existeDirector = false;
            $director = $this->get();
            if ($director != null)
            {
                $existeDirector = true;
            }
            return $existeDirector;
        }


        public function existsDni()
        {
            $connection = $this->database->getConnection();
            $existeDirector = false;

            if($this->dni != null)
            {
                $query = "SELECT ID FROM filmaviu.directores WHERE DNI = '$this->dni'";
                $result = $connection->query($query);
                $director = null;
                foreach ($result as $item)
                {
                    $director = new Director(
                        $item['ID']
                    );
                }
                if ($director != null)
                {
                    $existeDirector = true;
                }
            }
            $this->database->closeConnection();
            return $existeDirector;
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
        public function getApellidos()
        {
            return $this->apellidos;
        }

        /**
         * @param mixed $apellidos
         */
        public function setApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }

        public function getDni()
        {
            return $this->dni;
        }

        /**
         * @param mixed $dni
         */
        public function setDni($dni)
        {
            $this->dni = $dni;
        }

        /**
         * @return mixed
         */
        public function getFechaNacimiento()
        {
            return $this->fechaNacimiento;
        }

        /**
         * @param mixed $fechaNacimiento
         */
        public function setFechaNacimiento($fechaNacimiento)
        {
            $this->fechaNacimiento = $fechaNacimiento;
        }

        /**
         * @return mixed
         */
        public function getNacionalidad()
        {
            return $this->nacionalidad;
        }

        /**
         * @param mixed $nacionalidad
         */
        public function setNacionalidad($nacionalidad)
        {
            $this->nacionalidad = $nacionalidad;
        }


    }
?>