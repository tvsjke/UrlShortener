<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Url Shortener</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
        }

        input {
            font-size: 14px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
            margin: 0;
            outline: none;
        }

        input[type="url"] {
            flex: 1 1 auto;
        }

        input[type="submit"] {
            flex: 0 0 150px;
            color: #636b6f;
            background: #90ddaa;
        }

        input[type="submit"]:hover {
            cursor: pointer;
            background: #90ee90;
        }
    </style>
</head>
<body>
<div class="flex-center full-height">
    <div class="content">
        <div class="title m-b-md">
            Url Shortener
        </div>

        @if($errors->has('url'))
            <p>{{ $errors->first('url') }}</p>
        @endif

        @if(session()->has('hash'))
            <p>Here is your shortened link <a href="{{ url(session('hash')) }}">{{ url(session('hash')) }}</a></p>
        @endif

        <form action="{{ route('store') }}" method="post">
            {{ csrf_field() }}
            <input type="url" required name="url" placeholder="Enter the URL" value="{{ old('url') }}" autocomplete="off">
            <input type="submit" value="Shorten">
        </form>
    </div>
</div>
</body>
</html>
