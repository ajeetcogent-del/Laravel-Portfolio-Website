<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <h2>Hello {{ $user->name }} 👋</h2>

    <p>
        Welcome to our platform!
        Your account has been successfully created.
    </p>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->getRoleLabel() }}</p>

    <br>

    <p>Thanks & Regards,<br>
        <strong>{{ config('app.name') }}</strong>
    </p>
</body>

</html>