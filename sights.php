<!DOCTYPE html>
<html lang="ru">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=devise-width", install-scale=1.0>
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	  <title>your Barcelona</title>
  </head>
  <body>
	<?php include "blocks/header.php";?>
	<div class="main">
		<div class="container">
			<div class="title">
					<h2>Информация о достопримечательностях</h2>
				</div>
			<div class="stats">
<?php 
include("incdb.php");  
$articles=mysql_query("SELECT * FROM stat",$db);
$i=1;
while($mas=mysql_fetch_array($articles))
{
	?>

				<div class="statia">
					<div><img class="img-stat" src="capt/<?php echo $mas['id']; ?>.jpg" alt=""></div>
					<h2><?php echo $mas['title']; ?></h2>
					<p><?php echo $mas['text']; ?></p>	
				</div>
<?php } ?>
			</div>
				            <div id="map" style="width: 600px; height: 400px" align="center"></div>
	            <script type="text/javascript"> 
	    
                    // Функция ymaps.ready() будет вызвана, когда
                    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
                    ymaps.ready(init);
                
                    function init() {
                        // Создание карты.
                        // https://tech.yandex.ru/maps/doc/jsapi/2.1/dg/concepts/map-docpage/
                        var myMap = new ymaps.Map("map", {
                            // Координаты центра карты.
                            // Порядок по умолчнию: «широта, долгота».
                            center: [55.76, 37.64],
                            // Уровень масштабирования. Допустимые значения:
                            // от 0 (весь мир) до 19.
                            zoom: 12,
                            // Элементы управления
                            // https://tech.yandex.ru/maps/doc/jsapi/2.1/dg/concepts/controls/standard-docpage/
                            controls: [
                                'zoomControl', // Ползунок масштаба
                            ]
                        });
                
                        // Добавление метки
                        // https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/Placemark-docpage/
                        var myPlacemark = new ymaps.Placemark([55.740975, 37.625470], {
                            // Хинт показывается при наведении мышкой на иконку метки.
                            hintContent: 'Содержимое всплывающей подсказки',
                            // Балун откроется при клике по метке.
                            balloonContent: 'Содержимое балуна' }, 
                            {
                            iconLayout: 'default#image',
                            iconImageHref: 'img/for_map1.png',
                            iconImageSize: [30, 35]
                            });
                
                        // После того как метка была создана, добавляем её на карту.
                        myMap.geoObjects.add(myPlacemark);
                
                    }
                </script>
		</div>
	</div>
	<?php include "blocks/footer.php" ?>   
	</body>
</html>