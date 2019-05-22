$(function () {
    console.log("all is right");

    $("#transmissionremote_btnSave").on("click", function () {
        var host = $("#transmissionremote_host").val(),
            port = $("#transmissionremote_port").val(),
            user = $("#transmissionremote_user").val(),
            pass = $("#transmissionremote_pass").val();
        $.post(
            OC.generateUrl('apps/transmissionremote/saveSettings'),
            {
                settings: {
                    'host': host,
                    'port': port,
                    'user': user,
                    'pass': pass
                }
            },
            function (data) {
                if (data.success) {
                    OC.Notification.showTemporary('saved');
                } else {
                    OC.Notification.showTemporary('fail');
                }
            }
        )
    });
});