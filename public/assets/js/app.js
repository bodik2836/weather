(function($, document, window){

	$(document).ready(function(){
        defaultSearch();
        subscribeForm();
        contactForm();

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
                    showFindResults(data);
                    searchByCoordinates();
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
        function contactForm() {
            $("#contact-form").submit(function(e){
                e.preventDefault();

                let formData = Object.fromEntries(new FormData(e.target).entries());

                grecaptcha.ready(function(){
                    grecaptcha.execute('6LdUsI4oAAAAAAF_6hrZsQPPKOribJZifRUCB9yf', {action: 'contactForm'}).then(function(token) {
                        $.ajax({
                            url: 'api/v1/verify',
                            method: 'post',
                            dataType: 'json',
                            data: { response: token },
                            success: function(data) {
                                if (data.success) {
                                    $.ajax({
                                        url: 'api/v1/contact-form',
                                        method: 'post',
                                        dataType: 'json',
                                        data: formData,
                                        success: function(data){
                                            $.notify('Повідомлння успішно доставлене!', 'success');
                                            $("#contact-form").trigger('reset');
                                        },
                                        error: function (error) {
                                            $.notify(error.responseJSON.message, 'error');
                                        }
                                    });
                                }
                            }
                        });
                    });
                });
            });
        }

        function subscribeForm() {
            $("#subscribe-form").submit(function(e){
                e.preventDefault();

                let subscribeFormInput = $('#subscribe-form-input');

                if (!subscribeFormInput.val()) {
                    return false;
                }

                let params = {
                    email: subscribeFormInput.val(),
                };

                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdUsI4oAAAAAAF_6hrZsQPPKOribJZifRUCB9yf', {action: 'subscription'}).then(function(token) {
                        $.ajax({
                            url: 'api/v1/verify',
                            method: 'post',
                            dataType: 'json',
                            data: { response: token },
                            success: function(data) {
                                if (data.success) {
                                    $.ajax({
                                        url: 'api/v1/subscribers',
                                        method: 'post',
                                        dataType: 'json',
                                        data: params,
                                        success: function(data){
                                            $.notify('Ви успішно підписалися на розсилку!', 'success');
                                            subscribeFormInput.val('');
                                        },
                                        error: function (error) {
                                            $.notify(error.responseJSON.message, 'error');
                                        }
                                    });
                                }
                            }
                        });
                    });
                });
            });
        }

        function windDirection(deg) {
            if (deg >= 0 && deg < 30 || deg >= 330 && deg < 360) {
                return 'Пн';
            } else if (deg >= 30 && deg < 60) {
                return 'ПнCx';
            } else if (deg >= 60 && deg < 120) {
                return 'Cx';
            } else if (deg >= 120 && deg < 150) {
                return 'ПдCx';
            } else if (deg >= 150 && deg < 210) {
                return 'Пд';
            } else if (deg >= 210 && deg < 240) {
                return 'ПдЗх';
            } else if (deg >= 240 && deg < 300) {
                return 'Зх';
            } else if (deg >= 300 && deg < 330) {
                return 'ПнЗx';
            }

            return '--';
        }

        function updateTodayForecast(data) {
            let date = new Date(data.dt);

            let todayEl = $(".forecast-container").children(".today.forecast");
            todayEl.children(".forecast-header").children(".day").text(date.toLocaleDateString('default', {weekday: 'long'})).css('textTransform', 'capitalize');
            todayEl.children(".forecast-header").children(".date").text(date.toLocaleDateString('default', {day: '2-digit', month: "long"})).css('textTransform', 'capitalize');
            todayEl.children(".forecast-content").children(".location").text(data.city);
            todayEl.children(".forecast-content").children(".degree").children(".num").html(Math.round(data.main.temp) + "<sup>o</sup>" + "C");
            let url = 'https://openweathermap.org/img/wn/' + data.weather[0].icon + '.png';
            todayEl.children(".forecast-content").children(".degree").children(".forecast-icon").html('<img src="' + url + '" alt="' + data.weather[0].main + '" width=60>');
            $("#today-humidity").html('<img src="storage/images/icon-umberella.png" alt="umbrella">' + data.main.humidity + "%");
            $("#today-wind-speed").html('<img src="storage/images/icon-wind.png" alt="wind">' + Math.ceil(data.wind.speed) + " м/с");
            $("#today-wind-direct").html('<img src="storage/images/icon-compass.png" alt="compass">' + windDirection(data.wind.deg));
        }

        function updateForecast(data) {

            let weatherByDays = [];
            data.list.forEach(
                (element) => {
                    let date = new Date((element.dt - data.city.timezone) * 1000);
                    let dayIndex = date.toLocaleDateString('default', {day: 'numeric', month: 'numeric', year: 'numeric'});

                    if (!weatherByDays[dayIndex]) {
                        weatherByDays[dayIndex] = [];
                        weatherByDays[dayIndex].info = [];
                        weatherByDays[dayIndex].info.tmp_min = element.main.temp;
                        weatherByDays[dayIndex].info.tmp_max = element.main.temp;
                    }
                    weatherByDays[dayIndex].push(element);

                    if (weatherByDays[dayIndex].info.tmp_min > element.main.temp) {
                        weatherByDays[dayIndex].info.tmp_min = element.main.temp;
                    }
                    if (weatherByDays[dayIndex].info.tmp_max < element.main.temp) {
                        weatherByDays[dayIndex].info.tmp_max = element.main.temp;
                    }
                }
            );

            let forecast = $(".forecast-container").children(".forecast").not('.today');
            let index = 0;
            for (let key in weatherByDays) {
                if (weatherByDays[key].length < 8) {
                    continue;
                }
                $(forecast[index]).children(".forecast-header").children(".day").text(key);
                $(forecast[index]).children(".forecast-content").children(".degree").html(Math.round(weatherByDays[key].info.tmp_max) + "<sup>o</sup>" + "C");
                $(forecast[index]).children(".forecast-content").children("small").html(Math.round(weatherByDays[key].info.tmp_min) + "<sup>o</sup>");
                let icon_uri = 'https://openweathermap.org/img/wn/' + weatherByDays[key][4].weather[0].icon + '.png';
                $(forecast[index]).children(".forecast-content").children(".forecast-icon").html('<img src="' + icon_uri + '" alt="' + weatherByDays[key][4].weather[0].main + '" width=48>');

                index++;
            }
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

                $.ajax({
                    url: 'api/v1/weather',
                    method: 'get',
                    dataType: 'json',
                    data: weatherParams,
                    success: function(data){
                        data.city = el.data('city');
                        data.dt = data.dt * 1000;
                        updateTodayForecast(data);
                    }
                });
                $.ajax({
                    url: 'api/v1/forecast',
                    method: 'get',
                    dataType: 'json',
                    data: weatherParams,
                    success: function(data){
                        updateForecast(data);
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

        function showFindResults(data) {
            forecastContainer.css('margin-top', '10px');
            inputField.css('border-radius', '30px 30px 0 0');
            findLocationBtn.css('border-radius', '0 25px 0 0');
            findResults.css('display', 'block');

            let el = document.createElement('li');
            el.className = 'menu-item';

            if (data.length === 0) {
                let el_div = document.createElement('div');
                el_div.innerText = 'Нічого не знайдено';
                el_div.style.padding = '10px';

                el.append(el_div);
            }

            data.forEach(
                (element) => {
                    if (element.country !== 'UA') {
                        return;
                    }

                    let el_a = document.createElement('a');
                    el_a.href = '#';
                    el_a.setAttribute('data-lat', element.lat);
                    el_a.setAttribute('data-lon', element.lon);
                    el_a.setAttribute('data-city', element.local_names.uk);
                    el_a.innerText = element.name + ', ' + element.state + ', ' + element.country;

                    el.append(el_a);
                }
            );

            findResults.children('ul.menu').append(el);
        }

        function defaultSearch() {
            let weatherParams = {
                lat: '50.7450733',
                lon: '25.320078',
                city: 'Луцьк',
            };

            $.ajax({
                url: 'api/v1/weather',
                method: 'get',
                dataType: 'json',
                data: weatherParams,
                success: function(data){
                    data.city = weatherParams.city;
                    data.dt = data.dt * 1000;
                    updateTodayForecast(data);
                }
            });
            $.ajax({
                url: 'api/v1/forecast',
                method: 'get',
                dataType: 'json',
                data: weatherParams,
                success: function(data){
                    updateForecast(data);
                }
            });
        }
	});

	$(window).load(function(){

	});

})(jQuery, document, window);
