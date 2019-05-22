ncTransmissionWebApi = (function () {
    function loadAllTorrents(data) {
        return $.ajax({
            url: OC.generateUrl('/apps/transmissionremote/api/1.0/torrent'),
            dataType: "json",
            type: "GET",
            data: data
        })
    }

    function loadTorrents(data) {
        return $.ajax({
            url: OC.generateUrl('apps/transmissionremote/torrents'),
            dataType: "json",
            type: "GET",
            data: data
        })
    }

    return {
        loadAllTorrents: loadAllTorrents,
        loadTorrents: loadTorrents
    }
})();
