<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'TickTick') }} - @yield('title')</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin:0; padding:0; background:#f9f9f9; color:#333; }
        header, footer { background:#007BFF; color:white; padding:15px; text-align:center; }
        header h1 { margin:0; font-size:1.8em; }
        nav { margin-top:10px; }
        nav a, nav button { 
            margin:0 10px; 
            text-decoration:none; 
            color:white; 
            font-weight:500; 
            padding:6px 12px; 
            border-radius:4px; 
            transition: background 0.3s ease; 
        }
        nav a.active { background:#0056b3; }
        nav a:hover { background:#0056b3; }
        nav button { background:none; border:none; cursor:pointer; font-size:1em; color:white; }
        nav button:hover { text-decoration:underline; }
        main { margin:30px auto; max-width:800px; background:white; padding:20px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
        h2 { color:#007BFF; }
        input, textarea { padding:10px; margin:8px 0; width:100%; border:1px solid #ccc; border-radius:4px; }
        button.submit { padding:10px 20px; background:#007BFF; color:white; border:none; cursor:pointer; border-radius:4px; }
        button.submit:hover { background:#0056b3; }

        .flash-success, .flash-error {
            padding:12px; margin-bottom:20px; border-radius:6px;
            position:relative; animation: slideDown 0.5s ease-out;
        }
        .flash-success { background:#d4edda; color:#155724; border:1px solid #c3e6cb; }
        .flash-error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; }

        @keyframes slideDown {
            from { transform: translateY(-30px); opacity:0; }
            to { transform: translateY(0); opacity:1; }
        }

        .close-btn { float:right; cursor:pointer; font-weight:bold; margin-left:10px; }
        .close-btn:hover { color:#000; }

        footer small { font-size:0.9em; }
    </style>
</head>
<body>
    <header>
        <h1>{{ config('app.name', 'TickTick') }}</h1>
        <nav>
            <a href="{{ url('/login') }}" class="{{ Request::is('login') ? 'active' : '' }}">🔑 Login</a>
            <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'active' : '' }}">🏠 Home</a>
            <a href="{{ route('tasks.index') }}" class="{{ Request::is('tasks') ? 'active' : '' }}">📋 Daftar Task</a>
            <a href="{{ route('tasks.create') }}" class="{{ Request::is('tasks/create') ? 'active' : '' }}">➕ Tambah Task</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">🚪 Logout</button>
            </form>
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="flash-success" id="flash-message">
                ✔ {{ session('success') }}
                <span class="close-btn" onclick="closeFlash()">✖</span>
            </div>
        @endif

        @if($errors->any())
            <div class="flash-error" id="flash-message">
                ✖ {{ $errors->first() }}
                <span class="close-btn" onclick="closeFlash()">✖</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <small>&copy; {{ date('Y') }} TickTick App</small>
    </footer>

    <script>
        setTimeout(function() {
            let flash = document.getElementById('flash-message');
            if (flash) {
                flash.style.transition = "opacity 0.5s ease";
                flash.style.opacity = "0";
                setTimeout(() => flash.remove(), 500);
            }
        }, 3000);

        function closeFlash() {
            let flash = document.getElementById('flash-message');
            if (flash) {
                flash.remove();
            }
        }
    </script>
</body>
</html>