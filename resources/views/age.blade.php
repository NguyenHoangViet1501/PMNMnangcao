<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập tuổi</title>
</head>
<body>
    <h1>Nhập tuổi của bạn</h1>
    <form action="/age/save" method="post">
        @csrf
        <label for="age">Tuổi:</label>
        <input type="text" id="age" name="age" required>
        <button type="submit">Gửi</button>
    </form>
</body>
</html>
