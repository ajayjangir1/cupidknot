<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
  
<div class="container my-5">
    <h3>Welcome, {{ auth()->guard('admin')->user()->name }} </h3><br> 
    <div class="mt-4">
        <ul>
            <li><a href="{{ route('users.list') }}">Users</a></li>
            <li><a href="{{ route('adminLogout') }}">Logout</a></li>
        </ul>
    </div>
</div>
   
</body>
</html>