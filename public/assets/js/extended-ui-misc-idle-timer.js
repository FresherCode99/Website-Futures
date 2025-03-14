$(function() {
    var a = $("#document-Status")
      , e = $("#document-Pause")
      , n = $("#document-Resume")
      , t = $("#document-Elapsed")
      , r = $("#document-Destroy")
      , i = $("#document-Init")
      , l = (a.length && ($(document).on("idle.idleTimer", function(e, n, t) {
        a.val(function(e, n) {
            return n + "Idle @ " + moment().format() + " \n"
        }).removeClass("alert-success").addClass("alert-warning")
    }),
    $(document).on("active.idleTimer", function(e, n, t, r) {
        a.val(function(e, n) {
            return n + "Active [" + r.type + "] [" + r.target.nodeName + "] @ " + moment().format() + " \n"
        }).addClass("alert-success").removeClass("alert-warning")
    }),
    e.on("click", function() {
        return $(document).idleTimer("pause"),
        a.val(function(e, n) {
            return n + "Paused @ " + moment().format() + " \n"
        }),
        $(this).blur(),
        !1
    }),
    n.on("click", function() {
        return $(document).idleTimer("resume"),
        a.val(function(e, n) {
            return n + "Resumed @ " + moment().format() + " \n"
        }),
        $(this).blur(),
        !1
    }),
    t.on("click", function() {
        return a.val(function(e, n) {
            return n + "Elapsed (since becoming active): " + $(document).idleTimer("getElapsedTime") + " \n"
        }),
        $(this).blur(),
        !1
    }),
    r.on("click", function() {
        return $(document).idleTimer("destroy"),
        a.val(function(e, n) {
            return n + "Destroyed: @ " + moment().format() + " \n"
        }).removeClass("alert-success").removeClass("alert-warning"),
        $(this).blur(),
        !1
    }),
    i.on("click", function() {
        return $(document).idleTimer({
            timeout: 5e3
        }),
        a.val(function(e, n) {
            return n + "Init: @ " + moment().format() + " \n"
        }),
        $(document).idleTimer("isIdle") ? a.removeClass("alert-success").addClass("alert-warning") : a.addClass("alert-success").removeClass("alert-warning"),
        $(this).blur(),
        !1
    }),
    a.val(""),
    $(document).idleTimer(5e3),
    $(document).idleTimer("isIdle") ? a.val(function(e, n) {
        return n + "Initial Idle State @ " + moment().format() + " \n"
    }).removeClass("alert-success").addClass("alert-warning") : a.val(function(e, n) {
        return n + "Initial Active State @ " + moment().format() + " \n"
    }).addClass("alert-success").removeClass("alert-warning")),
    $("#element-Status"))
      , e = $("#element-Reset")
      , n = $("#element-Remaining")
      , t = $("#element-LastActive")
      , r = $("#element-State");
    l.length && (l.on("idle.idleTimer", function(e, n, t) {
        e.stopPropagation(),
        l.val(function(e, n) {
            return n + "Idle @ " + moment().format() + " \n"
        }).removeClass("alert-success").addClass("alert-warning")
    }),
    l.on("active.idleTimer", function(e) {
        e.stopPropagation(),
        l.val(function(e, n) {
            return n + "Active @ " + moment().format() + " \n"
        }).addClass("alert-success").removeClass("alert-warning")
    }),
    e.on("click", function() {
        return l.idleTimer("reset").val(function(e, n) {
            return n + "Reset @ " + moment().format() + " \n"
        }),
        $("#element-Status").idleTimer("isIdle") ? l.removeClass("alert-success").addClass("alert-warning") : l.addClass("alert-success").removeClass("alert-warning"),
        $(this).blur(),
        !1
    }),
    n.on("click", function() {
        return l.val(function(e, n) {
            return n + "Remaining: " + l.idleTimer("getRemainingTime") + " \n"
        }),
        $(this).blur(),
        !1
    }),
    t.on("click", function() {
        return l.val(function(e, n) {
            return n + "LastActive: " + l.idleTimer("getLastActiveTime") + " \n"
        }),
        $(this).blur(),
        !1
    }),
    r.on("click", function() {
        return l.val(function(e, n) {
            return n + "State: " + ($("#element-Status").idleTimer("isIdle") ? "idle" : "active") + " \n"
        }),
        $(this).blur(),
        !1
    }),
    l.val("").idleTimer(3e3),
    l.idleTimer("isIdle") ? l.val(function(e, n) {
        return n + "Initial Idle @ " + moment().format() + " \n"
    }).removeClass("alert-success").addClass("alert-warning") : l.val(function(e, n) {
        return n + "Initial Active @ " + moment().format() + " \n"
    }).addClass("alert-success").removeClass("alert-warning"))
});
