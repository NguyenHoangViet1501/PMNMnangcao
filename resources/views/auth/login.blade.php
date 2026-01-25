<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <form action="/auth/check-login" method="post">
            @csrf
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary">login</button>
                </td>

                <td colspan="2">
                    <a href="/auth/register" class="btn btn-primary">register</a>
                </td>
            </tr>
        </form>
</body>
</html>