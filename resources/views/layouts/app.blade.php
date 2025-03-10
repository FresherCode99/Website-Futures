<!doctype html>


<html lang="en" class=" layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-skin="default"
    data-assets-path="{{ asset('../../assets/') }}" data-template="vertical-menu-template" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <meta name="user-id" content="{{ auth()->id() }}">
    <title>@yield('title')</title>



    <!-- Canonical SEO -->
    <meta name="description"
        content="Sneat is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />

    <meta name="keywords"
        content="Sneat bootstrap dashboard, sneat bootstrap 5 dashboard, themeselection, html dashboard, web dashboard, frontend dashboard, responsive bootstrap theme" />
    <meta property="og:title" content="Sneat Bootstrap 5 Dashboard PRO by ThemeSelection" />
    <meta property="og:type" content="product" />
    {{-- <meta property="og:url" content="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/" />
        <meta property="og:image" content="https://themeselection.com/wp-content/uploads/edd/2024/08/sneat-dashboard-pro-bootstrap-smm-image.png" /> --}}
    <meta property="og:description"
        content="Sneat is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
    <meta property="og:site_name" content="ThemeSelection" />
    {{-- <link rel="canonical" href="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/" /> --}}



    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('../../assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('../../assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->


    <link rel="stylesheet" href="{{ asset('../../assets/vendor/libs/pickr/pickr-themes.css') }}" />

    <link rel="stylesheet" href="{{ asset('../../assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('../../assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('../../assets/vendor/libs/maxLength/maxLength.css') }}" />
    <link rel="stylesheet" href="{{ asset('../../assets/vendor/css/pages/app-chat.css') }}" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->
    <link rel="stylesheet" href="{{ asset('../../assets/vendor/libs/notyf/notyf.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/vendor/libs/animate-css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />

    <link rel="stylesheet" href="{{ asset('../../assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('../../assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('../../assets/vendor/css/pages/page-profile.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('../../assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('../../assets/vendor/js/template-customizer.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('../../assets/js/config.js') }}"></script>
    <style>
        .description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .my-team {

            min-height: 321px;
        }

        .my-teams {
            display: flex;
            flex-direction: column;
            text-align: center;
            height: 263px;
            justify-content: flex-end;
            border: none;
        }
        .btn-lg {
    padding: 10px 20px;
    font-size: 1.1rem;
    border-radius: 5px;
}

.btn-success {
    background-color: #28a745;
    color: white;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-success:hover, .btn-danger:hover {
    opacity: 0.8;
}
    </style>
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">


            @include('layouts.menu')



            <!-- Layout container -->
            <div class="layout-page">

                <!--Navbar Include -->
                @include('layouts.navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @if (session('alert'))
                        {{-- bs-toast toast toast-ex animate__animated my-2 fade bg-success animate__tada hide --}}
                        <div class="bs-toast toast toast-ex animate__animated my-2 fade {{ 'bg-' . session('alert.ic', 'info') }} animate__tada show"
                            role="alert" aria-live="assertive" data-bs-delay="2000" aria-atomic="true">
                            <div class="toast-header">
                                <i class="icon-base bx bx-bell me-2"></i>
                                <div class="me-auto fw-medium">{{ session('alert.title', 'Thông báo') }}</div>
                                {{-- <small>11 mins ago</small> --}}
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body"> {{ session('alert.message', 'Thông báo từ hệ thống') }}</div>
                        </div>
                    @endif
                    @yield('mainn')




                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>, made with ❤️ by <a href="#" target="_blank"
                                        class="footer-link">White Rabit</a>
                                </div>
                                <div class="d-none d-lg-inline-block">

                                    <a href="#" class="footer-link me-4" target="_blank">Blog</a>
                                    <a href="#" target="_blank" class="footer-link me-4">Khóa Học</a>

                                    <a href="#" target="_blank" class="footer-link me-4">Portfolio</a>


                                    <a href="#" target="_blank"
                                        class="footer-link d-none d-sm-inline-block">Contact</a>

                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js  -->


    <script src="{{ asset('../../assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('../../assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('../../assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('../../assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>



    <script src="{{ asset('../../assets/vendor/libs/pickr/pickr.js') }}"></script>



    <script src="{{ asset('../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


    <script src="{{ asset('../../assets/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('../../assets/vendor/libs/i18n/i18n.js') }}"></script>


    <script src="{{ asset('../../assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('../../assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>


    <!-- Main JS -->

    <script src="{{ asset('../../assets/js/main.js') }}"></script>
    <script src="{{ asset('../../assets/js/app-user-view-account.js') }}"></script>


    <!-- Page JS -->
    <script src="{{ asset('../../assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('../../assets/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('../../assets/vendor/libs/notyf/notyf.js') }}"></script>
    <script src="{{ asset('../../assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('../../assets/js/app-ecommerce-product-list.js') }}"></script>
    <script src="{{ asset('../../assets/js/app-chat.js ') }} "></script>
    <script>
        // Khởi tạo tất cả các toast có trong trang
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
            toastElList.forEach(function(toastEl) {
                var toast = new bootstrap.Toast(toastEl);
                toast.show(); // Hiển thị Toast và tự động tắt sau khoảng thời gian đã chỉ định
            });
        });
    </script>
    <script>
        var img = document.getElementById('')

        // Hàm xử lý thay đổi ảnh
        function previewImage(event) {
            const file = event.target.files[0]; // Lấy file đầu tiên người dùng chọn
            const reader = new FileReader();

            reader.onload = function() {
                // Cập nhật ảnh mới vào thẻ img
                document.getElementById('uploadedAvatar').src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file); // Đọc file ảnh và chuyển thành URL
            }
        }
    </script>

{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

   @vite(['resources/js/app.js'])


    {{-- <script>
        $('#sendMessageForm').submit(function(e) {
    e.preventDefault();
    
    var message = $('#message').val();
    var receiverId = $('#receiverId').val();

    axios.post('/messages//send/' + receiverId , {
        message: message
    })
    .then(response => {
        // Xử lý phản hồi, như cập nhật giao diện người dùng
        console.log(response.data);
    })
    .catch(error => {
        console.log(error);
    });
});
    </script> --}}
</body>

</html>

<!-- beautify ignore:end -->
