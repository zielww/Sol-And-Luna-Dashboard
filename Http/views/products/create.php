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
                    Create New Product
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        @click="isOpen = false">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form
                    method="POST" action="/products" enctype="multipart/form-data" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name<span
                                    class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="" required>
                    </div>
                    <div x-data="{ amount:'' }" class="col-span-2 sm:col-span-1">
                        <label for="price"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price<span
                                    class="text-red-500">*</span></label>
                        <input x-mask:dynamic="$money($input)"
                               x-model="amount"
                               type="text"
                               name="price"
                               id="price"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="" required>
                    </div>
                    <div x-data="{ amount:'' }" class="col-span-2 sm:col-span-1">
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Quantity<span class="text-red-500">*</span></label>
                        <input x-mask:dynamic="$money($input)"
                               x-model="amount"
                               type="text" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="" required>
                    </div>
                    <div class="col-span-2">
                        <label for="select-tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories<span
                                    class="text-red-500">*</span></label>
                        <select id="select-tags" multiple>
                            <optgroup label="Men" >
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= ucfirst($category['name']) ?>" data-date="1997"><?= ucfirst($category['name']) ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <label>
                            <input type="hidden" name="category" id="category">
                        </label>
                    </div>
                    <div class="col-span-2">
                        <label for="visibility" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Visibility<span class="text-red-500">*</span></label>
                        <select id="visibility" name="visibility" class="bg-gray-50 border border-gray-300
                        text-gray-900 text-sm
                        rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Visibility</option>
                            <option value="true">Visible</option>
                            <option value="false">Invisible</option>
                        </select>
                    </div>
                    <div class="col-span-2 mb-20">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                            Description<span class="text-red-500">*</span></label>
                        <div id="editor"></div>
                        <textarea id="description" name="description" rows="4" class="hidden"
                                  placeholder="Write product description here"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="images"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Images<span
                                    class="text-red-500">*</span></label>
                        <input type="file" id="images" name="images[]" accept="image/*" multiple class="block w-full
                        text-sm
                        text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">You can upload up to 4 images.</p>
                    </div>
                </div>
                <button type="submit"
                        class="w-full text-white inline-flex items-center justify-center bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Add new product
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('images').addEventListener('change', function () {
        const files = this.files;
        if (files.length > 4) {
            alert('You can only upload a maximum of 4 images.');
            this.value = '';
        }
    });
</script>
<script src="/public/scripts/multiSelect.js"></script>
<script src="/public/scripts/wysiwyg.js"></script>
