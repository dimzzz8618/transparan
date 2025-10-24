<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket - Pasundan Airlines</title>
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
        
        .booking-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .booking-header {
            background: linear-gradient(135deg, #FF8C00, #FF6B00);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .booking-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        
        .booking-header p {
            opacity: 0.9;
            font-size: 1rem;
        }
        
        .flight-info {
            background: #f8f9fa;
            padding: 1rem 2rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .flight-code {
            font-size: 1.2rem;
            font-weight: 700;
            color: #FF6B00;
            text-align: center;
        }
        
        .booking-form {
            padding: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #555;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #FF6B00;
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }
        
        .passenger-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8f9fa;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
        }
        
        .passenger-buttons {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .passenger-btn {
            background: #FF6B00;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .passenger-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        
        .passenger-count {
            font-weight: 600;
            min-width: 30px;
            text-align: center;
            font-size: 1.1rem;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #FF8C00, #FF6B00);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 0, 0.3);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .form-row {
            display: flex;
            gap: 1rem;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .info-text {
            background: #e6f7ff;
            border: 1px solid #91d5ff;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: #0050b3;
        }
        
        @media (max-width: 768px) {
            .booking-container {
                max-width: 100%;
            }
            
            .booking-header {
                padding: 1.5rem;
            }
            
            .booking-header h1 {
                font-size: 1.7rem;
            }
            
            .booking-form {
                padding: 1.5rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .flight-info {
                padding: 1rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <div class="booking-header">
            <h1>Form Pemesanan Tiket</h1>
            <p>Lengkapi data diri untuk melanjutkan pemesanan</p>
        </div>
        
        <div class="flight-info">
            <div class="flight-code">Penerbangan: {{ request('flight') }}</div>
        </div>
        
        <form class="booking-form" method="POST" action="/booking">
            @csrf
            <input type="hidden" name="flight_code" value="{{ request('flight') }}">
            
            <div class="info-text">
                📝 Pastikan data yang diisi sesuai dengan dokumen identitas yang berlaku
            </div>
            
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="08xxxxxxxxxx" required>
                </div>
            </div>
            
            <div class="form-group">
                <label>Jumlah Penumpang</label>
                <div class="passenger-controls">
                    <span>Total Penumpang</span>
                    <div class="passenger-buttons">
                        <button type="button" class="passenger-btn" id="decrease-passenger">-</button>
                        <span class="passenger-count" id="passenger-count">1</span>
                        <button type="button" class="passenger-btn" id="increase-passenger">+</button>
                    </div>
                </div>
                <input type="hidden" id="passengers" name="passengers" value="1">
                <small style="color: #666; display: block; margin-top: 0.5rem;">Maksimal 5 penumpang per pemesanan</small>
            </div>
            
            <div class="form-group">
                <label for="notes">Catatan Khusus (Opsional)</label>
                <textarea id="notes" name="notes" class="form-control" placeholder="Contoh: Kursi dekat jendela, makanan vegetarian, dll." rows="3"></textarea>
            </div>
            
            <button type="submit" class="btn-submit">
                ✈️ Pesan Tiket Sekarang
            </button>
        </form>
    </div>

    <script>
        // Kontrol jumlah penumpang
        const passengerCount = document.getElementById('passenger-count');
        const passengerInput = document.getElementById('passengers');
        const decreaseBtn = document.getElementById('decrease-passenger');
        const increaseBtn = document.getElementById('increase-passenger');
        
        let passengers = 1;
        
        decreaseBtn.addEventListener('click', () => {
            if (passengers > 1) {
                passengers--;
                updatePassengerCount();
            }
        });
        
        increaseBtn.addEventListener('click', () => {
            if (passengers < 5) {
                passengers++;
                updatePassengerCount();
            }
        });
        
        function updatePassengerCount() {
            passengerCount.textContent = passengers;
            passengerInput.value = passengers;
            decreaseBtn.disabled = passengers === 1;
            increaseBtn.disabled = passengers === 5;
        }
        
        // Validasi form sebelum submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            
            if (!name || !email || !phone) {
                e.preventDefault();
                alert('Harap lengkapi semua data yang wajib diisi!');
                return;
            }
            
            // Validasi email sederhana
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Format email tidak valid!');
                return;
            }
            
            // Validasi nomor telepon
            const phoneRegex = /^[0-9]{10,13}$/;
            if (!phoneRegex.test(phone.replace(/\D/g, ''))) {
                e.preventDefault();
                alert('Format nomor telepon tidak valid! Harus 10-13 digit angka.');
                return;
            }
            
            // Ko`nfirmasi pemesanan
            if (!confirm(`Konfirmasi pemesanan untuk ${passengers} penumpang?\nData akan diproses dan tidak dapat diubah.`)) {
                e.preventDefault();
            }
        });
        
        // Auto format nomor telepon
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.startsWith('0')) {
                value = value.substring(1);
            }
            e.target.value = value ? '0' + value : '';
        });
    </script>
</body>
</html>