<div>
<link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">          
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/EpisodioController.php');     
    ?>
        <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">EPISODIOS</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Temporada</div>
                        <div class="item_column">Número</div>
                        <div class="item_column">Titulo</div>
                        <div class="item_column">Duración</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaEpisodios = listarEpisodios();
        if (count($listaEpisodios) > 0)
        {  
                foreach($listaEpisodios as $episodio)
                    {
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $episodio->getId(); ?></div>
                        <div class="item_column" data-label="IdTemporada"><?php echo $episodio->getTemporadaId(); ?></div>
                        <div class="item_column" data-label="Numero"><?php echo $episodio->getNumero(); ?></div>
                        <div class="item_column" data-label="Titulo"><?php echo $episodio->getTitulo(); ?></div>
                        <div class="item_column" data-label="Duracion"><?php echo $episodio->getDuracion(); ?></div>
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $episodio->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-episodio" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="epiformId" value="<?php echo $episodio->getId();?>"/>
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                 </div>
                            </div>                        
                        </li>
                    <?php
                    }
                ?>
            </ul>
         </div>
    <?php
        }
        else
        {
    ?>           
            <div class="alerta alerta-warning" role="alert">
                Aun no existen episodios.
            </div>
    <?php
        }
    ?>
</div>