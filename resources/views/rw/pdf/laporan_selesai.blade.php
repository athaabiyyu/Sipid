<!DOCTYPE html>
<html>

<head>
     <title>Detail Laporan PDF</title>
     <style>
          body {
               font-family: 'Arial, sans-serif';
          }

          .container {
               width: 100%;
               padding: 20px;
          }

          .header {
               text-align: center;
               margin-bottom: 20px;
          }

          .row {
               margin-bottom: 10px;
          }

          .row span {
               display: inline-block;
               width: 150px;
               font-weight: bold;
          }

          .report-image {
               width: 200px;
               height: 150px;
               object-fit: cover;
               margin-bottom: 10px;
          }

          hr {
               border: 0;
               border-top: 1px solid #000;
               margin: 10px 0;
          }
     </style>

     
</head>

<body>
     <div class="container">
          <div class="header">
               <h1>Detail Laporan yang Telah Selesai</h1>
          </div>

          <div class="row">
               <span class="label">Laporan ID</span>
               <span class="value">: {{ $detailLaporan->laporan_id }}</span>
           </div>
           <div class="row">
               <span class="label">Nama Pelapor</span>
               <span class="value">: {{ $detailLaporan->user->user_nama }}</span>
           </div>
           <div class="row">
               <span class="label">Nama Infrastruktur</span>
               <span class="value">: {{ $detailLaporan->infrastruktur->infrastruktur_nama }}</span>
           </div>
           <div class="row">
               <span class="label">Tanggal Laporan</span>
               <span class="value">: {{ \Carbon\Carbon::parse($detailLaporan->tgl_laporan)->format('d-m-Y') }}</span>
           </div>
           <div class="row">
               <span>Bukti Laporan</span>
          </div>
          @foreach ($detailLaporan->buktiLaporan as $bukti)
               @if ($bukti->type != 'bukti_realisasi' && $bukti->type != 'bukti_selesai')
                    <img src="{{ public_path('storage/' . $bukti->file_path) }}" alt="Bukti Laporan" class="report-image">
               @endif
          @endforeach
           <div class="row">
               <span class="label">Deskripsi Laporan</span>
               <span class="value">: {{ $detailLaporan->deskripsi_laporan }}</span>
           </div>
           <div class="row">
               <span class="label">Lokasi Kerusakan</span>
               <span class="value">: {{ $detailLaporan->alamat_laporan }}</span>
           </div>
           <div class="row">
               <span class="label">Status Laporan:</span>
               <span class="value">: {{ $detailLaporan->status->status_nama }}</span>
           </div>
           

          <div class="row">
               <span>Bukti Selesai</span>
          </div>
          @foreach ($detailLaporan->buktiLaporan as $bukti)
               @if ($bukti->type == 'bukti_selesai')
                    <img src="{{ public_path('storage/' . $bukti->file_path) }}" alt="Bukti Selesai" class="report-image">
               @endif
          @endforeach
     </div>
</body>

</html>