$(function () {

    var mainElement = $("#app-content");
    var toolbarElement = $(mainElement).find(".transmission-remote-toolbar");
    var contentElement = $(mainElement).find(".transmission-remote-content");;
    var loadingElement =  $(mainElement).find(".transmission-remote-loading");

    (function initListeners() {

    })();

    (function initEvents() {

    })();

    (function init() {
        // do initialization stuff here
        $(toolbarElement).hide();

        ncTransmissionWebApi.loadTorrents().then(function (response) {
            $(loadingElement).hide();
            if (response.status === "success") {
                $(toolbarElement).show();
                var torrents = _.sortBy(response.data, "addedDate").reverse();
                $(contentElement).html(Handlebars.templates['table']({
                    torrents: torrents
                }));

            } else {
                $(contentElement).html("Failed to load torrents.");
            }
        });
    })();

});
