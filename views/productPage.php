<?
$title = "$product->name";

$style = "";

$content = "
<div class=\"container\">
  <div class=\"row justify-content-center mt-5\">
    <div class=\"col-8\">
      <div class=\"row\">
        <div class=\"col-6\" style=\"background-image: url(/resource/img/$product->image); background-size: cover; background-position: 50% 50%\"></div>
        <div class=\"col-6\">
          <h1>$product->name</h1>
          <h3>$product->price руб.</h3>
          <p>$product->desc</p>
          <!-- <a class=\"btn btn-primary\" href=\"/cart/add/$product->id\">Добавить в корзину</a> -->
          <button class=\"btn btn-primary addButton\" productId=\"$product->id\" >Добавить в корзину</button>
        </div>
      </div>  
    </div>
  </div>
</div>
";

$scripts = "<script src=\"/resource/js/addToCart.js\"></script>";