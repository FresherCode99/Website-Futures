// document.addEventListener("DOMContentLoaded", function () {
//     var table = document.querySelector(".datatable-project");

//     if (table) {
//         var dataTable = new DataTable(table, {
//             // Thiết lập số lượng dòng hiển thị mặc định
//             displayLength: 10,

//             // Tùy chọn số lượng dòng hiển thị trong menu phân trang
//             lengthMenu: [10, 25, 50, 100],

//             // Kích hoạt chức năng tìm kiếm toàn cột
//             searching: true,

//             // Cấu hình phân trang
//             paging: true,

//             // Cấu hình sắp xếp
//             order: [[2, "desc"]],  // Mặc định sắp xếp theo cột 2 (project_name) theo thứ tự giảm dần
            
//             // Tùy chỉnh các cột để lọc
//             columnDefs: [
//                 {
//                     targets: 0, // Cột ID
//                     visible: false, // Không hiển thị cột ID
//                 },
//                 {
//                     targets: 2, // Cột project_name
//                     searchable: true, // Cho phép tìm kiếm trên cột project_name
//                 }
//             ],

//             // Tùy chỉnh ngôn ngữ
//             language: {
//                 lengthMenu: "_MENU_ ", // Tùy chỉnh chuỗi văn bản "X records per page"
//                 search: "Search :",  // Tùy chỉnh text của hộp tìm kiếm
//                 paginate: {
//                     next: '<i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-18px"></i>',
//                     previous: '<i class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-18px"></i>'
//                 },
//                 info: "Showing _START_ to _END_ of _TOTAL_ entries", // Hiển thị thông tin phân trang
//             },

//             // Tùy chọn hiển thị chi tiết mỗi dòng khi nhấp vào
//             responsive: {
//                 details: {
//                     display: DataTable.Responsive.display.modal({
//                         header: function (row) {
//                             return "Details of " + row.data().project_name;
//                         }
//                     }),
//                     type: "column",
//                     renderer: function (api, row, columns) {
//                         var rows = columns.map(function (column) {
//                             return "<tr><td>" + column.title + ":</td><td>" + column.data + "</td></tr>";
//                         }).join("");
//                         return rows.length ? "<table><tbody>" + rows + "</tbody></table>" : '';
//                     }
//                 }
//             }
//         });

//         // Thiết lập lại thông tin phân trang khi người dùng thay đổi số lượng dòng hiển thị
//         document.querySelector(".dataTables_length select").addEventListener("change", function (e) {
//             var length = e.target.value;
//             dataTable.page.len(length).draw();
//         });
//     }
// });
