$(function () {

    var mainElement = $("#app-content");

    // ncTransmissionWebApi.loadAllTorrents().done(function (response) {
    //     response = _.sortBy(response, "startDate").reverse();
    //     $(mainElement).find(".transmissionremote-content").html(Handlebars.templates['table']({
    //         torrents: response
    //     }));
    // });

    ncTransmissionWebApi.loadTorrents().done(function (response) {
        var torrents = _.sortBy(response.data, "startDate").reverse();
        $(mainElement).find(".transmissionremote-content").html(Handlebars.templates['table']({
            torrents: torrents
        }));
    });

});
