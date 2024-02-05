ymaps.ready(init);
var length;

function init() {
    // Стоимость за километр.
    var DELIVERY_TARIFF = 30,
    // Минимальная стоимость.
        MINIMUM_COST = 500,
        myMap = new ymaps.Map('map', {
            center: [55.7549792211111,37.61615189062498],
            zoom: 10,
            controls: []
        }),
    // Создадим панель маршрутизации.
        routePanelControl = new ymaps.control.RoutePanel({
            options: {
                maxWidth: '500px',
                minWidth: '200px',
            }
        }),
        zoomControl = new ymaps.control.ZoomControl({
            options: {
                size: 'small',
                float: 'none',
                position: {
                    bottom: 145,
                    right: 10
                }
            }
        });
    // Пользователь сможет построить только автомобильный маршрут.
    routePanelControl.routePanel.options.set({
        types: {auto: true}
    });

    myMap.controls.add(routePanelControl).add(zoomControl);

    // Получим ссылку на маршрут.
    routePanelControl.routePanel.getRouteAsync().then(function (route) {

        // Зададим максимально допустимое число маршрутов, возвращаемых мультимаршрутизатором.
        route.model.setParams({results: 1}, true);

        // Повесим обработчик на событие построения маршрута.
        route.model.events.add('requestsuccess', function () {

            var activeRoute = route.getActiveRoute();
            if (activeRoute) {
                // Получим протяженность маршрута.
                length = route.getActiveRoute().properties.get("distance");
                updateLength(length);
                var duration = route.getActiveRoute().properties.get("duration"),
                // Вычислим стоимость доставки.
                    price = calculate(Math.round(length.value / 1000)),
                // Создадим макет содержимого балуна маршрута.
                    balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<span>Расстояние: ' + length.text + '.</span><br/>' +
                        // '<span style="font-weight: bold; font-style: italic">Стоимость доставки: ' + price + ' р.</span>' +
                        '<span>Время в пути: ' + duration.text + '</span>');
                        
                // Внешний вид маршрута
                route.options.set({
                    // Цвет метки начальной точки.
                    // wayPointStartIconFillColor: "#B3B3B3",
                    // Цвет метки конечной точки.
                    // wayPointFinishIconFillColor: "red",     
                    // Внешний вид линий.
                    routeActiveStrokeColor: "#ff4f1e"
                });

                // Зададим этот макет для содержимого балуна.
                route.options.set('routeBalloonContentLayout', balloonContentLayout);


                // Откроем балун.
                activeRoute.balloon.open();

                var d = document.getElementById("viewContainer");
                while (d.firstChild)
                    d.removeChild(d.firstChild);
				    this.outputElement = $('<div><form id="feedback" action="mail.php" method="post"><p><div class="tt">Длина маршрута: </div><input name="length" value="' + length.text + '"></p><p><div class="tt">Цена доставки:  </div><input name="price" value="' + price + ' р"></p></div>').appendTo('#viewContainer');
            }
        });

    });
    // Функция, вычисляющая стоимость доставки.
    function calculate(routeLength) {
        return Math.max(routeLength * DELIVERY_TARIFF, MINIMUM_COST);
    }
}
// Предполагая, что у нас есть доступ к экземпляру приложения Vue или способ генерировать глобальные события
function updateLength(newLength) {
    length = newLength;
    // Генерирует глобальное событие с новым значением длины
    window.dispatchEvent(new CustomEvent('length-updated', { detail: length }));
}
