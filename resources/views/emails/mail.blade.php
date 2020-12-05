<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Underground Events Contact Form</title>
</head>
<body>
{{--Simple contact message to site admin--}}
<b>Message Received from Underground Events!</b><br>
<b>Name:</b>{{ $data['name'] }}<br>
<b>Email:</b>{{ $data['email'] }}<br>
<b>Message</b>{!! nl2br(e($data['message']))!!}}

</body>
</html>
