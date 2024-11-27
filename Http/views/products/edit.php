<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/body.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
require base_path("Http/views/partials/main.php");
?>
<div class="p-4 h-svh w-full  rounded-lg dark:border-gray-700 mt-14">

    <?php require base_path("Http/views/partials/alerts.php") ?>

    <div class="w-full flex justify-between mb-4 items-center">
        <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl">Edit
            <span><?= htmlspecialchars($product['name'] ?? '') ?></span></h1>
        <?php require base_path("Http/views/products/delete.php") ?>
    </div>
    <form method="POST" action="/products" enctype="multipart/form-data"
          class="w-full grid gap-4 sm:grid-cols-[78%_20%] sm:mb-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value=<?= $_GET['id'] ?? 0 ?>>
        <div class="relative grid gap-4 sm:grid-cols-2 p-6 bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="mb-6">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Name <span class="text-red-500">*</span></label>
                <input type="text" id="default-input" name="name"
                       value="<?= htmlspecialchars($product['name'] ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="select-tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories<span
                            class="text-red-500">*</span></label>
                <select id="select-tags" multiple>
                    <?php foreach ($main_categories as $main_category) : ?>
                        <optgroup label="<?= htmlspecialchars(ucfirst($main_category['name'] ?? '')) ?>">
                            <?php foreach ($categories as $category) : ?>
                                <?php if ($category['parent_category_id'] == $main_category['category_id']) : ?>
                                    <?php if (in_array($category['name'], $product_categories)) : ?>
                                        <option value="<?= ucfirst($category['name']) ?>" selected><?= ucfirst($category['name']) ?></option>
                                    <?php else: ?>
                                        <option value="<?= ucfirst($category['name']) ?>"><?= ucfirst($category['name']) ?></option>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                </select>
                <label>
                    <input type="hidden" name="category" id="category">
                </label>
            </div>
            <div x-data="{ amount:'<?= htmlspecialchars($product['price'] ?? '') ?>'}" class="mb-6">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Price <span class="text-red-500">*</span></label>
                <input x-mask:dynamic="$money($input)"
                       x-model="amount"
                       type="text"
                       name="price"
                       id="default-input"
                       class="bg-gray-50 border
                border-gray-300
                text-gray-900
                text-sm
                rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div x-data="{ amount:'<?= htmlspecialchars($product['stock_quantity'] ?? '') ?>'}" class="mb-6">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Quantity <span class="text-red-500">*</span></label>
                <input x-mask:dynamic="$money($input)"
                       x-model="amount"
                       type="text"
                       name="quantity"
                       id="default-input"
                       class="bg-gray-50 border
                border-gray-300
                text-gray-900
                text-sm
                rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="col-span-2 mb-20">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span class="text-red-500">*</span></label>
                <div id="editor"><?= $product['description'] ?? '' ?></div>
                <textarea id="description" name="description" rows="4" class="hidden" placeholder="Write product description here">
                            <?= $product['description'] ?? '' ?>
                </textarea>
            </div>
        </div>


        <div class="relative md:h-1/2 overflow-auto md:w-full bg-white rounded-lg shadow dark:bg-gray-700">
            <!--  header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Visibility
                </h3>
            </div>
            <!--  body -->
            <div class="p-4 md:p-5 space-y-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="true" name="visibility" class="sr-only peer" <?=
                    $product['visibility'] == 1 ?
                        'checked' : ''
                    ?>>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Visible</span>
                </label>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">This product will be hidden from all sales
                    channels. </p>
            </div>
            <!-- footer -->
        </div>

        <div class="relative p-6  bg-white rounded-lg shadow dark:bg-gray-700">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Images <span class="text-red-500">*</span></label>
            <div class="mb-6 grid sm:gap-2">
                <div class="flex items-center h-full justify-center w-full">
                    <label for="dropzone-file"
                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center h-full pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span>
                                or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="images[]" accept="image/*" multiple
                               class="hidden"/>
                    </label>
                </div>
                <div class="grid w-full gap-2 mt-2 sm:grid-cols-4">
                    <?php if (!empty($images)) : ?>
                        <?php foreach ($images as $image) : ?>
                            <img class="w-full h-full overflow-auto border border-gray-300 rounded-md"
                                 src="/public/uploads/<?=
                                 htmlspecialchars($image['name'] ?? '') ?>" alt="<?= htmlspecialchars($image['name'] ?? '') ?>">
                        <?php endforeach; ?>
                    <?php else: ?>
                        <img src="" alt="No image available">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div></div>
        <div class="flex items-center space-x-4 mb-4">
            <button type="submit" id="update" class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4
                    focus:outline-none
            focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update product
            </button>
            <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <a href="/products">Cancel</a>
            </button>
        </div>
    </form>
    <script>
        document.getElementById('dropzone-file').addEventListener('change', function () {
            const files = this.files;
            if (files.length > 4) {
                alert('You can only upload a maximum of 3 images.');
                this.value = '';
            }
        });
    </script>
    <script src="/public/scripts/multiSelect.js"></script>
    <script src="/public/scripts/wysiwyg.js"></script>
    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
