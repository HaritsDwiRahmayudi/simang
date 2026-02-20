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
        <h2 class="font-bold text-2xl text-blue-900">
            <?php echo e(__('Edit Logbook Kegiatan')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 p-8">
                
                <form action="<?php echo e(route('logbook.update', $logbook->id)); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Tanggal</label>
                            <input type="date" name="tanggal" value="<?php echo e($logbook->tanggal); ?>" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Lokasi Unit</label>
                            <input type="text" name="lokasi" value="<?php echo e($logbook->lokasi); ?>" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500" required>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Koordinator</label>
                        <input type="text" name="nama_koordinator" value="<?php echo e($logbook->nama_koordinator); ?>" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Uraian Kegiatan</label>
                        <textarea name="kegiatan" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500" required><?php echo e($logbook->kegiatan); ?></textarea>
                    </div>
                    
                    <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Foto Dokumentasi (Opsional)</label>
                        <?php if($logbook->foto_kegiatan): ?>
                            <p class="text-xs text-gray-500 mb-2">Biarkan kosong jika tidak ingin mengganti foto saat ini.</p>
                            <img src="<?php echo e(asset('arsip/' . $logbook->foto_kegiatan)); ?>" class="h-16 w-16 object-cover rounded mb-3 border">
                        <?php endif; ?>
                        <input type="file" name="foto_kegiatan" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer">
                    </div>

                    <div class="mt-8 flex justify-end gap-3 pt-4 border-t">
                        <a href="<?php echo e(route('logbook.index')); ?>" class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition">Batal</a>
                        <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/vol3_6/infinityfree.com/if0_40994811/htdocs/resources/views/logbook/edit.blade.php ENDPATH**/ ?>