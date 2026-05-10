<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Laporan | Sultan Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            color: white; 
            font-family: 'Poppins', sans-serif; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .input-card {
            background: rgba(20, 20, 20, 0.9);
            border: 2px solid #d4af37;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.3);
            text-align: center;
        }

        h2 { 
            color: #f9e272; 
            text-transform: uppercase; 
            letter-spacing: 3px; 
            margin-bottom: 30px;
            font-size: 22px;
            text-shadow: 0 0 10px rgba(249, 226, 114, 0.3);
        }

        .form-group { text-align: left; margin-bottom: 25px; }

        label { 
            display: block; 
            color: #f9e272; 
            font-weight: bold; 
            margin-bottom: 10px; 
            font-size: 14px;
        }

        select, textarea {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.5);
            border-radius: 8px;
            color: white;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
            box-sizing: border-box;
        }

        select:focus, textarea:focus { border-color: #f9e272; box-shadow: 0 0 10px rgba(249, 226, 114, 0.2); }

        option { background: #1a1a1a; color: white; }

        .btn-submit {
            width: 100%;
            background: linear-gradient(to right, #d4af37, #f9e272);
            color: black;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .btn-submit:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.5); 
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #aaa;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }
        .back-link:hover { color: #f9e272; }
    </style>
</head>
<body>

<div class="input-card">
    <h2><i class="fas fa-edit"></i> Input Laporan Sales</h2>
    
    <form action="/store-report" method="POST">
        @csrf
        <div class="form-group">
            <label>Pilih Lokasi Toko:</label>
            <select name="store_id">
                <option value="1">Sukses / Bengkong</option>
                <option value="2">Niaga Jaya / Nagoya</option>
                <option value="3">Asun / Tiban Center</option>
            </select>
        </div>

        <div class="form-group">
            <label>Aktivitas Laporan:</label>
            <!-- Tambahkan enctype agar bisa upload file -->
<form action="/store-report" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- ... bagian toko ... -->
    
    <div class="form-group">
        <label>Unggah Bukti Foto (Sultan Premium):</label>
        <input type="file" name="image_report" style="color: #f9e272;">
    </div>

    <button type="submit" class="btn-submit">KIRIM LAPORAN SULTAN</button>
</form>
            <textarea name="report_text" rows="5" placeholder="Contoh: Stok Dancow di Tiban Indah aman, display sudah rapi..."></textarea>
        </div>

        <button type="submit" class="btn-submit">KIRIM LAPORAN SULTAN</button>
    </form>

    <a href="/" class="back-link">← Kembali ke Dashboard</a>
</div>

</body>
</html>