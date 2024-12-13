<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/body.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
require base_path("Http/views/partials/main.php");
?>
<div class="p-4 h-svh w-full sm:w-3/4 md:3/4 rounded-lg dark:border-gray-700 mt-14">

    <?php require base_path("Http/views/partials/alerts.php") ?>

    <div class="w-full flex justify-between mb-4 items-center">
        <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl">Edit
            <span><?= htmlspecialchars(ucfirst($category['name']) . ' Category' ?? '') ?></span></h1>
        <?php require base_path("Http/views/categories/delete.php") ?>
    </div>
    <form method="POST" action="/categories" enctype="multipart/form-data"
          class="w-full grid gap-4 sm:grid-cols-[78%_20%] sm:mb-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value=<?= $_GET['id'] ?? 0 ?>>
        <div class="relative grid gap-4 sm:grid-cols-2 p-6 bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="mb-6">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Name <span class="text-red-500">*</span></label>
                <input type="text" id="default-input" name="name"
                       value="<?= htmlspecialchars(ucfirst($category['name']) ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Parent Category <span class="text-red-500">*</span></label>
                <label for="slug"></label>
                <input type="text" id="slug" readonly name="slug"
                       value="<?= htmlspecialchars(ucfirst($slug['name'] ?? 'No Parent') ?? '') ?>"
                       class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 opacity-80
                       focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description<span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full h-40 text-sm
                        text-gray-900
                        bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Write product description here"><?= htmlspecialchars($category['description']
                        ?? '') ?></textarea>
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
                    $category['visibility'] == 1 ?
                        'checked' : ''
                    ?>>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4
                    peer-focus:ring-orange-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700
                    peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                    peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px]
                    after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5
                    after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Visible</span>
                </label>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">This category will be hidden from all sales
                    channels. </p>
            </div>
            <!-- footer -->
        </div>

        <div class="flex items-center space-x-4 mb-4">
            <button type="submit" id="update" class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4
                    focus:outline-none
            focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update category
            </button>
            <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <a href="/categories">Cancel</a>
            </button>
        </div>
    </form>
    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
