<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasundan Airlines</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        /* Navbar */
        nav {
            background: linear-gradient(135deg, #FF8C00, #FF6B00);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        nav h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
            align-items: center;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0.8rem;
            border-radius: 4px;
        }
        
        nav a:hover {
            background-color: rgba(255,255,255,0.2);
        }
        
        nav button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.5rem 0.8rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        nav button:hover {
            background-color: rgba(255,255,255,0.2);
        }
        
        .btn-warning {
            background-color: #ffc107;
            color: #212529 !important;
            font-weight: 600;
        }
        
        .btn-warning:hover {
            background-color: #e0a800 !important;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(255, 140, 0, 0.8), rgba(255, 107, 0, 0.8)), url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 5rem 2rem;
        }
        
        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-button {
            background-color: white;
            color: #FF6B00;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .cta-button:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        /* Features Section */
        .features {
            padding: 4rem 2rem;
            background-color: white;
        }
        
        .features h3 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 3rem;
            color: #FF6B00;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .feature-card {
            text-align: center;
            padding: 2rem 1rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: #FF6B00;
            margin-bottom: 1rem;
        }
        
        .feature-card h4 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .feature-card p {
            color: #666;
        }
        
        /* Main content */
        main {
            min-height: calc(100vh - 140px);
        }
        
        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1.5rem;
            font-size: 0.9rem;
        }
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            position: relative;
        }
        
        .modal h2 {
            color: #FF6B00;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .modal input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .modal button[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            background-color: #FF6B00;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .modal button[type="submit"]:hover {
            background-color: #E55D00;
        }
        
        .modal p {
            text-align: center;
            margin-top: 1rem;
        }
        
        .modal a {
            color: #FF6B00;
            text-decoration: none;
            font-weight: 500;
        }
        
        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            color: #777;
        }
        
        /* Alert messages */
        .alert {
            padding: 12px 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .hero {
                padding: 3rem 1rem;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
            
            .features {
                padding: 3rem 1rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <h1>Pasundan Airlines</h1>
        <ul>
            <li><a href="/">Beranda</a></li>
            <li><a href="/search">Cari Tiket</a></li>
            <li><a href="/about">Tentang</a></li>
            <li><a href="/contact">Kontak</a></li>

            @auth
                @if (Auth::user()->role === 'admin')
                    <li><a href="{{ route('admin') }}" class="btn-warning">Admin</a></li>
                @endif
                
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit">
                            Logout ({{ Auth::user()->name }})
                        </button>
                    </form>
                </li>
            @else
                <li><a href="#" onclick="openModal('loginModal')">Login</a></li>
                <li><a href="#" onclick="openModal('registerModal')">Register</a></li>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <h2>Selamat Datang di Pasundan Airlines</h2>
            <p>Temukan penerbangan terbaik dengan harga terjangkau ke seluruh Indonesia!</p>
            <a href="/search" class="cta-button">Cari Tiket Sekarang</a>
        </section>

        <!-- Features Section -->
        <section class="features">
            <h3>Kenapa Memilih Kami?</h3>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h4>Pelayanan Cepat</h4>
                    <p>Respon cepat dan pelayanan terbaik untuk setiap pelanggan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h4>Harga Terjangkau</h4>
                    <p>Tiket pesawat bersahabat tanpa mengorbankan kenyamanan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌏</div>
                    <h4>Jangkauan Luas</h4>
                    <p>Terbang ke berbagai kota besar di seluruh Indonesia.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
                <p>Belum punya akun? <a href="#" onclick="toggleModal('loginModal', false); toggleModal('registerModal', true);">Daftar</a></p>
            </form>
            <button class="close" onclick="toggleModal('loginModal', false)">×</button>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="name" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                <button type="submit">Daftar</button>
                <p>Sudah punya akun? <a href="#" onclick="toggleModal('registerModal', false); toggleModal('loginModal', true);">Login</a></p>
            </form>
            <button class="close" onclick="toggleModal('registerModal', false)">×</button>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} Pasundan Airlines. Semua Hak Dilindungi.
    </footer>

    <script>
        // buka dan tutup modal
        function toggleModal(id, show) {
            document.getElementById(id).style.display = show ? 'flex' : 'none';
        }
        
        function openModal(id) {
            document.getElementById(id).style.display = 'flex';
        }
        
        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }
        
        function switchModal(closeId, openId) {
            closeModal(closeId);
            openModal(openId);
        }
        
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>