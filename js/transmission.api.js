ncTransmissionWebApi = (function () {
    function loadAllTorrents(data) {
        return $.ajax({
            url: OC.generateUrl('/apps/nc-transmission/api/1.0/torrent'),
            dataType: "json",
            type: "GET",
            data: data
        })
    }

    return {
        loadAllTorrents: loadAllTorrents
    }
})();
