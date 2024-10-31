<?php

use Core\Session;

$messages = Session::get_flashed(['errors', 'success']);

?>
<div x-data="{
        isSuccessful: <?= isset($messages['success']) ? 'true' : 'false' ?>,
        init() {
            if (this.isSuccessful) {
                setTimeout(() => {
                    this.isSuccessful = false;
                }, 3000); // 3 seconds
            }
        }
    }"
     x-cloak
     x-show="isSuccessful"
     x-transition:enter="transition ease-out duration-300 transform"
     x-transition:enter-start="-translate-y-full opacity-0"
     x-transition:enter-end="-translate-y-0 opacity-100"
     x-transition:leave="transition ease-in duration-200 transform"
     x-transition:leave-start="-translate-y-0 opacity-100"
     x-transition:leave-end="-translate-y-full opacity-0"
     id='success'
     class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
     role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
         fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Action Successful! </span><?= $messages['success'] ?>
    </div>
</div>
<div x-data="{
        didFail: <?= isset($messages['errors']) ? 'true' : 'false' ?>,
        init() {
            if (this.didFail) {
                setTimeout(() => {
                    this.didFail = false;
                }, 3000);
            }
        }
    }"
     x-cloak
     x-show="didFail"
     x-transition:enter="transition ease-out duration-300 transform"
     x-transition:enter-start="-translate-y-full opacity-0"
     x-transition:enter-end="-translate-y-0 opacity-100"
     x-transition:leave="transition ease-in duration-200 transform"
     x-transition:leave-start="-translate-y-0 opacity-100"
     x-transition:leave-end="-translate-y-full opacity-0"
     id="error" class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800
        dark:text-red-400"
     role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
         fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Action Unsuccessful! </span>
        <?php if ($messages['errors'] ?? false) : ?>
            <?= 'Please enter a valid ' . implode(", ", $messages['errors']) ?>
        <?php endif; ?>
    </div>
</div>