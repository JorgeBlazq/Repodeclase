<?php
echo "<HTML>
   <HEAD> 
      <TITLE> Compra Productos </TITLE>
      <meta charset='utf-8'>   
      <meta name='author' content='Jorge Blazquez'>
   </HEAD>
<BODY>";


    #Jorge Blazquez Alvarez
//SELECT NOMBRE, CANTIDAD FROM `producto`, `almacena` WHERE producto.ID_PRODUCTO = almacena.ID_PRODUCTO GROUP BY almacena.ID_PRODUCTO
        
  
    try {
      if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
        exit("No se ha iniciado sesion");
      }


      if (!isset($_SESSION['SHOPPING_CART']))
        $_SESSION['SHOPPING_CART'] = array();


      print_r($_SESSION['SHOPPING_CART']);
      $servername = "localhost";
      $username = "root";
      $password = "rootroot";
      $dbname = "comprasweb";
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
      if (!isset($_POST) || empty($_POST)) { 
        $producto = $conn->prepare("SELECT producto.ID_PRODUCTO AS ID_PRODUCTO, NOMBRE, SUM(CANTIDAD) AS CANTIDAD FROM `producto`, `almacena` WHERE producto.ID_PRODUCTO = almacena.ID_PRODUCTO GROUP BY almacena.ID_PRODUCTO");
        $producto->execute();
        $productos=$producto->fetchAll(PDO::FETCH_ASSOC);
        echo "<form name='compra' action='comcomprod.php' method='POST'>
        <H1>Selecciona el producto</H1>
        Producto:   
        <select name='producto'>";
            foreach($productos as $producto){
              echo '<option value='.$producto['ID_PRODUCTO'].'>'.$producto['NOMBRE'].' stock: '.$producto['CANTIDAD'].'</option>';
            }      
            ?>
        </select>
        <br>
        <label for="cantidad">Cantidad: </label>
        <input type="text" name="cantidad">
        </br>
        <br>
     
        <input type="submit" name="Selecciona" placeholder="Selecciona" value="Mostrar productos">

        </FORM>

<?php        
        }else{
          $_SESSION['SHOPPING_CART'][$_POST['producto']] = $_POST['cantidad'];
          echo "producto añadido al carrito";
          print_r($_SESSION['SHOPPING_CART']);
           } 
           
    }catch(PDOException $e)
        {  
            echo "Se ha producido el siguiente Error : <br><br>" . $e->getMessage();
        }

        $conn = null;   
         echo "</BODY>
</HTML>";
?>

