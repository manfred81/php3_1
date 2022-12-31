<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <style>

    </style>

    <script>
        $(document).ready(function () {

            $('#show_more').click(function () {
                var btn_more = $(this);
                var count_show = parseInt($(this).attr('count_show'));
                var count_add = parseInt($(this).attr('count_add'));
                btn_more.val('Подождите...');

                $.ajax({
                    url: "ajax.php", // куда отправляем
                    type: "post", // метод передачи
                    dataType: "json", // тип передачи данных
                    data: { // что отправляем
                        "count_show": count_show,
                        "count_add": count_add
                    },
                    // после получения ответа сервера
                    success: function (data) {
                        if (data.result == "success") {
                            $('#content').append(data.html);
                            btn_more.val('Показать еще');
                            btn_more.attr('count_show', (count_show + count_add));
                        } else {
                            btn_more.val('Больше нечего показывать');
                        }
                    }
                });
            });

        });
    </script>

</head>
<body>
<div id="content">
    <?php
    // выведем в самом начале 3 продукта
    include_once "db.php";

    $sql = mysqli_query($link, " SELECT * FROM `products` LIMIT 3 ");
    $newsData = array();
    while ($result = mysqli_fetch_assoc($sql)) {
        $newsData[] = ['name' => $result['name'], 'price' => $result['price']];
    }
    foreach ($newsData as $product):
        ?>
        <div>
            <b><?= $product['name']; ?></b>
            <p><?= $product['price']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<input id="show_more" count_show="3" count_add="2" type="button" value="Показать еще"/>
<!-- count_show="3" с какого товара начать выборку -->
</body>
</html>