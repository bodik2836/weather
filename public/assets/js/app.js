(function($, document, window){

	$(document).ready(function(){
        let inputField = $("#find-location-input");
        let findLocationBtn = $("#find-location-btn");
        let forecastContainer = $(".forecast-container");
        let findResults = $(".find-results");

        inputField.focusout(() => {
            if (!inputField.val()) {
                clearFindResults();
            }
        });



        $("#find-location").submit(function(e){
            e.preventDefault();
            inputField.focus();

            if (!inputField.val()) {
                return false;
            }


            // findResults.children("ul.menu").remove();
            // findResults.children("ul.menu").children("li.menu-item").remove();

            let geoParams = {
                location: inputField.val(),
            };
            $.ajax({
                url: 'api/v1/geo',
                method: 'get',             /* Метод запроса (post или get) */
                dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
                data: geoParams,     /* Данные передаваемые в массиве */
                success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                    showFindResults();
                    console.log(findResults.children('ul.menu').children('li.menu-item'));

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

                    findResults.children("ul.menu").children("li.menu-item").children("a").on("click", (e) => {
                        e.preventDefault();
                        alert('rrr');
                    });

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

        findResults.children('ul.menu').children('li.menu-item').children('a').click(function (e) {
            e.preventDefault();
            clearFindResults();
            console.log('sdf');
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

        // FUNCTIONS
        function clearFindResults() {
            forecastContainer.css('margin-top', '-150px');
            inputField.css('border-radius', '30px');
            findLocationBtn.css('border-radius', '30px');
            findResults.children("ul.menu").children("li.menu-item").remove();
        }

        function showFindResults() {
            forecastContainer.css('margin-top', '10px');
            inputField.css('border-radius', '30px 30px 0 0');
            findLocationBtn.css('border-radius', '0 25px 0 0');
            findResults.css('display', 'block');
        }
	});

	$(window).load(function(){

	});

})(jQuery, document, window);
