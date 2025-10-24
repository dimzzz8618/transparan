<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Pasundan Airlines</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
        }
        
        .admin-header {
            background: linear-gradient(135deg, #FF8C00, #FF6B00);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .admin-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-nav h1 {
            font-size: 1.8rem;
        }
        
        .admin-nav a {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.2);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .admin-nav a:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .admin-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .admin-card h2 {
            color: #FF6B00;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .admin-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .menu-item {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
            border: 2px solid #f0f0f0;
        }
        
        .menu-item:hover {
            transform: translateY(-5px);
            border-color: #FF6B00;
        }
        
        .menu-item a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            display: block;
            font-size: 1.1rem;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        /* Style untuk tabel */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        .data-table th,
        .data-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #333;
        }
        
        .data-table tr:hover {
            background-color: #f5f5f5;
        }
        
        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-admin {
            background-color: #FF6B00;
            color: white;
        }
        
        .badge-user {
            background-color: #6c757d;
            color: white;
        }
        
        .section-title {
            color: #FF6B00;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #FF6B00;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        .btn-edit {
            background: #FF6B00;
            color: white;
            border: none;
            padding: 0.3rem 0.6rem;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.8rem;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.3rem 0.6rem;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.8rem;
            margin-left: 0.3rem;
        }
        
        .btn-edit:hover {
            background: #E55D00;
        }
        
        .btn-delete:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <nav class="admin-nav">
            <h1>Admin Dashboard - Pasundan Airlines</h1>
            <div>
                <a href="/">Kembali ke Website</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin-left: 1rem;">
                    @csrf
                    <button type="submit" style="background: rgba(255,255,255,0.2); border: none; color: white; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <div class="admin-container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Stats Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ count($users) }}</div>
                <div class="stat-label">Total Pengguna</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $users->where('role', 'admin')->count() }}</div>
                <div class="stat-label">Admin</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $users->where('role', 'user')->count() }}</div>
                <div class="stat-label">User Biasa</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ count($flights) }}</div>
                <div class="stat-label">Penerbangan</div>
            </div>
        </div>

        <div class="admin-card">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p style="text-align: center;">Anda berhasil mengakses halaman admin. Silakan kelola sistem dari sini.</p>
            
            <div class="admin-menu">
                <div class="menu-item">
                    <a href="{{ route('flights.create') }}">✈️ Tambah Penerbangan</a>
                </div>
                <div class="menu-item">
                    <a href="#">📊 Kelola Booking</a>
                </div>
                <div class="menu-item">
                    <a href="#">📈 Laporan</a>
                </div>
                <div class="menu-item">
                    <a href="#users-section">👥 Kelola Pengguna</a>
                </div>
            </div>
        </div>

        <!-- Section Data User -->
        <div class="admin-card" id="users-section">
            <h3 class="section-title">📊 Data Pengguna</h3>
            
            @if(count($users) > 0)
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td>
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: center; color: #666; padding: 2rem;">
                    Tidak ada data pengguna.
                </p>
            @endif
        </div>

        <!-- Section Daftar Penerbangan -->
        <div class="admin-card">
            <h3 class="section-title">✈️ Daftar Penerbangan</h3>
            
            @if(count($flights) > 0)
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No. Penerbangan</th>
                            <th>Maskapai</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Waktu Keberangkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flights as $flight)
                            <tr>
                                <td>{{ $flight->flight_number }}</td>
                                <td>{{ $flight->airline }}</td>
                                <td>{{ $flight->origin }}</td>
                                <td>{{ $flight->destination }}</td>
                                <td>{{ $flight->departure_time }}</td>
                                <td>
                                    <a href="{{ route('flights.edit', $flight->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Hapus penerbangan?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: center; color: #666; padding: 2rem;">
                    Belum ada data penerbangan. 
                    <a href="{{ route('flights.create') }}" style="color: #FF6B00;">Tambah penerbangan pertama</a>
                </p>
            @endif
        </div>

        <!-- Debug Info -->
        <div class="admin-card">
            <h3 style="color: #FF6B00; margin-bottom: 1rem;">ℹ️ Info Sistem</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div>
                    <p><strong>User Login:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
                <div>
                    <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
                    <p><strong>Login Time:</strong> {{ now()->format('d M Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>