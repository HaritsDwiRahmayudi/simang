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
            <?php echo e(__('Absensi Kehadiran')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            
            <div class="bg-white overflow-hidden shadow-2xl rounded-2xl p-10 text-center border border-gray-200 relative">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-400 to-blue-500"></div>
                
                <h3 class="text-gray-400 font-bold uppercase tracking-widest text-sm mb-2">Tanggal Hari Ini</h3>
                <p class="text-4xl font-extrabold text-gray-800 mb-10"><?php echo e(\Carbon\Carbon::now()->translatedFormat('l, d F Y')); ?></p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    <div class="bg-green-50 p-8 rounded-2xl border-2 border-green-100 flex flex-col justify-between h-full hover:shadow-lg transition duration-300">
                        <div>
                            <div class="text-green-600 mb-3 font-bold uppercase tracking-wider text-sm flex justify-center items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                Jam Masuk
                            </div>
                            <div class="text-4xl font-black text-gray-800 mb-6 font-mono tracking-tighter">
                                <?php echo e($presenceToday->jam_masuk ?? '--:--'); ?>

                            </div>
                        </div>
                        
                        <?php if(!$presenceToday): ?>
                            <form action="<?php echo e(route('presence.checkin')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 text-lg">
                                    ABSEN MASUK
                                </button>
                            </form>
                        <?php else: ?>
                            <button disabled class="w-full bg-gray-200 text-gray-500 font-bold py-4 rounded-xl cursor-not-allowed flex justify-center items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Sudah Absen
                            </button>
                        <?php endif; ?>
                    </div>

                    
                    <div class="bg-red-50 p-8 rounded-2xl border-2 border-red-100 flex flex-col justify-between h-full hover:shadow-lg transition duration-300">
                        <div>
                            <div class="text-red-600 mb-3 font-bold uppercase tracking-wider text-sm flex justify-center items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Jam Keluar
                            </div>
                            <div class="text-4xl font-black text-gray-800 mb-6 font-mono tracking-tighter">
                                <?php echo e($presenceToday->jam_keluar ?? '--:--'); ?>

                            </div>
                        </div>

                        <?php if($presenceToday && !$presenceToday->jam_keluar): ?>
                            <form action="<?php echo e(route('presence.checkout')); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 text-lg">
                                    ABSEN PULANG
                                </button>
                            </form>
                        <?php elseif(!$presenceToday): ?>
                            <button disabled class="w-full bg-gray-200 text-gray-400 font-bold py-4 rounded-xl cursor-not-allowed">
                                Belum Absen Masuk
                            </button>
                        <?php else: ?>
                            <button disabled class="w-full bg-gray-200 text-gray-500 font-bold py-4 rounded-xl cursor-not-allowed flex justify-center items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Selesai
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
                <div class="px-8 py-6 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-bold text-gray-800 text-lg">Riwayat Kehadiran (7 Hari Terakhir)</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-8 py-5 whitespace-nowrap text-sm font-bold text-gray-800">
                                    <?php echo e(\Carbon\Carbon::parse($h->tanggal)->translatedFormat('l, d F Y')); ?>

                                </td>
                                <td class="px-8 py-5 whitespace-nowrap text-sm text-center">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-mono font-bold"><?php echo e($h->jam_masuk); ?></span>
                                </td>
                                <td class="px-8 py-5 whitespace-nowrap text-sm text-center">
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full font-mono font-bold"><?php echo e($h->jam_keluar ?? '-'); ?></span>
                                </td>
                                <td class="px-8 py-5 whitespace-nowrap text-right text-sm">
                                    <span class="px-3 py-1 bg-blue-600 text-white rounded-lg text-xs font-bold shadow-sm uppercase"><?php echo e($h->status); ?></span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php endif; ?><?php /**PATH /home/vol3_6/infinityfree.com/if0_40994811/htdocs/resources/views/presence/index.blade.php ENDPATH**/ ?>