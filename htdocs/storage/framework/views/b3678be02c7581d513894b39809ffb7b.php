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
        <h2 class="font-bold text-2xl text-blue-900 leading-tight">
            <?php echo e(__('Monitoring Mahasiswa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-100">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-xl text-gray-800">Daftar Mahasiswa Magang Aktif</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">Total: <?php echo e(count($mahasiswas)); ?></span>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-xl transition duration-300 p-6 relative overflow-hidden group">
                                <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg shadow-sm">Aktif</div>
                                
                                <div class="flex items-center space-x-4 mb-4">
                                    <div class="h-14 w-14 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-bold text-2xl shadow-md">
                                        <?php echo e(substr($m->user->name, 0, 1)); ?>

                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg group-hover:text-blue-600 transition"><?php echo e(Str::limit($m->user->name, 18)); ?></h4>
                                        <p class="text-xs text-gray-500 font-mono"><?php echo e($m->nim); ?></p>
                                    </div>
                                </div>
                                
                                <div class="text-sm text-gray-600 space-y-2 mb-6 border-t border-b border-gray-100 py-3">
                                    <p class="flex items-center"><span class="w-5 h-5 mr-2 text-blue-400">🏫</span> <?php echo e(Str::limit($m->universitas, 25)); ?></p>
                                    <p class="flex items-center"><span class="w-5 h-5 mr-2 text-blue-400">📚</span> <?php echo e(Str::limit($m->jurusan, 25)); ?></p>
                                </div>

                                <a href="<?php echo e(route('admin.monitoring.detail', $m->id)); ?>" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg shadow transition transform hover:-translate-y-0.5">
                                    Lihat Aktivitas
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-3 text-center py-16">
                                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <p class="text-gray-500 text-lg">Belum ada mahasiswa aktif saat ini.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
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
<?php endif; ?><?php /**PATH /home/vol3_6/infinityfree.com/if0_40994811/htdocs/resources/views/admin/monitoring.blade.php ENDPATH**/ ?>