{{-- resources/views/emails/success-message.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $messagesData['title'] }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding: 40px 0;
            background: #EBF0F5;
        }

        h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }

        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
            margin-bottom: 10px
        }

        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }

        .card {
            background: #f2f2f2;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #e5e5e5;
            display: block;
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="card">
            <div style="border-radius:200px; max-height:200px; max-width:200px; background: #F8FAF5; margin:0 auto;">
                <i class="checkmark">✓</i>
            </div>
            <h1>{{ $messagesData['head_title'] }}</h1>
            @foreach ($messagesData['messages'] as $item)
                <p>{!! nl2br(e($item)) !!}</p>
            @endforeach

        </div>

    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
