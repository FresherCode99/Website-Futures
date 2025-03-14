document.addEventListener("DOMContentLoaded", function(e) {
    let r, a, o, t, i;
    r = config.colors.cardColor,
    t = config.colors.textMuted,
    o = config.colors.bodyColor,
    a = config.colors.headingColor,
    i = config.fontFamily;
    var s = document.querySelectorAll(".chart-progress")
      , s = (s && s.forEach(function(e) {
        var r = config.colors[e.dataset.color]
          , o = e.dataset.series
          , t = e.dataset.progress_variant || "false"
          , r = (r = r,
        o = o,
        {
            chart: {
                height: "true" == (t = t) ? 60 : 55,
                width: "true" == t ? 58 : 45,
                type: "radialBar"
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: "true" == t ? "50%" : "25%"
                    },
                    dataLabels: {
                        show: "true" == t,
                        value: {
                            offsetY: -10,
                            fontSize: "15px",
                            fontWeight: 500,
                            fontFamily: i,
                            color: a
                        }
                    },
                    track: {
                        background: config.colors_label.secondary
                    }
                }
            },
            stroke: {
                lineCap: "round"
            },
            colors: [r],
            grid: {
                padding: {
                    top: "true" == t ? -12 : -15,
                    bottom: "true" == t ? -17 : -15,
                    left: "true" == t ? -17 : -5,
                    right: -15
                }
            },
            series: [o],
            labels: "true" == t ? [""] : ["Progress"]
        });
        new ApexCharts(e,r).render()
    }),
    document.querySelector("#orderStatisticsChart"))
      , n = {
        chart: {
            height: 165,
            width: 136,
            type: "donut",
            offsetX: 15
        },
        labels: ["Electronic", "Sports", "Decor", "Fashion"],
        series: [50, 85, 25, 40],
        colors: [config.colors.success, config.colors.primary, config.colors.secondary, config.colors.info],
        stroke: {
            width: 5,
            colors: [r]
        },
        dataLabels: {
            enabled: !1,
            formatter: function(e, r) {
                return parseInt(e) + "%"
            }
        },
        legend: {
            show: !1
        },
        grid: {
            padding: {
                top: 0,
                bottom: 0,
                right: 15
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "75%",
                    labels: {
                        show: !0,
                        value: {
                            fontSize: "1.125rem",
                            fontFamily: i,
                            fontWeight: 500,
                            color: a,
                            offsetY: -17,
                            formatter: function(e) {
                                return parseInt(e) + "%"
                            }
                        },
                        name: {
                            offsetY: 17,
                            fontFamily: i
                        },
                        total: {
                            show: !0,
                            fontSize: "13px",
                            color: o,
                            label: "Weekly",
                            formatter: function(e) {
                                return "38%"
                            }
                        }
                    }
                }
            }
        },
        states: {
            active: {
                filter: {
                    type: "none"
                }
            }
        }
    }
      , s = (null !== s && new ApexCharts(s,n).render(),
    document.querySelector("#reportBarChart"))
      , n = {
        chart: {
            height: 200,
            type: "bar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                barHeight: "60%",
                columnWidth: "60%",
                startingShape: "rounded",
                endingShape: "rounded",
                borderRadius: 4,
                distributed: !0
            }
        },
        grid: {
            show: !1,
            padding: {
                top: -20,
                bottom: 0,
                left: -10,
                right: -10
            }
        },
        colors: [config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors.primary, config.colors_label.primary, config.colors_label.primary],
        dataLabels: {
            enabled: !1
        },
        series: [{
            data: [40, 95, 60, 45, 90, 50, 75]
        }],
        legend: {
            show: !1
        },
        xaxis: {
            categories: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
            axisBorder: {
                show: !1
            },
            axisTicks: {
                show: !1
            },
            labels: {
                style: {
                    colors: t,
                    fontSize: "13px"
                }
            }
        },
        yaxis: {
            labels: {
                show: !1
            }
        }
    }
      , s = (null !== s && new ApexCharts(s,n).render(),
    document.querySelector("#conversionRateChart"))
      , n = {
        chart: {
            height: 80,
            width: 140,
            type: "line",
            toolbar: {
                show: !1
            },
            dropShadow: {
                enabled: !0,
                top: 10,
                left: 5,
                blur: 3,
                color: config.colors.primary,
                opacity: .15
            },
            sparkline: {
                enabled: !0
            },
            offsetX: -5
        },
        markers: {
            size: 6,
            colors: "transparent",
            strokeColors: "transparent",
            strokeWidth: 4,
            discrete: [{
                fillColor: r,
                seriesIndex: 0,
                dataPointIndex: 3,
                strokeColor: config.colors.primary,
                strokeWidth: 4,
                size: 5,
                radius: 2
            }],
            hover: {
                size: 7
            }
        },
        grid: {
            show: !1,
            padding: {
                right: 8
            }
        },
        colors: [config.colors.primary],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: 5,
            curve: "smooth"
        },
        series: [{
            data: [137, 210, 160, 245]
        }],
        xaxis: {
            show: !1,
            lines: {
                show: !1
            },
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        yaxis: {
            show: !1
        }
    };
    new ApexCharts(s,n).render();
    let l = document.querySelector(".credit-card-payment")
      , c = document.querySelector(".expiry-date-payment")
      , d = document.querySelectorAll(".cvv-code-payment");
    l && (l.addEventListener("input", e => {
        l.value = formatCreditCard(e.target.value);
        e = e.target.value.replace(/\D/g, ""),
        e = getCreditCardType(e);
        document.querySelector(".card-payment-type").innerHTML = e && "unknown" !== e && "general" !== e ? '<img src="' + assetsPath + "img/icons/payments/" + e + '-cc.png" class="cc-icon-image" height="28"/>' : ""
    }
    ),
    registerCursorTracker({
        input: l,
        delimiter: " "
    })),
    c && (c.addEventListener("input", e => {
        c.value = formatDate(e.target.value, {
            delimiter: "/",
            datePattern: ["m", "y"]
        })
    }
    ),
    registerCursorTracker({
        input: c,
        delimiter: "/"
    })),
    d && d.forEach(function(r) {
        r.addEventListener("input", e => {
            e = e.target.value.replace(/\D/g, "");
            r.value = formatNumeral(e, {
                numeral: !0,
                numeralPositiveOnly: !0
            })
        }
        )
    })
});
