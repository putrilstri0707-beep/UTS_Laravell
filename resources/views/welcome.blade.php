<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batam-SPG MOTORIS | PT. ARINA MULTIKARYA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* --- STYLING DASHBOARD (SULTAN GOLD) --- */
        body { 
            background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)), url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
            background-size: cover; background-position: center; background-attachment: fixed;
            color: white; font-family: 'Segoe UI', sans-serif; margin: 0; padding: 50px 20px;
        }

        .dashboard-container {
            max-width: 1200px; margin: auto;
            background: rgba(10, 10, 10, 0.9);
            border: 2px solid #d4af37; border-radius: 12px;
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.2);
        }

        .header-banner {
            padding: 20px 30px; display: flex; justify-content: space-between; align-items: center;
            border-bottom: 2px solid #d4af37;
        }

        .logo-title { color: #f9e272; font-size: 24px; font-weight: bold; letter-spacing: 1px; }

        .btn-tambah {
            background: #d4af37; color: black; padding: 10px 20px; text-decoration: none;
            border-radius: 6px; font-weight: bold; font-size: 14px; transition: 0.3s;
        }
        .btn-tambah:hover { background: #f9e272; transform: translateY(-2px); }

        table { width: 100%; border-collapse: collapse; }
        thead th { background: rgba(212, 175, 55, 0.1); color: #f9e272; padding: 15px; text-align: left; }
        tbody td { padding: 15px; border-bottom: 1px solid rgba(212, 175, 55, 0.1); }

        /* Tombol 'Lihat Foto' Emas */
        .btn-action {
            background: rgba(212, 175, 55, 0.1);
            color: #f9e272; padding: 6px 12px;
            border: 1px solid #d4af37; border-radius: 4px;
            font-size: 11px; font-weight: bold; cursor: pointer; transition: 0.3s;
        }
        .btn-action:hover { background: #d4af37; color: black; }

        /* =========================================================
           --- TAMPILAN PREVIEW "THE DARK GALLERY" (SULTAN LEVEL) ---
           ========================================================= */
        
        .gallery-overlay {
            display: none; /* Sembunyikan dulu */
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.95); /* Gelap total & pekat */
            z-index: 9999;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        /* Trigger ketika modal dibuka via JS */
        .gallery-overlay.active {
            display: flex;
            opacity: 1;
        }

        .photo-container {
            position: relative;
            max-width: 85%;
            max-height: 85%;
            border: 3px solid #d4af37; /* Bingkai Emas */
            border-radius: 8px;
            box-shadow: 0 0 50px rgba(212, 175, 55, 0.5); /* Efek Cahaya Emas Menyala */
            transform: scale(0.7);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Animasi membal mewah */
            background: #000;
            padding: 5px;
        }

        .gallery-overlay.active .photo-container {
            transform: scale(1);
        }

        .photo-container img {
            display: block;
            max-width: 100%;
            max-height: 80vh; /* Agar pas di layar tinggi */
            border-radius: 4px;
        }

        /* Label Info & Tombol Close (Minimalis Emas) */
        .photo-info {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            color: #f9e272;
            text-align: center;
            width: 100%;
            font-weight: bold;
        }

        .close-gallery {
            background: transparent;
            color: #f9e272;
            border: 1px solid #d4af37;
            padding: 6px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 12px;
            font-weight: bold;
        }
        .close-gallery:hover { background: #d4af37; color: black; }

        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <div class="header-banner">
            <div class="logo-title">
                <i class="fas fa-microchip"></i> BATAM-SPG MOTORIS | PT. ARINA MULTIKARYA
            </div>
            <a href="/input" class="btn-tambah">+ TAMBAH LAPORAN BARU</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Toko Lokasi</th>
                    <th>Laporan Aktivitas</th>
                    <th>Status</th>
                    <th>Bukti Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td style="color: #aaa;">{{ $report->timestamp }}</td>
                    <td style="font-weight: bold;">
                        @if($report->store_id == 1) Sukses / Bengkong
                        @elseif($report->store_id == 2) Niaga Jaya / Nagoya
                        @elseif($report->store_id == 3) Asun / Tiban Center
                        @else Toko Baru @endif
                    </td>
                    <td>"{{ $report->report_text }}"</td>
                    <td style="color: #f9e272; font-weight: bold;"><i class="fas fa-certificate"></i> TERVERIFIKASI</td>
                    <td>
                        @if($report->image_path)
                            {{-- UBAH INI: Trigger fungsi JS baru --}}
                            <button class="btn-action" onclick="openSultanPreview('{{ asset($report->image_path) }}', '{{ $report->timestamp }}')">
                                <i class="fas fa-eye"></i> LIHAT FOTO
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- --- HTML UNTUK TAMPILAN PREVIEW "THE DARK GALLERY" --- --}}
    <div class="gallery-overlay" id="sultanGallery" onclick="closeSultanPreview(event)">
        <div class="photo-container">
            <img src="" id="sultanImage" alt="Bukti Foto Premium">
            <div class="photo-info">
                ARSIP DIGITAL: <span id="sultanTimestamp"></span>
                <br>
                <button class="close-gallery"><i class="fas fa-times"></i> TUTUP PREVIEW</button>
            </div>
        </div>
    </div>

    <div class="footer">
        PT. ARINA MULTIKARYA | SPG DANCOW , BATAM<br>
        TEAM LEADER : PUTRI LESTARI
    </div>

    {{-- --- JAVASCRIPT UNTUK MENGATUR PREVIEW --- --}}
    <script>
        function openSultanPreview(imageSrc, timestamp) {
            const overlay = document.getElementById('sultanGallery');
            const img = document.getElementById('sultanImage');
            const time = document.getElementById('sultanTimestamp');

            img.src = imageSrc;
            time.innerText = timestamp;
            overlay.classList.add('active');
            
            // Matikan scroll body agar fokus
            document.body.style.overflow = 'hidden';
        }

        function closeSultanPreview(event) {
            const overlay = document.getElementById('sultanGallery');
            const isClickInside = event.target.closest('.photo-container');
            const isCloseBtn = event.target.closest('.close-gallery');

            // Tutup jika klik di luar foto atau klik tombol close
            if (!isClickInside || isCloseBtn) {
                overlay.classList.remove('active');
                
                // Kembalikan scroll body setelah animasi selesai
                setTimeout(() => {
                    document.body.style.overflow = 'auto';
                }, 500);
            }
        }
    </script>

</body>
</html>