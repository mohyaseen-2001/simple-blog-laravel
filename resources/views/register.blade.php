<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * { box-sizing: border-box; font-family: system-ui, -apple-system, sans-serif; }
        body { background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; }
        .card { background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px rgba(16, 185, 129, 0.08); border-top: 5px solid #059669; width: 100%; max-width: 440px; }
        .header { text-align: center; margin-bottom: 26px; }
        .header h3 { color: #064e3b; margin: 0 0 8px 0; font-size: 26px; font-weight: 700; }
        .header p { color: #64748b; margin: 0; font-size: 14px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; font-size: 13.5px; color: #1e293b; }
        input { width: 100%; padding: 12px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 15px; transition: all 0.2s ease; background-color: #f8fafc; }
        input:focus { outline: none; border-color: #059669; background-color: #ffffff; box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15); }
        .btn { width: 100%; padding: 13px; background-color: #059669; color: white; border: none; border-radius: 10px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 10px; transition: background-color 0.2s; }
        .btn:hover { background-color: #047857; }
        .alert { padding: 12px 14px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; }
        .alert-danger { background-color: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
        .alert-danger ul { margin: 0; padding-left: 18px; }
        .footer { text-align: center; margin-top: 24px; padding-top: 18px; border-top: 1px solid #f1f5f9; font-size: 14px; color: #64748b; }
        .footer a { color: #059669; text-decoration: none; font-weight: 600; }
        .footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <div class="header">
            <h3>Create Account</h3>
            <p>Join us by filling out your details below</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="At least 8 characters" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Repeat your password" required>
            </div>
            
            <button type="submit" class="btn">Register</button>
        </form>
        
        <div class="footer">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
        </div>
    </div>

</body>
</html>
