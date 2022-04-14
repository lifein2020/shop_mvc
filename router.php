<?
require_once('db.php');// подключаем бд
$mvcPath = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);// суперглобальная переменная. Тип фильтра очищающий FILTER_SANITIZE_URL см на php.net
if (mb_substr($mvcPath, -1, 1) == "/") { //если адрес заканчивается на /, то
  $mvcPath = mb_substr($mvcPath, 0, mb_strlen($mvcPath) - 1);//вырежи его оттуда, выдай длину строки-1
}

//В массив кладем разбитую ссылку по разделителю "/"
$path = explode('/', $mvcPath);
//var_dump($path);

if ( !isset($path[1]) or $path[1] == "") { // если не установлен $path[1] или он равен пустоте, т.е.
  // ищется путь http://lifein2020.beget.tech/
  require_once('controllers/HomeController.php'); //подключение к контроллеру('путь к файлу контроллера'). Автоматическое подкл с помощью spl_autoload_register() на codemoo
  $controller = new HomeController();
  $controller->index();
  exit();
  
} elseif ($path[1] == "about" && !isset($path[2]) ) { // && !isset путь дальше $path[2] не находит 
  echo "О магазине";
} elseif ($path[1] == "catalog" && !isset($path[2]) ) {
  
  require_once('controllers/ProductController.php');
  $controller = new ProductController();
  $controller->catalog();
  exit();
  
} elseif ($path[1] == "products" && !isset($path[3]) ) {
  
  if ( !isset($path[2]) ) header("Location: /catalog"); //если после if идет одна команда то {} можно не писать
  
  require_once('controllers/ProductController.php');
  $controller = new ProductController();
  $controller->productPage($path[2]);
  exit();
} elseif ($path[1] == "cart" && !isset($path[4])) {
  require_once('controllers/CartController.php');
  $controller = new CartController();
  if(!isset($path[2])) {
     $controller->index();
    exit();
  }
  elseif($path[2] == "add" && isset($path[3])) { // принимает POST
    $controller->addProduct($path[3]);
    exit();
  }
  elseif($path[2] == "remove" && isset($path[3])) { // принимает POST
    $controller->removeProduct($path[3]);
    exit();
  } else {
    header("Location: /cart");
  }
} else {
  echo "404 not found";
}

