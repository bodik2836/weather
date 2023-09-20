(function($, document, window){

	$(document).ready(function(){
        $("#find-location").submit(function(e){
            e.preventDefault();

            let geoParams = {
                q: "dgfdf",
                lang: "uk",
                limit: "10",
                appid: "86e8c8767feba8c471b565972b263cdc"
            };
            $.ajax({
                url: 'https://api.openweathermap.org/geo/1.0/direct',
                method: 'get',             /* Метод запроса (post или get) */
                dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
                data: geoParams,     /* Данные передаваемые в массиве */
                success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                    let inputField = $("#find-location-input");
                    let findLocationBtn = $("#find-location-btn");
                    let forecastContainer = $(".forecast-container");
                    forecastContainer.css('margin-top', '10px');
                    inputField.css('border-radius', '30px 30px 0 0');
                    findLocationBtn.css('border-radius', '0 25px 0 0');
                    $(".find-results").css('display', 'block');
                    console.log(data.length); /* В переменной data содержится ответ от index.php. */
                }
            });

            let weatherParams = {
                lat: "50.759115",
                lon: "25.342491",
                units: "metric",
                appid: "86e8c8767feba8c471b565972b263cdc",
            };
            $.ajax({
                url: 'https://api.openweathermap.org/data/2.5/weather',
                method: 'get',             /* Метод запроса (post или get) */
                dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
                data: weatherParams,     /* Данные передаваемые в массиве */
                success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                    console.log(data); /* В переменной data содержится ответ от index.php. */
                }
            });
        });

		// Cloning main navigation for mobile menu
		$(".mobile-navigation").append($(".main-navigation .menu").clone());

		// Mobile menu toggle
		$(".menu-toggle").click(function(){
			$(".mobile-navigation").slideToggle();
		});

		var map = $(".map");
		var latitude = map.data("latitude");
		var longitude = map.data("longitude");
		if (map.length) {
			map.gmap3({
				map:{
					options:{
						center: [latitude,longitude],
						zoom: 15,
						scrollwheel: false
					}
				},
				marker:{
					latLng: [latitude,longitude],
				}
			});
		}
	});

	$(window).load(function(){

	});

})(jQuery, document, window);
