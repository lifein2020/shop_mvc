<?
class HomeController {
  
  public function index() {
    require_once('models/Product.php');
    $lastProductId = $_COOKIE['lastProduct']; // получаем id товара из записанной нами cookie
    $lastProduct = Product::getById($lastProductId); // получаем товар по id
    require_once('views/home.php'); //подключает код на страницу и выводит на index. ('Путь указываем относительно index.php, на который выходим с любой страницы')
    var_dump($lastProduct);
    require_once('views/template.php');//вызывает шаблон
  }
}