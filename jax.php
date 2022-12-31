<?php

include "db.php"; // подключение к базе данных
 
$countView = $_POST['count_add'];  // количество товаров, получаемых за один раз
$startIndex = $_POST['count_show']; // с какого товара начать выборку
 
// запрос к бд
$sql = mysqli_query($link, " SELECT * FROM `products` LIMIT $startIndex ,$countView ");
$newsData = array();
while($result = mysqli_fetch_assoc($sql)){
    $newsData[] = ['name' =>$result['name'] , 'price'=> $result['price']];
}

if(empty($newsData)){
    // если товаров нет
    echo json_encode(array(
        'result'    => 'finish'
    ));
}else{
    // если товар получили из базы, то сформируем html элементы
    // и отдадим их клиенту
    $html = "";
    foreach($newsData as $product){
        $html .= "
             <div>
                <b>{$product['name']}</b>
                <p>{$product['price']}</p>
            </div>
        ";
}

echo json_encode(array(
    'result'    => 'success',
    'html'      => $html
));
}