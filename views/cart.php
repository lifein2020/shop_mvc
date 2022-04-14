<?
$title = "Корзина"; // пути в html через href и src тоже являются запросами и отлавливаются .htaccess и приводят на index.php. Поэтому для картинок,скриптов и css необходимо делать папку исключение. 

$style = "";

$content = "
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-12\">
          <h1 class='text-center'>Корзина</h1>
        </div>
";

for($i=0; $i < count($products); $i++) {
  $product = $products[$i];
  $description = mb_substr($product->desc, 0, 10);
  $content .="
    <div class=\"col-4\">
      <div class=\"card\" style=\"\">
        <div class=\"card-img-top\" style=\"height: 20rem; background-image: url(/resource/img/$product->image); background-size: cover; background-position: 50% 50%\"></div>   
        <div class=\"card-body\">
          <h5 class=\"card-title\">$product->name</h5>
          <h6 class=\"card-title\">$product->price руб.</h6>
          <p class=\"card-text\">$description...</p>
          <a href=\"/cart/remove/$i\" class=\"btn btn-danger\">Удалить</a>
        </div>
      </div>
    </div> 
  
  ";
}

$content .= "
      </div>
    </div>
";

$scripts = "";