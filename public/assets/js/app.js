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
            clearFindResults();
            inputField.focus();

            if (!inputField.val()) {
                return false;
            }


            let geoParams = {
                location: inputField.val(),
            };
            $.ajax({
                url: 'api/v1/geo',
                method: 'get',
                dataType: 'json',
                data: geoParams,
                success: function(data){
                    showFindResults();

                    let el = document.createElement('li');
                    el.className = 'menu-item';

                    data.forEach(
                        (element) => {
                            let el_a = document.createElement('a');
                            el_a.href = '#';
                            el_a.setAttribute('data-lat', element.lat);
                            el_a.setAttribute('data-lon', element.lon);
                            el_a.setAttribute('data-city', element.name);
                            el_a.innerText = element.name + ', ' + element.state + ', ' + element.country;

                            el.append(el_a);
                        }
                    );

                    findResults.children('ul.menu').append(el);

                    searchByCoordinates();

                    console.log(data);
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

        // FUNCTIONS
        function updateTodayForecast(data) {
            let date = new Date(data.dt);

            let todayEl = $(".forecast-container").children(".today.forecast");
            todayEl.children(".forecast-header").children(".day").text(date.toLocaleDateString('default', {weekday: 'long'})).css('textTransform', 'capitalize');
            todayEl.children(".forecast-header").children(".date").text(date.toLocaleDateString('default', {day: '2-digit', month: "long"})).css('textTransform', 'capitalize');
        }

        function searchByCoordinates() {
            findResults.children("ul.menu").children("li.menu-item").children("a").on("click", (e) => {
                e.preventDefault();
                let el = $(e.target);

                let weatherParams = {
                    lat: el.data('lat'),
                    lon: el.data('lon'),
                };
                console.log(weatherParams);
                $.ajax({
                    url: 'api/v1/weather',
                    method: 'get',
                    dataType: 'json',
                    data: weatherParams,
                    success: function(data){
                        data.city = el.data('city');
                        data.dt = data.dt * 1000;
                        updateTodayForecast(data);
                        console.log(data);
                    }
                });
            });
        }

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
