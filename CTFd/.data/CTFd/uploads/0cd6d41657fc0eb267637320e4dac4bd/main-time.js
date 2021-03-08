function remaindTime() {
    var now = new Date();
    var end = new Date(2021, 2, 6, 22, 00, 00);
    var open = new Date(2021, 2, 6, 10, 00, 00);

    var nt = now.getTime();
    var ot = open.getTime();
    var et = end.getTime();

    if (nt < ot) {
        $(".time-title").html("until DEBUG CTF 2021 start");

        var time = parseInt(ot - nt) / 1000;
        day = parseInt(time / 60 / 60 / 24);
        time = (time - (day * 60 * 60 * 24));
        hour = parseInt(time / 60 / 60);
        time = (time - (hour * 60 * 60));
        min = parseInt(time / 60);
        sec = parseInt(time - (min * 60));
        if (day < 10) {
            day = "0" + day;
        }
        if (hour < 10) {
            hour = "0" + hour;
        }
        if (min < 10) {
            min = "0" + min;
        }
        if (sec < 10) {
            sec = "0" + sec;
        }
        $(".days").html(day);
        $(".hours").html(hour);
        $(".minutes").html(min);
        $(".seconds").html(sec);
    } else if (nt > et) {
        $(".time-title").html("GAME OVER");
    } else {
        $(".time-title").html("until DEBUG CTF 2021 end");
        var time = parseInt(et - nt) / 1000;
        day = parseInt(time / 60 / 60 / 24);
        time = (time - (day * 60 * 60 * 24));
        hour = parseInt(time / 60 / 60);
        time = (time - (hour * 60 * 60));
        min = parseInt(time / 60);
        sec = parseInt(time - (min * 60));
        if (day < 10) {
            day = "0" + day;
        }
        if (hour < 10) {
            hour = "0" + hour;
        }
        if (min < 10) {
            min = "0" + min;
        }
        if (sec < 10) {
            sec = "0" + sec;
        }
        $(".days").html(day);
        $(".hours").html(hour);
        $(".minutes").html(min);
        $(".seconds").html(sec);
    }
}
setInterval(remaindTime, 1000);
