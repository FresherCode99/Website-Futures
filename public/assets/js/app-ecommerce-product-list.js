document.addEventListener("DOMContentLoaded", function (e) {
    config.colors.borderColor,
        config.colors.bodyBg,
        config.colors.headingColor;
    let t = document.querySelector(".datatables-products")
        , s = {

        };
    t && new DataTable(t, {


        // columns: [{
        //     data: "id"
        // }, {
        //     data: "id",
        //     orderable: !1,
        //     // render: DataTable.render.select()
        // },{
        //     data: "name"
        // }, {
        //     data: "admin_id"
        // }, {
        //     data: "description"
        // } ],
        columnDefs: [{
            className: "control",
            searchable: !1,
            orderable: !1,
            responsivePriority: 2,
            targets: 0,
            render: function (e, t, n, o) {
                return ""
            }
        },
        {
            targets: 2, // Cột project_name
            searchable: true, // Cho phép tìm kiếm trên cột project_name
        }],
        // select: {
        //     style: "multi",
        //     selector: "td:nth-child(2)"
        // },
        order: [[2, "desc"]],
        layout: {
            topStart: {
                rowClass: "card-header d-flex border-top rounded-0 flex-wrap py-0 flex-column flex-md-row align-items-start",
                features: [{
                    search: {
                        className: "me-5 ms-n4 pe-5 mb-n6 mb-md-0",
                        placeholder: "Search Teams",
                        text: "_INPUT_"
                    }
                }]
            },
            topEnd: {
                rowClass: "row m-3 my-0 justify-content-between",
                features: [{
                    pageLength: {
                        menu: [10, 25, 50, 100],
                        text: "_MENU_"
                    },
                    buttons: [{
                        extend: "collection",
                        className: "btn btn-label-secondary dropdown-toggle me-4",
                        text: '<span class="d-flex align-items-center gap-2"><i class="icon-base bx bx-export icon-xs"></i> <span class="d-none d-sm-inline-block">Export</span></span>',
                        buttons: [{
                            extend: "print",
                            text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-printer me-1"></i>Print</span>',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                format: {
                                    body: function (e, t, n) {
                                        if (e.length <= 0 || !(-1 < e.indexOf("<")))
                                            return e;
                                        {
                                            e = (new DOMParser).parseFromString(e, "text/html");
                                            let t = "";
                                            var o = e.querySelectorAll(".name");
                                            return 0 < o.length ? o.forEach(e => {
                                                e = e.querySelector(".fw-medium")?.textContent || e.querySelector(".d-block")?.textContent || e.textContent;
                                                t += e.trim() + " "
                                            }
                                            ) : t = e.body.textContent || e.body.innerText,
                                                t.trim()
                                        }
                                    }
                                }
                            },
                            customize: function (e) {
                                e.document.body.style.color = config.colors.headingColor,
                                    e.document.body.style.borderColor = config.colors.borderColor,
                                    e.document.body.style.backgroundColor = config.colors.bodyBg;
                                e = e.document.body.querySelector("table");
                                e.classList.add("compact"),
                                    e.style.color = "inherit",
                                    e.style.borderColor = "inherit",
                                    e.style.backgroundColor = "inherit"
                            }
                        }, {
                            extend: "csv",
                            text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-file me-1"></i>Csv</span>',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                format: {
                                    body: function (e, t, n) {
                                        if (e.length <= 0)
                                            return e;
                                        e = (new DOMParser).parseFromString(e, "text/html");
                                        let o = "";
                                        var s = e.querySelectorAll(".name");
                                        return 0 < s.length ? s.forEach(e => {
                                            e = e.querySelector(".fw-medium")?.textContent || e.querySelector(".d-block")?.textContent || e.textContent;
                                            o += e.trim() + " "
                                        }
                                        ) : o = e.body.textContent || e.body.innerText,
                                            o.trim()
                                    }
                                }
                            }
                        }, {
                            extend: "excel",
                            text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-export me-1"></i>Excel</span>',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                format: {
                                    body: function (e, t, n) {
                                        if (e.length <= 0)
                                            return e;
                                        e = (new DOMParser).parseFromString(e, "text/html");
                                        let o = "";
                                        var s = e.querySelectorAll(".name");
                                        return 0 < s.length ? s.forEach(e => {
                                            e = e.querySelector(".fw-medium")?.textContent || e.querySelector(".d-block")?.textContent || e.textContent;
                                            o += e.trim() + " "
                                        }
                                        ) : o = e.body.textContent || e.body.innerText,
                                            o.trim()
                                    }
                                }
                            }
                        }, {
                            extend: "pdf",
                            text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-pdf me-1"></i>Pdf</span>',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                format: {
                                    body: function (e, t, n) {
                                        if (e.length <= 0)
                                            return e;
                                        e = (new DOMParser).parseFromString(e, "text/html");
                                        let o = "";
                                        var s = e.querySelectorAll(".name");
                                        return 0 < s.length ? s.forEach(e => {
                                            e = e.querySelector(".fw-medium")?.textContent || e.querySelector(".d-block")?.textContent || e.textContent;
                                            o += e.trim() + " "
                                        }
                                        ) : o = e.body.textContent || e.body.innerText,
                                            o.trim()
                                    }
                                }
                            }
                        }, {
                            extend: "copy",
                            text: '<i class="icon-base bx bx-copy me-1"></i>Copy',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                format: {
                                    body: function (e, t, n) {
                                        if (e.length <= 0)
                                            return e;
                                        e = (new DOMParser).parseFromString(e, "text/html");
                                        let o = "";
                                        var s = e.querySelectorAll(".name");
                                        return 0 < s.length ? s.forEach(e => {
                                            e = e.querySelector(".fw-medium")?.textContent || e.querySelector(".d-block")?.textContent || e.textContent;
                                            o += e.trim() + " "
                                        }
                                        ) : o = e.body.textContent || e.body.innerText,
                                            o.trim()
                                    }
                                }
                            }
                        }]
                    }, {
                        text: '<i class="icon-base bx bx-plus me-0 me-sm-1 icon-xs"></i><span class="d-none d-sm-inline-block">Add Teams</span>',
                        className: "add-new btn btn-primary",
                        action: function () {
                            window.location.href = "teams/create"
                        }
                    }]
                }]
            },
            bottomStart: {
                rowClass: "row mx-3 justify-content-between",
                features: ["info"]
            },
            bottomEnd: {
                paging: {
                    firstLast: !1
                }
            }
        },
        language: {
            paginate: {
                next: '<i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-18px"></i>',
                previous: '<i class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-18px"></i>'
            }
        },
        responsive: {
            details: {
                display: DataTable.Responsive.display.modal({
                    header: function (e) {
                        return "Details of " + e.data().name
                    }
                }),
                type: "column",
                renderer: function (e, t, n) {
                    var o, s, a, n = n.map(function (e) {
                        return "" !== e.title ? `<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                      <td>${e.title}:</td>
                      <td>${e.data}</td>
                    </tr>` : ""
                    }).join("");
                    return !!n && ((o = document.createElement("div")).classList.add("table-responsive"),
                        s = document.createElement("table"),
                        o.appendChild(s),
                        s.classList.add("table"),
                        (a = document.createElement("tbody")).innerHTML = n,
                        s.appendChild(a),
                        o)
                }
            }
        },

    }),
        setTimeout(() => {
            [{
                selector: ".dt-buttons .btn",
                classToRemove: "btn-secondary"
            }, {
                selector: ".dt-search .form-control",
                classToRemove: "form-control-sm",
                classToAdd: "ms-0"
            }, {
                selector: ".dt-search",
                classToAdd: "mb-0 mb-md-6"
            }, {
                selector: ".dt-length .form-select",
                classToRemove: "form-select-sm"
            }, {
                selector: ".dt-length",
                classToAdd: "mb-md-6 mb-4"
            }, {
                selector: ".dt-layout-table",
                classToRemove: "row mt-2"
            }, {
                selector: ".dt-layout-start",
                classToAdd: "mt-0"
            }, {
                selector: ".dt-layout-end",
                classToRemove: "justify-content-between",
                classToAdd: "justify-content-md-between justify-content-center d-flex flex-wrap gap-2 mb-md-0 mb-4 mt-0"
            }, {
                selector: ".dt-layout-full",
                classToRemove: "col-md col-12",
                classToAdd: "table-responsive"
            }].forEach(({ selector: e, classToRemove: n, classToAdd: o }) => {
                document.querySelectorAll(e).forEach(t => {
                    n && n.split(" ").forEach(e => t.classList.remove(e)),
                        o && o.split(" ").forEach(e => t.classList.add(e))
                }
                )
            }
            )
            [{
                selector: ".dt-buttons .btn",
                classToRemove: "btn-secondary"
            }, {
                selector: ".dt-search .form-control",
                classToRemove: "form-control-sm",
                classToAdd: "ms-0"
            }, {
                selector: ".dt-search",
                classToAdd: "mb-0 mb-md-6"
            }, {
                selector: ".dt-length .form-select",
                classToRemove: "form-select-sm"
            }, {
                selector: ".dt-length",
                classToAdd: "mb-md-6 mb-4"
            }, {
                selector: ".dt-layout-table",
                classToRemove: "row mt-2"
            }, {
                selector: ".dt-layout-start",
                classToAdd: "mt-0"
            }, {
                selector: ".dt-layout-end",
                classToRemove: "justify-content-between",
                classToAdd: "justify-content-md-between justify-content-center d-flex flex-wrap gap-2 mb-md-0 mb-4 mt-0"
            }, {
                    selector: ".dt-layout-full",
                    classToRemove: "col-md col-12",
                    classToAdd: "table-responsive"
                }].forEach(({ selector: e, classToRemove: n, classToAdd: o }) => {
                    document.querySelectorAll(e).forEach(t => {
                        n && n.split(" ").forEach(e => t.classList.remove(e)),
                            o && o.split(" ").forEach(e => t.classList.add(e))
                    }
                    )
                }
                )
        }
            , 100)
});
