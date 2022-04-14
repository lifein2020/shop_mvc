<?

class CartController {
  public function index() {
    //отображение корзины
    require_once('models/Product.php');
    session_start();// перед стартом сесии подключаем классы, чтобы считать объекты класса
    if ( !isset($_SESSION['cart']) or count($_SESSION['cart']) == 0 ) {
      require_once('views/emptyCart.php');
    } else {
      $products = $_SESSION['cart'];
      require_once('views/cart.php');
    }
    require_once('views/template.php');
  }
  public function addProduct($id) {
    //добавление в корзину
    require_once('models/Product.php');
    $product = Product::getById($id);
    
    //сессия должна быть запущена до отправки заголовков,т.е. никакого html сода до
    if( !isset($product) ) exit("Такого товара не существует!");
    session_start();
    $_SESSION['cart'][] = $product; //[] это push
    exit("Товар добавлен в корзину");
  }
  public function removeProduct($index) {
    //удаление из корзины
    require_once('models/Product.php');
    session_start();
    array_splice($_SESSION['cart'], $index, 1);
    header("Location: /cart");
  }
}

