<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/body.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
require base_path("Http/views/partials/main.php");
?>
<div class="p-4 h-svh w-full rounded-lg dark:border-gray-700 mt-14">

<!--    Error Notification-->
    <?php require base_path("Http/views/partials/alerts.php") ?>

    <div class="w-full flex justify-between mb-4">
        <div>
            <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl">Products</h1>
            <?php require base_path('Http/views/partials/crumbs.php') ?>
        </div>
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-orange-500 h-12 block text-white
        hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4
        py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            New product
        </button>
    </div>

    <!--    Add New Products Modal-->
    <?php require base_path("Http/views/products/create.php") ?>

    <div class="grid sm:grid-cols-3 gap-4 mb-4">
        <div class="block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100
        dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-sm tracking-tight text-gray-600 dark:text-white">Total Products</h5>
            <p class="text-gray-900 dark:text-gray-900 font-bold text-5xl"><?= count($products) ?></p>
        </div>

        <div class="block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-sm tracking-tight text-gray-600 dark:text-white">Product Inventory</h5>
            <p class="text-gray-900 dark:text-gray-900 font-bold text-5xl"><?= $total_quantity ?? 0 ?></p>
        </div>

        <div class="block max-w-full overflow-x-auto p-6 bg-white border border-gray-200 rounded-lg shadow
        hover:bg-gray-100
        dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-sm tracking-tight text-gray-600 dark:text-white">Total Price</h5>
            <p class="text-gray-900 dark:text-gray-900 font-bold text-5xl"><?= "₱" . number_format($total_price, 2)
                    ?? 0
                ?></p>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="w-full bg-white">
                    <div class="bg-white p-3 w-full flex items-center justify-end gap-x-4">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative flex justify-between">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block font-medium w-full p-2 ps-10 text-sm
                                    text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500
                                    focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search"/>
                        </div>
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.128 1.601C5.528 1.206 7.99 1 10.5 1C13.01 1 15.473 1.206 17.872 1.601C18.0474 1.62992 18.2068 1.72019 18.3218 1.85572C18.4369 1.99126 18.5 2.16324 18.5 2.341V4.629C18.4997 5.22539 18.2627 5.79728 17.841 6.219L13.159 10.902C12.7373 11.3237 12.5003 11.8956 12.5 12.492V15.529C12.5 16.213 12.19 16.859 11.656 17.286L9.719 18.836C9.60867 18.9244 9.47559 18.9798 9.33511 18.9959C9.19463 19.0119 9.05248 18.9879 8.92505 18.9267C8.79762 18.8654 8.69011 18.7694 8.6149 18.6497C8.53969 18.5299 8.49986 18.3914 8.5 18.25V12.493C8.5 12.1975 8.44181 11.9049 8.32874 11.632C8.21566 11.359 8.04993 11.1109 7.841 10.902L3.159 6.22C2.95007 6.01107 2.78434 5.76303 2.67126 5.49004C2.55819 5.21706 2.5 4.92448 2.5 4.629V2.34C2.5 2.16224 2.56314 1.99026 2.67816 1.85472C2.79318 1.71919 2.95261 1.62992 3.128 1.601Z" fill="#A1A1AA"/>
                        </svg>
                    </div>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Name
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Description
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Visibility
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Quantity
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Price
                            <a href="#">
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) : ?>
                <?php $images = (new \Core\Repository\Products())->getProductImages((int)$product['product_id']) ?>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4">
                        <?php if (!empty($images)) :   ?>
                            <?php foreach ($images as $image) :  ?>
                                <img class="w-20 h-16 sm:w-16 overflow-auto border border-gray-300 rounded-md"
                                     src="uploads/<?=
                                         $image['name'] ?? ''?>" alt="<?= $image['name'] ?? '' ?>">
                            <?php endforeach;  ?>
                        <?php else:  ?>
                            <img src="" alt="No image available">
                        <?php endif;  ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= htmlspecialchars($product['name']) ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= htmlspecialchars(ucfirst(substr($product['description'], 0, 50)) ?? '')  ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php if ($product['visibility'] == 1) : ?>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.06 10.75L9.31 13L13.06 7.75M19.06 10C19.06 11.1819 18.8272 12.3522 18.3749 13.4442C17.9226 14.5361 17.2597 15.5282 16.424 16.364C15.5882 17.1997 14.5961 17.8626 13.5041 18.3149C12.4122 18.7672 11.2419 19 10.06 19C8.8781 19 7.70778 18.7672 6.61585 18.3149C5.52392 17.8626 4.53176 17.1997 3.69604 16.364C2.86031 15.5282 2.19737 14.5361 1.74508 13.4442C1.29279 12.3522 1.06 11.1819 1.06 10C1.06 7.61305 2.00821 5.32387 3.69604 3.63604C5.38386 1.94821 7.67305 1 10.06 1C12.4469 1 14.7361 1.94821 16.424 3.63604C18.1118 5.32387 19.06 7.61305 19.06 10Z"
                                      stroke="#22C55E" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        <?php else: ?>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.81 9.75L14.31 14.25M14.31 9.75L9.81 14.25M21.06 12C21.06 13.1819 20.8272 14.3522 20.3749 15.4442C19.9226 16.5361 19.2597 17.5282 18.424 18.364C17.5882 19.1997 16.5961 19.8626 15.5041 20.3149C14.4122 20.7672 13.2419 21 12.06 21C10.8781 21 9.70778 20.7672 8.61585 20.3149C7.52392 19.8626 6.53176 19.1997 5.69604 18.364C4.86031 17.5282 4.19737 16.5361 3.74508 15.4442C3.29279 14.3522 3.06 13.1819 3.06 12C3.06 9.61305 4.00821 7.32387 5.69604 5.63604C7.38386 3.94821 9.67305 3 12.06 3C14.4469 3 16.7361 3.94821 18.424 5.63604C20.1118 7.32387 21.06 9.61305 21.06 12Z"
                                      stroke="#EF4444" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= htmlspecialchars($product['stock_quantity']) ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php
                        $total_price = calculateTotalPrice($product['price'], 1);
                        echo htmlspecialchars("₱" . number_format($total_price, 2));
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/product?id=<?= htmlspecialchars($product['product_id']) ?>" class="font-medium
                            text-primary-orange
                            dark:text-blue-500
                            hover:underline">Open</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
