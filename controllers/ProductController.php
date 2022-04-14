<?

class ProductController {
  
    public function catalog() {
      require_once("models/Product.php");
      $products = Product::getAll();//статичный метод принимает список продуктов из Product.php
      //var_dump($products);
      require_once("views/catalog.php");
      require_once("views/template.php");
    }
    
    //запрвшивает продукт из бд по id
    public function productPage($id) {
      require_once("models/Product.php");
      $product = Product::getById($id);
      
      if (isset($product)) {
        setcookie("lastProduct", $product->id, time() + 60*60*24*7, "/"); // lastProduct название cookie, $product->id свойство cookie, time время жизни неделя, "/" видно на всех страницах сайта. Cookie живет в браузере
        require_once('views/productPage.php');
      } else {
        require_once('views/product404.php');
      }
      
      require_once('views/template.php');
      
    }
}