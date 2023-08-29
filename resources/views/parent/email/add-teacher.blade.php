<!DOCTYPE html>
<html>
<head>
    <title>Invite Mail</title>
</head>
<body>
    <h1>Hi {{ $mailData['teacher_name'] }}!</h1>
    <p>{{ $mailData['parent_name'] }} has sent you a invite request.</p>
    <p> You can accept/reject invite from <a href={{route('teacher.invites')}}> here </a></p>
    <p>Thank you</p>
</body>
</html>