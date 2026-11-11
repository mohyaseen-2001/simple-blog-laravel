<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * { box-sizing: border-box; font-family: system-ui, -apple-system, sans-serif; }
        body { background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; }
        .card { background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px rgba(16, 185, 129, 0.08); border-top: 5px solid #059669; width: 100%; max-width: 410px; }
        .header { text-align: center; margin-bottom: 28px; }
        .header h3 { color: #064e3b; margin: 0 0 8px 0; font-size: 26px; font-weight: 700; }
        .header p { color: #64748b; margin: 0; font-size: 14px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; font-size: 13.5px; color: #1e293b; }
        input { width: 100%; padding: 12px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 15px; transition: all 0.2s ease; background-color: #f8fafc; }
        input:focus { outline: none; border-color: #059669; background-color: #ffffff; box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15); }
        .btn { width: 100%; padding: 13px; background-color: #059669; color: white; border: none; border-radius: 10px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 10px; transition: background-color 0.2s; }
        .btn:hover { background-color: #047857; }
        .alert { padding: 12px 14px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; }
        .alert-danger { background-color: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
        .alert-success { background-color: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .footer { text-align: center; margin-top: 26px; padding-top: 18px; border-top: 1px solid #f1f5f9; font-size: 14px; color: #64748b; }
        .footer a { color: #059669; text-decoration: none; font-weight: 600; }
        .footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <div class="header">
            <h3>Welcome Back</h3>
            <p>Sign in to continue to your workspace</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn">Sign In</button>
        </form>
        
        <div class="footer">
            Don't have an account? <a href="{{ route('register') }}">Create one</a>
        </div>
    </div>

</body>
</html>
