$(function() {
    var e = $(".select2");
    e.length && e.each(function() {
        var e = $(this);
        e.wrap('<div class="position-relative"></div>').select2({
            placeholder: "Select value",
            dropdownParent: e.parent()
        })
    })
}),
document.addEventListener("DOMContentLoaded", function(e) {
    {
        let r = document.querySelector(".modal-edit-tax-id")
          , t = document.querySelector(".phone-number-mask");
        if (r) {
            let t = {
                prefix: "TIN",
                blocks: [3, 3, 3, 4],
                delimiter: " "
            };
            registerCursorTracker({
                input: r,
                delimiter: " "
            }),
            r.value = formatGeneral("", t),
            r.addEventListener("input", e => {
                r.value = formatGeneral(e.target.value, t)
            }
            )
        }
        t && (t.addEventListener("input", e => {
            e = e.target.value.replace(/\D/g, "");
            t.value = formatGeneral(e, {
                blocks: [3, 3, 4],
                delimiters: [" ", " "]
            })
        }
        ),
        registerCursorTracker({
            input: t,
            delimiter: " "
        }))
    }
});
