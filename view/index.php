<?php
include 'layouts/head.php';
//include 'layouts/menu.php';
include '../controller/descuentoController.php';
header ('Content-type: text/html; charset=utf-8');

$row = descuentoController::producto();

//echo json_encode($row);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>




<h2>Descuentos de productos</h2>
<br>
<table id="table_id" class="table table-striped table-inverse table-responsive">
    
    <thead class="thead-inverse">

        <tr>
            
            <th>Id</th>
            <th>Referencia</th>
            <th>Código SKU</th>
            <th>Descripcion</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Tipo de descuento</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($row as $producto){ ?>
        <tr>
            <td scope="row"><?php echo $producto["id"]?></td>
            <td><?php echo $producto["referencia"]?></td>
            <td><?php echo $producto["sku"]?></td>
            <td><?php echo $producto["descripcion"]?></td>
            <td><?php echo $producto["talla"]?></td>
            <td><?php echo $producto["color"]?></td>
            <td><?php echo $producto["valor"]?></td>
            <td> 
            <form action="index.php" >    
            <select name="miselector" id="miselector" onchange="location = this.value;">
                <option selected disabled> </option>
                <option value="<?php echo 'descuento1xn.php?m=1xN&id='.$producto["id"]; ?>">Descuento 1xN </a></option>
                <option value="<?php echo 'xdescuentoeny.php?m=XenY&id='.$producto["id"]; ?>">X descuento en Y</option>
                <option value="<?php echo 'descuentoxmonto.php?m=DxM&id='.$producto["id"]; ?>">Descuento X monto </option>
                <option value="<?php echo 'gratis.php?m=gratis&id='.$producto["id"]; ?>">Gratis</option>
            </select>
            
            </form> 
            </td>
        </tr>
        <?php  }    ?>
        

    </tbody>
</table>




<script >
      $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
    </script>
<?php
include 'layouts/footer.php';
?>