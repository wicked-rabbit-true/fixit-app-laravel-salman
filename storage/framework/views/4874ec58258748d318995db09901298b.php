<?php use \App\Helpers\Helpers; ?>
<?php
    $settings = Helpers::getSettings();
    $frontendAnnouncement = $settings['frontend_announcement_settings'] ?? [];
?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($frontendAnnouncement['status'] ?? 0) == 1 && !empty($frontendAnnouncement['title'])): ?>
<div class="announcement-bar">
    <h6 class="offer-text"><?php echo e($frontendAnnouncement['title'] ?? ''); ?></h6>
    <a href="<?php echo e($frontendAnnouncement['link'] ?? '#'); ?>" class="btn"><?php echo e($frontendAnnouncement['link_text'] ?? ''); ?></a>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH E:\projects\freelancer\fixit-app-salman\fixit_laravel\resources\views/frontend/layout/partials/announcement.blade.php ENDPATH**/ ?>