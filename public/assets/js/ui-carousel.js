document.addEventListener("DOMContentLoaded", function(e) {
    var i = document.querySelector("#swiper-default")
      , r = document.querySelector("#swiper-with-arrows")
      , t = document.querySelector("#swiper-with-pagination")
      , n = document.querySelector("#swiper-with-progress")
      , o = document.querySelector("#swiper-with-scrollbar")
      , s = document.querySelector("#swiper-vertical")
      , w = document.querySelector("#swiper-multiple-slides")
      , a = document.querySelector("#swiper-3d-coverflow-effect")
      , p = document.querySelector("#swiper-3d-cube-effect")
      , l = document.querySelector("#swiper-3d-flip-effect")
      , c = document.querySelector(".gallery-thumbs")
      , u = document.querySelector(".gallery-top");
    let d;
    i && new Swiper(i,{
        slidesPerView: "auto"
    }),
    r && new Swiper(r,{
        slidesPerView: "auto",
        navigation: {
            prevEl: ".swiper-button-prev",
            nextEl: ".swiper-button-next"
        }
    }),
    t && new Swiper(t,{
        slidesPerView: "auto",
        pagination: {
            clickable: !0,
            el: ".swiper-pagination"
        }
    }),
    n && new Swiper(n,{
        slidesPerView: "auto",
        pagination: {
            type: "progressbar",
            el: ".swiper-pagination"
        },
        navigation: {
            prevEl: ".swiper-button-prev",
            nextEl: ".swiper-button-next"
        }
    }),
    o && new Swiper(o,{
        scrollbar: {
            hide: !0,
            el: ".swiper-scrollbar"
        }
    }),
    s && new Swiper(s,{
        direction: "vertical",
        pagination: {
            clickable: !0,
            el: ".swiper-pagination"
        }
    }),
    w && new Swiper(w,{
        slidesPerView: 2,
        spaceBetween: 20,
        pagination: {
            clickable: !0,
            el: ".swiper-pagination"
        },
        breakpoints: {
            576: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    }),
    a && new Swiper(a,{
        effect: "coverflow",
        grabCursor: !0,
        centeredSlides: !0,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: !0
        },
        pagination: {
            el: ".swiper-pagination"
        }
    }),
    p && new Swiper(p,{
        effect: "cube",
        grabCursor: !0,
        cubeEffect: {
            shadow: !0,
            slideShadows: !0,
            shadowScale: .94,
            shadowOffset: 20
        },
        pagination: {
            el: ".swiper-pagination"
        }
    }),
    l && new Swiper(l,{
        effect: "flip",
        grabCursor: !0,
        pagination: {
            el: ".swiper-pagination"
        },
        navigation: {
            prevEl: ".swiper-button-prev",
            nextEl: ".swiper-button-next"
        }
    }),
    c && (d = new Swiper(c,{
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: !0,
        watchSlidesVisibility: !0,
        watchSlidesProgress: !0
    })),
    u && new Swiper(u,{
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        thumbs: {
            swiper: d
        }
    })
});
