<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pasundan Airlines</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #FF8C00, #FF6B00);
            color: #333;
            min-height: 100vh;
            padding: 2rem 1rem;
        }
        
        .dashboard-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, #FF8C00, #FF6B00);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .dashboard-header h1 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        
        .dashboard-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .user-avatar {
            width: 60px;
            height: 60px;
            background-color: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .dashboard-content {
            padding: 2rem;
        }
        
        .section-title {
            color: #FF6B00;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 600;
        }
        
        .bookings-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .bookings-table th {
            background-color: #FF6B00;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }
        
        .bookings-table td {
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }
        
        .bookings-table tr:last-child td {
            border-bottom: none;
        }
        
        .bookings-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .bookings-table tr:hover {
            background-color: #fff5e6;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-completed {
            background-color: #e6f7ee;
            color: #0d8b5a;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #666;
        }
        
        .empty-state p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }
        
        .btn-primary {
            background-color: #FF6B00;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background-color: #E55D00;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 0, 0.3);
        }
        
        .dashboard-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-top: 4px solid #FF6B00;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #FF6B00;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1.5rem;
            }
            
            .dashboard-header h1 {
                font-size: 1.8rem;
            }
            
            .bookings-table {
                display: block;
                overflow-x: auto;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .dashboard-actions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Halo, {{ Auth::user()->name }}! 👋</h1>
            <p>Selamat datang di dashboard Pasundan Airlines</p>
            <div class="user-info">
                <div class="user-avatar">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </div>
        </div>
        
        <div class="dashboard-content">
            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-number">{{ count($bookings) }}</div>
                    <div class="stat-label">Total Pemesanan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $bookings->where('status', 'completed')->count() }}</div>
                    <div class="stat-label">Penerbangan Selesai</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $bookings->where('status', 'upcoming')->count() }}</div>
                    <div class="stat-label">Penerbangan Mendatang</div>
                </div>
            </div>
            
            <h2 class="section-title">Riwayat Pemesanan Anda</h2>
            
            @if($bookings->count() > 0)
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>Kode Penerbangan</th>
                        <th>Nama Penumpang</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $b)
                    <tr>
                        <td><strong>{{ $b->flight_code }}</strong></td>
                        <td>{{ $b->name }}</td>
                        <td>{{ $b->created_at->format('d M Y') }}</td>
                        <td>
                            <span class="status-badge status-completed">Selesai</span>
                         </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <p>Belum ada riwayat pemesanan.</p>
                <a href="/search" class="btn-primary">Cari Tiket Sekarang</a>
            </div>
            @endif
            
            <div class="dashboard-actions">
                <a href="/search" class="btn-primary">Cari Tiket Penerbangan</a>
                <a href="/" class="btn-primary" style="background-color: #666;">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</html>