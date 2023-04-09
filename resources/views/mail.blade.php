<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
</head>

<body>

    <section id="mail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Hi, You have got a query request from the following details.
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $data['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $data['phone'] }}</td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td>{{ $data['subject'] }}</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>
                                <p>
                                    {!! $data['message'] !!}
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>
