<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - Pasundan Airlines</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #ffa500, #ff6a00);
            color: white;
            text-align: center;
            padding-top: 50px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            color: #333;
            border-radius: 10px;
            padding: 20px;
        }
        .flight {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .flight:last-child { border: none; }
        button {
            background-color: orange;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background-color: darkorange; }
    </style>
</head>
<body>
    <h1>Hasil Pencarian Tiket</h1>
    <div class="container">
        <p>Menampilkan hasil untuk penerbangan dari <strong>{{ request('from') }}</strong> ke <strong>{{ request('to') }}</strong> pada <strong>{{ request('date') }}</strong></p>

        <div class="flight">
            <h3>🛫 Penerbangan P001 - Pasundan Air</h3>
            <p>Waktu: 08:00 - 09:30 | Harga: Rp 750.000</p>
            <form method="GET" action="/booking">
                <input type="hidden" name="flight" value="P001">
                <button type="submit">Pesan Sekarang</button>
            </form>
        </div>

        <div class="flight">
            <h3>🛫 Penerbangan P002 - Pasundan Air</h3>
            <p>Waktu: 12:00 - 13:30 | Harga: Rp 690.000</p>
            <form method="GET" action="/booking">
                <input type="hidden" name="flight" value="P002">
                <button type="submit">Pesan Sekarang</button>
            </form>
        </div>

        <div class="flight">
            <h3>🛫 Penerbangan P003 - Pasundan Air</h3>
            <p>Waktu: 18:00 - 19:45 | Harga: Rp 810.000</p>
            <form method="GET" action="/booking">
                <input type="hidden" name="flight" value="P003">
                <button type="submit">Pesan Sekarang</button>
            </form>
        </div>
    </div>
</body>
</html>
        