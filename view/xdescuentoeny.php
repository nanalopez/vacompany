<?php
include 'layouts/head.php';
include '../db/conexion.php';



class xdescuentoeny extends Conection{

   
      //Conexion
      protected static $conection;

      private static function getConect(){
          self::$conection = Conection::conectar();
      }
  
      private static function getDesconect(){
          self::$conection = null;
      }

      public static function producto(){
        $id = $_GET['id'];

        $query = "SELECT DISTINCT p.id,p.referencia,p.sku,p.descripcion,p.talla,p.color,pr.valor FROM producto p INNER JOIN leaderlist ON p.id = leaderlist.producto_id INNER JOIN precio pr ON leaderlist.producto_id = pr.leaderlist_id WHERE p.id like $id";

        self::getConect();
        $result=self::$conection->prepare($query);

        $result->execute();

   
        $row = $result->fetchAll();

        return $row;
    }
}


$fila = xdescuentoeny::producto();
?>


<br>
<a name="" id="" class="btn btn-primary" href="index.php" role="button">Volver</a>

<?php
echo ' <br><br><center><h1>X descuento en Y</h1></center><br>' ;
$id = $_GET['id'];



// echo 'Este es el producto con ID '.$id;


foreach($fila as $producto){

?>


<div style=" display:flex; align-items: center; justify-content: space-around;flex-direction:row;">

    <div style=" display:flex; align-items: center;flex-direction:column;">
        <h2>Por la compra de: </h2>
        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h5 class="card-title"><?php echo $producto['descripcion']; ?></h5>
                <p class="card-text">Color: <?php echo $producto['color']; ?></p>
                <p class="card-text">Talla: <?php echo $producto['talla']; ?></p>
            </div>
            <ul class="list-group list-group-flush">
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Aplicar descuento</a>

            </div>
        </div>

    </div>

    <div style=" display:flex; align-items: center; flex-direction:column;">
        <h3>Lleva el siguiente producto con el % de descuento: </h3>
        <div class="form-group">
          <label for=""></label>
          <select class="form-control" name="" id="">
            <option value=""></option>
            <option>Lorem ipsum</option>
            <option>Lorem ipsum dolor</option>
            <option>Lorem ipsum dolor sit amet</option>
          </select>
        </div>

    </div>
</div>
<?php
}
include 'layouts/footer.php';
?>