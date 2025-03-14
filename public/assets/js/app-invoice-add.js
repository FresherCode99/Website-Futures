document.addEventListener("DOMContentLoaded", function(e) {
    var n, a, o, i, l, r, t = document.querySelectorAll(".invoice-item-price"), c = document.querySelectorAll(".invoice-item-qty"), p = document.querySelectorAll(".date-picker"), t = (t && t.forEach(function(t) {
        t && t.addEventListener("input", e => {
            t.value = formatNumeral(e.target.value, {
                delimiter: "",
                numeral: !0
            })
        }
        )
    }),
    c && c.forEach(function(t) {
        t && t.addEventListener("input", e => {
            t.value = formatNumeral(e.target.value, {
                delimiter: "",
                numeral: !0
            })
        }
        )
    }),
    p && p.forEach(function(e) {
        e.flatpickr({
            monthSelectorType: "static"
        })
    }),
    $(".btn-apply-changes")), c = $(".source-item"), u = {
        "App Design": "Designed UI kit & app pages.",
        "App Customization": "Customization & Bug Fixes.",
        "ABC Template": "Bootstrap 4 admin template.",
        "App Development": "Native App Development."
    };
    function s(e, t) {
        e.closest(".repeater-wrapper").find(t).text(e.val())
    }
    $(document).on("click", ".tax-select", function(e) {
        e.stopPropagation()
    }),
    t.length && $(document).on("click", ".btn-apply-changes", function(e) {
        var t = $(this);
        l = t.closest(".dropdown-menu").find("#taxInput1"),
        r = t.closest(".dropdown-menu").find("#taxInput2"),
        i = t.closest(".dropdown-menu").find("#discountInput"),
        a = t.closest(".repeater-wrapper").find(".tax-1"),
        o = t.closest(".repeater-wrapper").find(".tax-2"),
        n = $(".discount"),
        null !== l.val() && s(l, a),
        null !== r.val() && s(r, o),
        i.val().length && t.closest(".repeater-wrapper").find(n).text(i.val() + "%")
    }),
    c.length && (c.on("submit", function(e) {
        e.preventDefault()
    }),
    c.repeater({
        show: function() {
            $(this).slideDown(),
            [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e) {
                return new bootstrap.Tooltip(e)
            })
        },
        hide: function(e) {
            $(this).slideUp()
        }
    })),
    $(document).on("change", ".item-details", function() {
        var e = $(this)
          , t = u[e.val()];
        e.next("textarea").length ? e.next("textarea").val(t) : e.after('<textarea class="form-control" rows="2">' + t + "</textarea>")
    })
});

