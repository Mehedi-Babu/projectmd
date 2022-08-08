<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Over The Wall</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="{{ asset('client/style.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr.min.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!-- MultiStep Form -->
    @yield('content')
    <!-- /.MultiStep Form -->
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="{{ asset('client/script.js') }}"></script>
    <script src="{{ asset('toastr.min.js') }}"></script>

    @yield('footer')

    <script type="text/javascript">
        @if (Session::has('message'))

            var type = "{{ Session::get('alert-type', 'success') }}";

            switch (type) {
                case "success":
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case "error":
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

</body>

</html>
