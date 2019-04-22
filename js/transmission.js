$(function() {

    var mainElement = $("#app-content");

    ncTransmissionWebApi.loadAllTorrents().done(function(data){
        data.arguments.torrents = _.sortBy(data.arguments.torrents, "addedDate").reverse();
        $(mainElement).find(".nct-content").html(Handlebars.templates['table'](data.arguments));
    });

});