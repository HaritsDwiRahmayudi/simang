<!DOCTYPE html>
<html>
<head>
    <title>Laporan Monitoring Kerja Praktek</title>
    <style>
        body { font-family: sans-serif; font-size: 11px; }
        
        /* HEADER */
        .header { 
            text-align: center; 
            margin-bottom: 25px; 
            border-bottom: 2px solid #000; 
            padding-bottom: 10px;
        }
        .header h2 { 
            margin: 0; 
            font-size: 16px; 
            text-transform: uppercase; 
            font-weight: bold;
        }
        .header h3 { 
            margin: 5px 0; 
            font-size: 12px; 
            font-weight: normal; 
            text-transform: uppercase;
        }

        /* TABEL INFORMASI */
        .info-table {
            width: 100%;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .info-table td {
            padding: 3px;
            vertical-align: top;
        }
        .label {
            width: 160px;
            font-weight: bold;
        }
        .separator {
            width: 10px;
            text-align: center;
        }

        /* GAYA UNTUK SEMUA TABEL DATA (ABSEN & JURNAL) */
        .content-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 20px; 
        }
        .content-table th, .content-table td { 
            border: 1px solid #000; 
            padding: 5px; 
        }
        /* Header Tabel */
        .content-table th { 
            background-color: #f2f2f2; 
            text-align: center; 
            font-weight: bold;
            vertical-align: middle;
        }
        /* Isi Tabel Default (Rata Kiri Atas) */
        .content-table td {
            text-align: left; 
            vertical-align: top;
        }
        /* Helper Class */
        .text-center { text-align: center; }
        .align-middle { vertical-align: middle; }

        /* FOOTER */
        .footer { margin-top: 40px; width: 100%; }
        .ttd-box { 
            float: right;
            width: 250px;
            text-align: center; 
        }
    </style>
</head>
<body>

    
    <div class="header">
        <h2>MAGANG INDUSTRI PT. INDAHKIAT PULP AND PAPER Tbk PERAWANG</h2>
        <h3>MONITORING PELAKSANAAN KERJA PRAKTEK</h3>
    </div>

    
    <?php
        $sampleLog = $logbooks->first(); 
        $koordinator = $sampleLog ? $sampleLog->nama_koordinator : '-';
        $lokasiUnit  = $sampleLog ? $sampleLog->lokasi : $magang->jurusan; 
    ?>

    <table class="info-table">
        <tr>
            <td class="label">Nama Mahasiswa</td>
            <td class="separator">:</td>
            <td><?php echo e($magang->user->name); ?></td>
        </tr>
        <tr>
            <td class="label">NIM</td>
            <td class="separator">:</td>
            <td><?php echo e($magang->nim); ?></td>
        </tr>
        <tr>
            <td class="label">Lembaga Pendidikan</td>
            <td class="separator">:</td>
            <td><?php echo e($magang->universitas); ?></td>
        </tr>
        <tr>
            <td class="label">Jurusan / Prodi</td>
            <td class="separator">:</td>
            <td><?php echo e($magang->jurusan); ?></td>
        </tr>
        <tr>
            <td class="label">Tanggal Praktek</td>
            <td class="separator">:</td>
            <td><?php echo e($periode); ?></td> 
        </tr>
        <tr>
            <td class="label">Penempatan Unit</td>
            <td class="separator">:</td>
            <td><?php echo e($lokasiUnit); ?></td>
        </tr>
        <tr>
            <td class="label">Koord. Lapangan</td>
            <td class="separator">:</td>
            <td><?php echo e($koordinator); ?></td>
        </tr>
    </table>

    
    <h4>A. Rekapitulasi Kehadiran</h4>
    <table class="content-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Tanggal</th>
                <th width="20%">Jam Masuk</th>
                <th width="20%">Jam Pulang</th>
                <th width="25%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $presences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($p->tanggal)->translatedFormat('l, d F Y')); ?></td>
                    <td class="text-center"><?php echo e($p->jam_masuk); ?></td>
                    <td class="text-center"><?php echo e($p->jam_keluar ?? '-'); ?></td>
                    <td class="text-center"><?php echo e(ucfirst($p->status)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data absensi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    
    <h4>B. Jurnal Kegiatan Harian</h4>
    <table class="content-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Hari/Tanggal</th>
                <th width="15%">Jam Kerja</th>
                <th width="40%">Uraian Kegiatan</th>
                <th width="25%">Paraf Pembimbing</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $logbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $absen = $presences->where('tanggal', $log->tanggal)->first();
                    $jamMasuk = $absen ? $absen->jam_masuk : '-';
                    $jamKeluar = $absen ? ($absen->jam_keluar ?? '-') : '-';
                ?>

                <tr>
                    
                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                    
                    
                    <td><?php echo e(\Carbon\Carbon::parse($log->tanggal)->translatedFormat('l, d F Y')); ?></td>
                    
                    
                    <td class="text-center">
                        <?php echo e($jamMasuk); ?> - <?php echo e($jamKeluar); ?>

                    </td>
                    
                    
                    <td>
                        <?php echo e($log->kegiatan); ?>

                    </td>
                    
                    
                    <td style="text-align: center; vertical-align: middle;">
                        <?php if(!empty($log->ttd_koordinator)): ?>
                            <?php
                                $ttd = $log->ttd_koordinator;
                                $finalPath = null;

                                // LOGIKA PENCARIAN FILE SUPER CHECK
                                if (\Illuminate\Support\Str::startsWith($ttd, 'data:image')) {
                                    $finalPath = $ttd;
                                } elseif (file_exists(storage_path('app/public/' . $ttd))) {
                                    $finalPath = storage_path('app/public/' . $ttd);
                                } elseif (file_exists(storage_path('app/' . $ttd))) {
                                    $finalPath = storage_path('app/' . $ttd);
                                } elseif (file_exists(public_path($ttd))) {
                                    $finalPath = public_path($ttd);
                                } elseif (file_exists(public_path('storage/' . $ttd))) {
                                    $finalPath = public_path('storage/' . $ttd);
                                }
                            ?>

                            <?php if($finalPath): ?>
                                <img src="<?php echo e($finalPath); ?>" style="height: 40px; width: auto; display: inline-block;">
                            <?php else: ?>
                                <div style="color:red; font-size:8px;">File Error</div>
                            <?php endif; ?>
                        <?php else: ?>
                            
                            <div style="height: 40px;"></div>
                        <?php endif; ?>
                        
                        
                        <div style="font-size: 9px; margin-top: 5px; font-weight: bold;">
                            <?php echo e($log->nama_koordinator); ?>

                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data jurnal pada periode ini.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    
    <div class="footer">
        <div class="ttd-box">
            <p>Perawang, <?php echo e(now()->translatedFormat('d F Y')); ?></p>
            <p>Mengetahui,</p>
            <p style="font-weight: bold;">Public Relations (Humas)</p>
            <p>PT. Indah Kiat Pulp & Paper Tbk</p>
            <br><br><br><br>
            <p>( ................................................. )</p>
        </div>
    </div>

</body>
</html><?php /**PATH /home/vol3_6/infinityfree.com/if0_40994811/htdocs/resources/views/laporan/pdf_template.blade.php ENDPATH**/ ?>