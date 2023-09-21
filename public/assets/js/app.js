(function($, document, window){

	$(document).ready(function(){
        $("#find-location").submit(function(e){
            e.preventDefault();
            let inputField = $("#find-location-input");
            let findLocationBtn = $("#find-location-btn");
            let forecastContainer = $(".forecast-container");
            let findResults = $(".find-results");
            inputField.focus();
            findResults.children("ul.menu").children("li.menu-item").remove();

            inputField.focusout(() => {
                forecastContainer.css('margin-top', '-150px');
                inputField.css('border-radius', '30px');
                findLocationBtn.css('border-radius', '30px');
                findResults.children("ul.menu").children("li.menu-item").remove();
                // findResults.css('display', 'none');
            });


            let geoParams = {
                q: inputField.val(),
                lang: "ua",
                limit: 5,
                appid: ""
            };
            $.ajax({
                url: 'https://api.openweathermap.org/geo/1.0/direct',
                method: 'get',             /* Метод запроса (post или get) */
                dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
                data: geoParams,     /* Данные передаваемые в массиве */
                success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                    forecastContainer.css('margin-top', '10px');
                    inputField.css('border-radius', '30px 30px 0 0');
                    findLocationBtn.css('border-radius', '0 25px 0 0');
                    findResults.css('display', 'block');

                    let el = document.createElement('li');
                    el.className = 'menu-item';

                    data.forEach(
                        (element) => {
                            let el_a = document.createElement('a');
                            el_a.href = '#';
                            el_a.innerText = element.name + ', ' + element.state + ', ' + element.country;

                            el.append(el_a);
                        }
                    );


                    findResults.children('ul.menu').append(el);

                    console.log(data); /* В переменной data содержится ответ от index.php. */
                }
            });

            let weatherParams = {
                lat: "50.759115",
                lon: "25.342491",
                units: "metric",
                lang: "ua",
                appid: "",
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
