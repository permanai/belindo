<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/template/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | belindo</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin />
    <link
        href="{{ url('https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap') }}"
        rel="stylesheet" />

    @include('includes.style')

    @stack('addon-style')

    @include('includes.script')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Side Menu -->
            @include('partials.sidemenu')
            <!-- / Side Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('partials.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('partials.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core scripts -->
    @include('includes.core-script')
    @stack('addon-script')

    @php
        /**
         * Alert
         */
        $message = '';
        $icon = '';

        if (!empty($errors->all())) {
            $icon = 'error';
            $message = $errors->first();
        } elseif (session()->has('success')) {
            $icon = 'success';
            $message = session()->get('success');
        } elseif (session()->has('error')) {
            $icon = 'error';
            $message = session()->get('error');
        } elseif (!empty($success)) {
            $icon = 'success';
            $message = $success;
        }
    @endphp
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
        });
        var message = '{{ $message }}';
        var icon = '{{ $icon }}';
        if (message.length > 0) {
            Toast.fire({
                icon: icon,
                title: message
            });
        }
    </script>

    <script>
        // Delete Confirmation
        function confirm_form_delete(element) {
            var form = $(element).closest("form");

            Swal.fire({
                title: `Are you sure you want to delete this profile?`,
                text: "If you delete this, it will be gone forever.",
                customClass: {
                    cancelButton: 'btn btn-danger'
                },
                showCancelButton: true,
                cancelButtonText: 'No',
                cancelButtonColor: '#ce4242',
                confirmButtonColor: '#004A99',
                confirmButtonText: `Yes`,
                closeOnConfirm: false
            }).then((result) => {

                if (!result.isConfirmed) return;

                jQuery(form).submit();

            });
        }

        function saverecord() {
            $("#submitbtn").trigger('click');
        }

        /**
         *  Display Image
         */
        function display_image(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {

                    $(input).closest('div').find('.box-image-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }

        }
    </script>
@yield('js')
</body>

</html>
