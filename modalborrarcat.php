<div class="modal fade" id="modalborrarcat<?php echo $fila['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                Atencion
             </div>
             <div class="modal-body">
                Desea eliminar la categoria <?php echo $fila['nombre'];?>?
                
             </div>
             <p class="debug-url"></p>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                 <?php echo "<a class='btn btn-danger btn-ok' href='cat_delete.php?id=".$fila['id']."' >Borrar</a>";?>
            </div>
         </div>
     </div>
</div>