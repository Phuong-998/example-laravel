<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <label for="">Tên đăng nhập</label>
        <input type="text" name="email">
        <label for="">Mật khẩu</label>
        <input type="password" name="password">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>