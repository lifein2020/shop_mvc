<?

class Product {
  private $id; // данные которые пришли из бд делаем приватными
  private $name;
  private $price;
  private $desc;
  private $image;
  
  public function __construct($id, $name, $price, $desc, $image) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->desc = $desc;
    $this->image = $image;
  }
  
  public function __get($property) {
    return $this->$property;
  }
  
  public static function getAll() {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `products` WHERE 1");//перебирает все элементы бд
    for($data = []; $row = $result->fetch_assoc(); $data[] = new Product($row['id'], $row['name'], $row['price'], $row['discription'], $row['image']) ); // i это пустой массив $data = [], пока fetch_assoc() может перебирать наши данные из бд, он выдает ассоциативный массив, когда не может выдает Null и цикл перестает работать, $data[] = new Product(сокращенный push) - на каждом шаге цикла создай массив из наших продуктов
    //for($data = []; $row = $result->fetch_assoc(); $data[] = $row); //data[] = $row(сокращенный push) - на каждом шаге цикла создай массив из наших объектов
    //while($row = $result->fetch_assoc() ) {}
    
    return $data;
  }
  
  public static function getById($id) {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `products` WHERE `id`='$id'")->fetch_assoc(); // ищет товар с определенным id
    if(isset($result)) { //если result не равен NULL
      return new Product($result['id'], $result['name'], $result['price'], $result ['discription'], $result['image']);//тогда возвращай продукт(1 элемент) с данными из бд
    }
    return null;
  }
  
}

