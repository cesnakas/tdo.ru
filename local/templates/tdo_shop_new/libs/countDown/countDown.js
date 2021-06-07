(function ($) {

    $.fn.downCount = function (options, callback) {
        var settings = $.extend({
                date: null,
                offset: null
            }, options);

        // Throw error if date is not set
        if (!settings.date) {
            $.error('Date is not defined.');
        }

        // Throw error if date is set incorectly
        if (!Date.parse(settings.date)) {
            $.error('Incorrect date format, it should look like this, 12/24/2012 12:00:00.');
        }

        // Save container
        var container = this;

        /**
         * Change client's local date to match offset timezone
         * @return {Object} Fixed Date object.
         */
        var currentDate = function () {
            // get client's current date
            var date = new Date();

            // turn date to utc
            var utc = date.getTime() + (date.getTimezoneOffset());

            // set new Date object
            var new_date = new Date(utc + (3600000*settings.offset))

            return new_date;
        };

        /**
         * Main downCount function that calculates everything
         */
        function countdown () {
            var target_date = new Date(settings.date), // set target date
                current_date = currentDate(); // get fixed current date


                

            // difference of dates
            var difference = target_date - current_date;

            // if difference is negative than it's pass the target date
            if (difference < 0) {
                // stop timer
                clearInterval(interval);

                if (callback && typeof callback === 'function') callback();

                return;
            }

            // basic math variables
            var _second = 1000,
                _minute = _second * 60,
                _hour = _minute * 60,
                _day = _hour * 24;

            // calculate dates
            var days = Math.floor(difference / _day),
                hours = Math.floor((difference % _day) / _hour),
                minutes = Math.floor((difference % _hour) / _minute),
                seconds = Math.floor((difference % _minute) / _second);

                daysString = days + '';
                hoursString = hours + '';
                minutesString = minutes + '';
                // fix dates so that it will show two digets
                days = (String(days).length >= 2) ? '<span class="timer-num">' + daysString[0] + '</span>' + '<span class="timer-num">' + daysString[1] + '</span>' : '<span class="timer-num">0</span>' + '<span class="timer-num">'+days+'</span>';
                hours = (String(hours).length >= 2) ? '<span class="timer-num">' + hoursString[0] + '</span>' + '<span class="timer-num">' + hoursString[1] + '</span>' : '<span class="timer-num">0</span>' + '<span class="timer-num">'+hours+'</span>';
                minutes = (String(minutes).length >= 2) ? '<span class="timer-num">' + minutesString[0] + '</span>' + '<span class="timer-num">' + minutesString[1] + '</span>' : '<span class="timer-num">0</span>' + '<span class="timer-num">'+minutes+'</span>';
                seconds = (String(seconds).length >= 2) ? seconds : '0' + seconds;

            // based on the date change the refrence wording
            var ref_days = (days === 1) ? 'день' : 'дней',
                ref_hours = (hours === 1) ? 'час' : 'часов',
                ref_minutes = (minutes === 1) ? 'минута' : 'минут',
                ref_seconds = (seconds === 1) ? 'секунда' : 'секунд';

            // set to DOM
            container.find('.days').html(days);
            container.find('.hours').html(hours);
            container.find('.minutes').html(minutes);
            container.find('.seconds').text(seconds);

            container.find('.days_ref').text(ref_days);
            container.find('.hours_ref').text(ref_hours);
            container.find('.minutes_ref').text(ref_minutes);
            container.find('.seconds_ref').text(ref_seconds);


        };


        
        // start
        var interval = setInterval(countdown, 1000);
    };

})(jQuery);