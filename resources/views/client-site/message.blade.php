<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>message</title>
    <link rel="stylesheet" href="{{ asset('toastr.min.css') }}">
</head>

<body>

    <h2 style="text-align: center;color:green;font-family: cursive;margin-top: 192px;
    font-size: 38px;">Please Check
        Your Mail, And Hit this login url and
        login!!</h2>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script src="{{ asset('toastr.min.js') }}"></script>
    <script>
        $(window).load(function() {
            setTimeout(() => {
                window.location.href = "http://127.0.0.1:8000/"
            }, 5000);
        });
    </script>



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
