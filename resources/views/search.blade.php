<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Tiket - Pasundan Airlines</title>
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
        
        .search-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .search-header {
            background: linear-gradient(135deg, #FF8C00, #FF6B00);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .search-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        
        .search-header p {
            opacity: 0.9;
            font-size: 1rem;
        }
        
        .search-form {
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
            background-color: white;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #FF6B00;
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }
        
        .btn-search {
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
        
        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 0, 0.3);
        }
        
        .popular-routes {
            margin-top: 2rem;
            text-align: center;
        }
        
        .popular-routes h3 {
            color: white;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .route-tags {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        
        .route-tag {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .route-tag:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        
        .form-row {
            display: flex;
            gap: 1rem;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .passenger-select {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8f9fa;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
        }
        
        .passenger-controls {
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
        }
        
        .swap-button {
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin: 0.5rem auto;
            transition: all 0.3s ease;
        }
        
        .swap-button:hover {
            background: #FF6B00;
            color: white;
            border-color: #FF6B00;
        }
        
        @media (max-width: 768px) {
            .search-container {
                max-width: 100%;
            }
            
            .search-header {
                padding: 1.5rem;
            }
            
            .search-header h1 {
                font-size: 1.7rem;
            }
            
            .search-form {
                padding: 1.5rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="search-container">
        <div class="search-header">
            <h1>Cari Tiket Pesawat</h1>
            <p>Temukan penerbangan terbaik dengan harga terjangkau</p>
        </div>
        
        <form class="search-form" action="/results" method="GET">
            <div class="form-group">
                <label for="from">Kota Asal</label>
                <select id="from" name="from" class="form-control" required>
                    <option value="">Pilih Kota Asal</option>
                    <option value="Bandung">Bandung (BDO)</option>
                    <option value="Jakarta">Jakarta (CGK)</option>
                    <option value="Surabaya">Surabaya (SUB)</option>
                    <option value="Medan">Medan (KNO)</option>
                    <option value="Bali">Bali (DPS)</option>
                    <option value="Yogyakarta">Yogyakarta (YIA)</option>
                    <option value="Makassar">Makassar (UPG)</option>
                    <option value="Balikpapan">Balikpapan (BPN)</option>
                    <option value="Manado">Manado (MDC)</option>
                    <option value="Padang">Padang (PDG)</option>
                </select>
            </div>
            
            <div class="swap-button" onclick="swapCities()">
                ⇅
            </div>
            
            <div class="form-group">
                <label for="to">Kota Tujuan</label>
                <select id="to" name="to" class="form-control" required>
                    <option value="">Pilih Kota Tujuan</option>
                    <option value="Bandung">Bandung (BDO)</option>
                    <option value="Jakarta">Jakarta (CGK)</option>
                    <option value="Surabaya">Surabaya (SUB)</option>
                    <option value="Medan">Medan (KNO)</option>
                    <option value="Bali">Bali (DPS)</option>
                    <option value="Yogyakarta">Yogyakarta (YIA)</option>
                    <option value="Makassar">Makassar (UPG)</option>
                    <option value="Balikpapan">Balikpapan (BPN)</option>
                    <option value="Manado">Manado (MDC)</option>
                    <option value="Padang">Padang (PDG)</option>
                </select>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="departure">Tanggal Keberangkatan</label>
                    <input type="date" id="departure" name="date" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="return">Tanggal Pulang (Opsional)</label>
                    <input type="date" id="return" name="return_date" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label>Jumlah Penumpang</label>
                <div class="passenger-select">
                    <span>Penumpang</span>
                    <div class="passenger-controls">
                        <button type="button" class="passenger-btn" id="decrease-passenger">-</button>
                        <span class="passenger-count" id="passenger-count">1</span>
                        <button type="button" class="passenger-btn" id="increase-passenger">+</button>
                    </div>
                </div>
                <input type="hidden" id="passengers" name="passengers" value="1">
            </div>
            
            <button type="submit" class="btn-search">
                🔍 Cari Tiket
            </button>
        </form>
    </div>
    
    <div class="popular-routes">
        <h3>Rute Populer</h3>
        <div class="route-tags">
            <div class="route-tag" onclick="fillRoute('Bandung', 'Jakarta')">Bandung → Jakarta</div>
            <div class="route-tag" onclick="fillRoute('Jakarta', 'Surabaya')">Jakarta → Surabaya</div>
            <div class="route-tag" onclick="fillRoute('Medan', 'Jakarta')">Medan → Jakarta</div>
            <div class="route-tag" onclick="fillRoute('Bali', 'Jakarta')">Bali → Jakarta</div>
            <div class="route-tag" onclick="fillRoute('Jakarta', 'Yogyakarta')">Jakarta → Yogyakarta</div>
        </div>
    </div>

    <script>
        // Data bandara Indonesia
        const airports = {
            'Bandung': 'BDO',
            'Jakarta': 'CGK', 
            'Surabaya': 'SUB',
            'Medan': 'KNO',
            'Bali': 'DPS',
            'Yogyakarta': 'YIA',
            'Makassar': 'UPG',
            'Balikpapan': 'BPN',
            'Manado': 'MDC',
            'Padang': 'PDG'
        };

        // Fungsi untuk mengisi rute otomatis
        function fillRoute(from, to) {
            document.getElementById('from').value = from;
            document.getElementById('to').value = to;
            
            // Set tanggal minimal ke hari ini
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('departure').min = today;
        }
        
        // Fungsi untuk menukar kota asal dan tujuan
        function swapCities() {
            const fromSelect = document.getElementById('from');
            const toSelect = document.getElementById('to');
            
            const tempValue = fromSelect.value;
            const tempText = fromSelect.options[fromSelect.selectedIndex].text;
            
            fromSelect.value = toSelect.value;
            toSelect.value = tempValue;
            
            // Update teks option jika perlu
            if (fromSelect.value !== tempValue) {
                fromSelect.options[fromSelect.selectedIndex].text = toSelect.options[toSelect.selectedIndex].text;
                toSelect.options[toSelect.selectedIndex].text = tempText;
            }
        }
        
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
            if (passengers < 9) {
                passengers++;
                updatePassengerCount();
            }
        });
        
        function updatePassengerCount() {
            passengerCount.textContent = passengers;
            passengerInput.value = passengers;
            decreaseBtn.disabled = passengers === 1;
            increaseBtn.disabled = passengers === 9;
        }
        
        // Validasi: kota asal dan tujuan tidak boleh sama
        document.getElementById('from').addEventListener('change', validateCities);
        document.getElementById('to').addEventListener('change', validateCities);
        
        function validateCities() {
            const from = document.getElementById('from').value;
            const to = document.getElementById('to').value;
            
            if (from && to && from === to) {
                alert('Kota asal dan tujuan tidak boleh sama!');
                document.getElementById('to').value = '';
            }
        }
        
        // Set tanggal minimal ke hari ini
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('departure').min = today;
            document.getElementById('return').min = today;
            
            // Set tanggal default untuk besok
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            document.getElementById('departure').value = tomorrow.toISOString().split('T')[0];
        });
    </script>
</body>
</html>