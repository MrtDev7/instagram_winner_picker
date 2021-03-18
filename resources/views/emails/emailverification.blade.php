<html>

<head>
    <title>{{ $details['title'] }}</title>
</head>

<body>
    <p>{{ $details['body'] }}</p>
    @if (Arr::exists($details, 'url'))
    <p><a href="{{$details['url']}}">Click here</a></p>
    @endif
    @if (Arr::exists($details, 'password'))
    <p>{{ $details['password'] }}</p>
    @endif
    <p>Thank you</p>
</body>

</html>