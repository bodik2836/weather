(function($, document, window){

	$(document).ready(function(){
        let inputField = $("#find-location-input");
        let findLocationBtn = $("#find-location-btn");
        let forecastContainer = $(".forecast-container");
        let findResults = $(".find-results");

        inputField.on("input", () => {
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

        // FUNCTIONS
        function updateTodayForecast(data) {
            let date = new Date(data.dt);

            let todayEl = $(".forecast-container").children(".today.forecast");
            todayEl.children(".forecast-header").children(".day").text(date.toLocaleDateString('default', {weekday: 'long'})).css('textTransform', 'capitalize');
            todayEl.children(".forecast-header").children(".date").text(date.toLocaleDateString('default', {day: '2-digit', month: "long"})).css('textTransform', 'capitalize');
            todayEl.children(".forecast-content").children(".location").text(data.city);
            todayEl.children(".forecast-content").children(".degree").children(".num").html(Math.round(data.main.temp) + "<sup>o</sup>" + "C");
            $("#today-humidity").html('<img src="storage/images/icon-umberella.png" alt="umbrella">' + data.main.humidity + "%");
            $("#today-wind-speed").html('<img src="storage/images/icon-wind.png" alt="wind">' + Math.ceil(data.wind.speed) + " м/с");
            $("#today-wind-direct").html('<img src="storage/images/icon-compass.png" alt="compass">' + data.wind.deg);
        }

        function searchByCoordinates() {
            findResults.children("ul.menu").children("li.menu-item").children("a").on("click", (e) => {
                e.preventDefault();
                clearFindResults();
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
