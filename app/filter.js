app.filter('phone', function () {
    return function (phoneNum) {
        if (!phoneNum) { return ''; }

        var value = phoneNum.toString().trim().replace(/^\+/, '');

        if (value.match(/[^0-9]/)) {
            return phoneNum;
        }

        var city, number;
        city = value.slice(0, 3);
        number = value.slice(3);

        number = number.slice(0, 3) + '-' + number.slice(3);

        return (" (" + city + ") " + number).trim();
    };
});