<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/body.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
require base_path("Http/views/partials/main.php");
?>
<div class="w-full sm:w-3/4 md:3/4 p-4 h-svh rounded-lg dark:border-gray-700 mt-14">
    <div class="w-full flex justify-between mb-4">
        <div>
            <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl"><?= $customer_name ?? 'Guest' ?></h1>
            <?php require base_path('Http/views/partials/crumbs.php') ?>
        </div>
        <button class="bg-orange-500 block text-white
        hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 h-12 rounded-lg text-sm px-4
        py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            <a href="/orders">Back To Orders</a>
        </button>
    </div>

    <form method="POST" action="/orders" enctype="multipart/form-data"
          class="w-full grid gap-4 sm:grid-cols-[78%_20%] sm:mb-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value=<?= $_GET['id'] ?? 0 ?>>
        <input type="hidden" name="order_id" value=<?= $order['order_id'] ?? 0 ?>>
        <div class="relative grid gap-2 sm:grid-cols-2 p-4 bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="mb-4">
                <label for="default-input" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Order Code<span class="text-red-500">*</span></label>
                <input type="text" id="default-input" name="id"
                       value="<?= htmlspecialchars($order['order_item_id'] ?? '') ?>"
                       class="opacity-90 bg-gray-100  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="user" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Customer Name<span class="text-red-500">*</span></label>
                <input type="text" id="user" name="user" readonly
                       value="<?= htmlspecialchars($order['user'] ?? '') ?>"
                       class=" border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4 col-span-2">
                <label for="status" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Status<span class="text-red-500">*</span><span class="text-gray-500
                text-xs sm:text-sm">
                        note: admin can change status only</span></label>
                <input type="hidden" name="status" value="<?= 'new' ?>">
                <button type="button" class="<?= order_status($order, 'new') ? 'bg-orange-500' : 'bg-white' ?> px-6
                py-2
                text-sm
                font-semibold
                rounded-md
                shadow
                border
                border-gray-200
                hover:bg-gray-200">New
                </button>
                <button type="button" class="<?= order_status($order, 'processing') ? 'bg-orange-500' : 'bg-white' ?>
                px-6 py-2 text-sm
                font-semibold rounded-md shadow border border-gray-200 hover:bg-gray-200">
                    Processing
                </button>
                <button type="button" class="<?= order_status($order, 'shipped') ? 'bg-orange-500' : 'bg-white' ?>
                px-6
                py-2
                text-sm
                font-semibold rounded-md shadow border border-gray-200 hover:bg-gray-200">
                    Shipped
                </button>
                <button type="button" class="<?= order_status($order, 'delivered') ? 'bg-orange-500' : 'bg-white' ?>
                px-6
                py-2
                text-sm
                font-semibold rounded-md shadow border border-gray-200 hover:bg-gray-200">
                    Delivered
                </button>
                <button type="button" class="<?= order_status($order, 'cancelled') ? 'bg-orange-500' : 'bg-white' ?>
                px-6
                py-2
                text-sm
                font-semibold rounded-md shadow border border-gray-200 hover:bg-gray-200">
                    Cancelled
                </button>
            </div>
            <div class="mb-4 col-span-2">
                <label for="street" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Street Address<span class="text-red-500">*</span></label>
                <input type="text" id="street" name="street" readonly
                       value="<?= htmlspecialchars($order['street_address'] ?? '') ?>"
                       class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4 col-span-2 grid gap-2 sm:grid-cols-3">
                <div class="w-full">
                    <label for="city" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">City<span class="text-red-500">*</span></label>
                    <input type="text" id="city" name="city" readonly
                           value="<?= htmlspecialchars($order['city'] ?? '') ?>"
                           class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="w-full">
                    <label for="province" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">State / Province<span class="text-red-500">*</span></label>
                    <input type="text" id="province" name="province" readonly
                           value="<?= htmlspecialchars($order['province'] ?? '') ?>"
                           class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="w-full">
                    <label for="zip" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Zip Code<span class="text-red-500">*</span></label>
                    <input type="text" id="zip" name="zip" readonly
                           value="<?= htmlspecialchars($order['zip_code'] ?? '') ?>"
                           class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="col-span-2">
                <label for="notes" class="block mb-2 text-sm font-semibold text-gray-900  dark:text-white">Notes</label>
                <textarea id="notes" name="notes" rows="4" class="block p-2.5 w-full text-sm
                        text-gray-900 h-40
                         rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500
                        dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly><?= $order['notes'] ?? ''
                    ?></textarea>
            </div>
        </div>

        <div class="hidden p-4 sm:grid sm:gap-4 grid-rows-2 relative md:h-40 overflow-auto md:w-full bg-white
        rounded-lg shadow
        dark:bg-gray-700">
            <div class="w-full mb-2">
                <h1 class="font-sans text-sm font-semibold mb-2">Created at</h1>
                <p class="text-sm"><?= $order['created_at'] ?? '' ?></p>
            </div>
            <div class="w-full">
                <h1 class="font-sans text-sm font-semibold mb-2">Last modified at</h1>
                <p class="text-sm"><?= $order['created_at'] ?? '' ?></p>
            </div>
        </div>

        <div class="flex items-center space-x-4 mb-4">
            <button type="submit" id="update" class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4
                    focus:outline-none
            focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update product
            </button>
            <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <a href="/orders">Cancel</a>
            </button>
        </div>

        <div></div>

        <div class="relative grid gap-2 p-4 w-full sm:grid-cols-[50%_22%_22%] bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex col-span-3 items-center w-full justify-between pb-4 mb-4 border-b rounded-t
            dark:border-gray-600">
                <h3 class="text-lg font-semibold w-full text-gray-900 dark:text-white">
                    Order items
                </h3>
            </div>
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Product<span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" readonly
                       value="<?= htmlspecialchars($order['name'] ?? '') ?>"
                       class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="quantity" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Quantity<span class="text-red-500">*</span></label>
                <input type="text" id="quantity" name="quantity" readonly
                       value="<?= htmlspecialchars($order['quantity'] ?? '') ?>"
                       class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="price" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Unit Price<span class="text-red-500">*</span></label>
                <input type="text" id="price" name="price" readonly
                       value="<?= htmlspecialchars($order['price_at_time'] ?? '') ?>"
                       class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>

        <div></div>


        <div class="relative grid gap-2 p-4 w-full mb-20 sm:grid-cols-[50%_22%_22%] bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex col-span-3 items-center w-full justify-between pb-4 mb-4 border-b rounded-t
            dark:border-gray-600">
                <h3 class="text-lg font-semibold w-full text-gray-900 dark:text-white">
                    Payments
                </h3>
            </div>
            <h3 class="text-sm w-full text-gray-900 dark:text-white">
                To be continued...
            </h3>
        </div>
    </form>

<?php
require base_path("Http/views/partials/footer.php");
?>
