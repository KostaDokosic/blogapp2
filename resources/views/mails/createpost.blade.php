<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

    <h1>Hello, new post has been susccessfully created.</h1>
    <ul>
        <li>Title: {{ $mailData['title'] }}</li>
        <li>Body: {{ $mailData['body'] }}</li>
    </ul>

</body>

</html>
