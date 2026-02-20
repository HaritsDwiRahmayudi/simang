<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-blue-900">
                <?php echo e(__('Logbook Kegiatan')); ?>

            </h2>
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-logbook')" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md flex items-center transition transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Isi Logbook Baru
            </button>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-48">Lokasi & Koordinator</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Uraian Kegiatan</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Dokumentasi</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Paraf</th>
                                
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-blue-50 transition duration-200">
                                    <td class="px-6 py-4 align-top text-sm font-semibold text-gray-700">
                                        <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-md text-center">
                                            <?php echo e(\Carbon\Carbon::parse($log->tanggal)->format('d M')); ?>

                                            <div class="text-xs font-normal mt-1"><?php echo e(\Carbon\Carbon::parse($log->tanggal)->format('Y')); ?></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 align-top">
                                        <div class="text-sm font-bold text-gray-800"><?php echo e($log->lokasi); ?></div>
                                        <div class="text-xs text-gray-500 mt-1 flex items-center">
                                            <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            <?php echo e($log->nama_koordinator); ?>

                                        </div>
                                    </td>
                                    <td class="px-6 py-4 align-top text-sm text-gray-600 whitespace-pre-line leading-relaxed">
                                        <?php echo e($log->kegiatan); ?>

                                    </td>
                                    <td class="px-6 py-4 align-top text-center">
                                        <?php if($log->foto_kegiatan): ?>
                                            <a href="<?php echo e(asset('arsip/' . $log->foto_kegiatan)); ?>" target="_blank" class="inline-block relative group">
                                                <img src="<?php echo e(asset('arsip/' . $log->foto_kegiatan)); ?>" class="h-12 w-12 rounded-lg object-cover border border-gray-300 shadow-sm transition transform group-hover:scale-150 group-hover:z-50 group-hover:border-white group-hover:shadow-2xl">
                                            </a>
                                        <?php else: ?>
                                            <span class="text-gray-300 text-xs italic">Tidak ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 align-top text-center">
                                        <?php if($log->ttd_koordinator): ?>
                                            <img src="<?php echo e(asset('arsip/' . $log->ttd_koordinator)); ?>" class="h-12 w-auto mx-auto border border-gray-200 rounded p-1 bg-white">
                                        <?php else: ?>
                                            <span class="text-gray-300 text-xs italic">Belum TTD</span>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td class="px-6 py-4 align-top text-center">
                                        <div class="flex flex-col items-center space-y-2">
                                            <a href="<?php echo e(route('logbook.edit', $log->id)); ?>" class="w-full text-center bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-bold py-1.5 px-3 rounded shadow-sm transition">
                                                Edit
                                            </a>
                                            <form action="<?php echo e(route('logbook.destroy', $log->id)); ?>" method="POST" class="w-full" onsubmit="return confirm('Yakin mau hapus data logbook ini? Foto dan Paraf juga akan terhapus lho!')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-1.5 px-3 rounded shadow-sm transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    
                                    <td colspan="6" class="px-6 py-16 text-center text-gray-500 italic">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                            <p>Belum ada catatan kegiatan. Yuk, isi sekarang!</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'add-logbook','focusable' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'add-logbook','focusable' => true]); ?>
        <div class="p-8">
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <h2 class="text-2xl font-bold text-blue-900">Tambah Kegiatan</h2>
                <button x-on:click="$dispatch('close')" class="text-gray-400 hover:text-gray-600">✕</button>
            </div>
            
            <form id="logbookForm" action="<?php echo e(route('logbook.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-5">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="tanggal" value="<?php echo e(date('Y-m-d')); ?>" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Lokasi Unit</label>
                        <input type="text" name="lokasi" placeholder="Contoh: Gedung IT" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Koordinator / Pembimbing</label>
                    <input type="text" name="nama_koordinator" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Uraian Kegiatan</label>
                    <textarea name="kegiatan" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Jelaskan detail pekerjaan yang dilakukan hari ini..." required></textarea>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="foto_kegiatan" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer">
                </div>

                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Paraf Koordinator (Wajib Diisi)</label>
                    
                    
                    <div class="border-2 border-gray-400 border-dashed rounded-lg bg-white relative h-48 w-full touch-none">
                        <canvas id="signature-pad" class="w-full h-full block rounded-lg cursor-crosshair"></canvas>
                        
                        
                        <div id="signature-placeholder" class="absolute inset-0 flex items-center justify-center pointer-events-none text-gray-300 text-sm">
                            Tanda tangan disini
                        </div>

                        
                        <button type="button" id="clear-signature" class="absolute top-2 right-2 bg-red-100 text-red-600 hover:bg-red-200 px-3 py-1 rounded text-xs font-bold border border-red-300 shadow-sm z-10">
                            Hapus
                        </button>
                    </div>
                    
                    <p class="text-xs text-gray-500 mt-2">*Jika tidak bisa dicoret, klik tombol <b>"Hapus"</b> sekali untuk mereset area.</p>
                    <input type="hidden" name="ttd_koordinator" id="ttd_input">
                </div>
                
                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" x-on:click="$dispatch('close')" class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition">Batal</button>
                    <button type="submit" id="save-logbook" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">Simpan Kegiatan</button>
                </div>
            </form>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>

    
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var canvas = document.getElementById('signature-pad');
            var placeholder = document.getElementById('signature-placeholder');
            
            // Inisialisasi Signature Pad
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgba(255, 255, 255, 0)',
                penColor: 'rgb(0, 0, 0)',
                velocityFilterWeight: 0.7
            });

            function resizeCanvas() {
                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                var containerWidth = canvas.parentElement.offsetWidth;
                var containerHeight = canvas.parentElement.offsetHeight;

                canvas.width = containerWidth * ratio;
                canvas.height = containerHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
                signaturePad.clear(); 
            }

            window.addEventListener('open-modal', event => {
                if (event.detail == 'add-logbook') {
                    setTimeout(function() {
                        resizeCanvas();
                    }, 200); 
                }
            });

            signaturePad.addEventListener("beginStroke", () => {
                placeholder.style.display = "none";
            });

            document.getElementById('clear-signature').addEventListener('click', function () {
                signaturePad.clear();
                placeholder.style.display = "flex";
            });

            document.getElementById('save-logbook').addEventListener('click', function (e) {
                e.preventDefault(); 
                
                if (signaturePad.isEmpty()) {
                    document.getElementById('ttd_input').value = ""; 
                } else {
                    var dataURL = signaturePad.toDataURL('image/png');
                    document.getElementById('ttd_input').value = dataURL;
                }

                document.getElementById('logbookForm').submit();
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/vol3_6/infinityfree.com/if0_40994811/htdocs/resources/views/logbook/index.blade.php ENDPATH**/ ?>