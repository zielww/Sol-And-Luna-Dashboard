<!-- Main modal -->
<div x-cloak
     x-show="isOpen"
     @click.away="isOpen = false"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     tabindex="-1"
     class="overflow-y-auto overflow-x-hidden fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.away="isOpen = false"
         x-show="isOpen"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add new address
                </h3>
                <button @click="isOpen=false" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span  class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="/addresses" class="p-4 md:p-5">
                <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="street_address" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Street Address<span class="text-red-500">*</span></label>
                        <input type="text" name="street_address" id="street_address"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="" required="">
                    </div>
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">City<span class="text-red-500">*</span></label>
                        <input type="text" name="city" id="city"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="" required="">
                    </div>
                    <div>
                        <label for="zip_code" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Zip Code<span class="text-red-500">*</span></label>
                        <input type="number" name="zip_code" id="zip_code"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">State / Province<span class="text-red-500">*</span></label>
                        <input type="text" name="province" id="province"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country<span
                                    class="text-red-500">*</span></label>
                        <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900
                        text-sm
                        rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Country</option>
                            <option value="Philippines">Philippines</option>
                            <option disabled>Unfortunately, we only cater to Philippines residents</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="primary" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Is Default<span
                                    class="text-red-500">*</span></label>
                        <select id="primary" name="primary" class="bg-gray-50 border border-gray-300 text-gray-900
                        text-sm
                        rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php if ($default_address ?? false) : ?>
                                <option value="1" disabled>Default Address</option>
                                <option value="0" selected>Not Default Address</option>
                            <?php else : ?>
                                <option value="1" selected>Default Address</option>
                                <option value="0">Not Default Address</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <button type="submit"
                        class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Add new address
                </button>
            </form>
        </div>
    </div>
</div>