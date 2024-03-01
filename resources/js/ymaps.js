ymaps.ready(init);
var length;

export function init() {
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
                //Вычисляем координаты
				var city_from = routePanelControl.routePanel.state.get("from");
                console.log(city_from);  				  		

                var myCoordsfrom = [city_from];       
                var myGeocoder = ymaps.geocode(myCoordsfrom);
                myGeocoder.then(
                    function (res) {
                        var nearest = res.geoObjects.get(0);
                        var name = nearest.properties.get('text'); 
                        console.log(name) ;            
                        document.dispatchEvent(new CustomEvent('cityFrom', { detail: name }));
                    },
                );  

                var city_into = routePanelControl.routePanel.state.get("to");	
                console.log(city_into);

                var myCoordsinto = [city_into];       
                var myGeocoder = ymaps.geocode(myCoordsinto);
                myGeocoder.then(
                    function (res) {
                        var nearest = res.geoObjects.get(0);
                        var name = nearest.properties.get('text'); 
                        console.log(name) ;            
                        document.dispatchEvent(new CustomEvent('cityInto', { detail: name }));
                    },
                );  

                // Получим протяженность маршрута.
                var length = route.getActiveRoute().properties.get("distance");
                // Вызов функции
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
            }
        });

    });
    // Функция для получения названия города по координатам.
function getCityName(coords) {
    ymaps.geocode(coords).then(function (res) {
        var firstGeoObject = res.geoObjects.get(0);
        var cityName = firstGeoObject.getLocalities()[0] || firstGeoObject.getAdministrativeAreas()[0];
        console.log(cityName);
    });
}
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
