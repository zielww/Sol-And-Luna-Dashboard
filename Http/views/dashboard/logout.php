<form x-data="{ isOpen: false}" action="/logout" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <button @click="isOpen = true" type="button"
            class="text-gray-900 flex items-center bg-white border
                        border-gray-300
                        focus:outline-none
                         hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2
                         .5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700
                         dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg fill="#000000" width="23" height="23" viewBox="0 0 24 24" id="sign-out-left-2"
             data-name="Flat Line" xmlns="http://www.w3.org/2000/svg"
             class="icon flat-line mr-2">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <polyline id="primary" points="6 15 3 12 6 9"
                          style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width:1.032;"></polyline>
                <line id="primary-2" data-name="primary" x1="3" y1="12" x2="17" y2="12"
                      style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width:1.032;"></line>
                <path id="primary-3" data-name="primary"
                      d="M10,8V5a1,1,0,0,1,1-1h9a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H11a1,1,0,0,1-1-1V16"
                      style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width:1.032;"></path>
            </g>
        </svg>
        Sign Out
    </button>
    <div x-cloak
         x-show="isOpen"
         @click.away="isOpen = false"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="overflow-y-auto overflow-x-hidden fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50">

        <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative inline-block align-middle w-full max-w-md p-6 my-8 text-left bg-white dark:bg-gray-800 rounded-2xl shadow-xl transform transition-all">

            <!-- Close button -->
            <button @click="isOpen = false"
                    type="button"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 rounded-lg transition-colors duration-200"
                    aria-label="Close dialog">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="text-center">
                <!-- Warning Icon -->
                <div class="mx-auto flex items-center justify-center w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/20">
                    <svg class="h-6 w-6 text-red-600 dark:text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <!-- Content -->
                <h3 id="modal-title" class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">
                    Sign out confirmation
                </h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Are you sure you want to sign out? You'll need to sign in again to access your account.
                </p>

                <!-- Buttons -->
                <div class="mt-6 flex flex-col sm:flex-row-reverse gap-3 sm:gap-2">
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800 transition-colors duration-200">
                        Sign out
                    </button>
                    <button @click="isOpen = false"
                            type="button"
                            class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800 transition-colors duration-200">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
