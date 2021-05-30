
<div class="modal fade" id="modalborrar<?php echo $fila['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                Atencion
             </div>
             <div class="modal-body">
                Desea eliminar el producto <?php echo $fila['nombre'];?>?
                
             </div>
             <p class="debug-url"></p>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                 <?php echo "<a class='btn btn-danger btn-ok' href='prod_delete.php?id=".$fila['id']."' >Delete</a>";?>
            </div>
         </div>
     </div>
</div>
