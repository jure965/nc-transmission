/// transmissionremote
/// helpers for handlebars templates

Handlebars.registerHelper("dateToStr", function (dateTime) {
    return moment.unix(dateTime).format("L LTS");
});


