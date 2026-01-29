<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <table>
        <form action="/auth/check-register" method="post">
            @csrf
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>mssv</td>
                <td><input type="text" name="mssv"></td>
            </tr>
            <tr>
                <td>lopmonhoc</td>
                <td><input type="text" name="lopmonhoc"></td>
            </tr>
            <tr>
                <td>gioitinh</td>
                <td><input type="text" name="gioitinh"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>repassword</td>
                <td><input type="password" name="repassword"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary">register</button>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>