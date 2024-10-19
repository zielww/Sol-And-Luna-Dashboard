<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/body.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
require base_path("Http/views/partials/main.php");
?>
<div class="p-4 h-svh w-full rounded-lg dark:border-gray-700 mt-14">

    <?php require base_path("Http/views/partials/alerts.php") ?>

    <div class="w-full flex justify-between mb-4 items-center">
        <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl">
            <span>Edit Address</span>
        </h1>
        <form action="/addresses" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>">
            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-red-600 h-10
            inline-flex items-center hover:text-white border
            border-red-600
        hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1
        text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                Delete
            </button>
            <div id="popup-modal" tabindex="-1"
                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                to delete this customer? This action cannot be reversed.</h3>
                            <button data-modal-hide="popup-modal" type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                No, cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <form method="POST" action="/addresses"
          class="w-full grid gap-4 sm:grid-cols-[78%_20%] sm:mb-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="address_id" value=<?= $_GET['id'] ?? 0 ?>>
        <div class="relative h-fit grid gap-4 sm:grid-cols-3 p-6 bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="col-span-3 sm:col-span-3">
                <label for="street_address" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white"> Street Address <span class="text-red-500">*</span></label>
                <input type="text" id="street_address" name="street_address"
                       value="<?= htmlspecialchars($address['street_address'] ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="col-span-3 sm:col-span-1">
                <label for="city" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white"> City <span class="text-red-500">*</span></label>
                <input type="text" id="city" name="city"
                       value="<?= htmlspecialchars($address['city'] ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="col-span-3  sm:col-span-1">
                <label for="zip_code" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white"> Zip Code <span class="text-red-500">*</span></label>
                <input type="text" id="zip_code" name="zip_code"
                       value="<?= htmlspecialchars($address['zip_code'] ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="col-span-3 sm:col-span-1">
                <label for="province" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">State / Province <span class="text-red-500">*</span></label>
                <input type="text" id="province" name="province"
                       value="<?= htmlspecialchars($address['province'] ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="col-span-3">
                <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country<span
                            class="text-red-500">*</span></label>
                <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900
                        text-sm
                        rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="Philippines">Philippines</option>
                    <option disabled>Unfortunately, we only cater to Philippines residents</option>
                </select>
            </div>
            <div class="col-span-3">
                <label for="primary" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Is Default<span
                            class="text-red-500">*</span></label>
                <select id="primary" name="primary" class="bg-gray-50 border border-gray-300 text-gray-900
                        text-sm
                        rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <?php if ($same_address ?? false) : ?>
                        <option value="1" selected>Default Address</option>
                        <option value="0">Not Default Address</option>
                    <?php else : ?>
                        <?php if (!empty($default_address)) : ?>
                            <option value="1" disabled>Default Address</option>
                            <option value="0" selected>Not Default Address</option>
                        <?php else : ?>
                            <option value="1" selected>Default Address</option>
                            <option value="0">Not Default Address</option>
                        <?php endif; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>


        <div class="relative md:h-1/2 overflow-auto md:w-full bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Default Address
                </h3>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Is Default?</label>
                <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($address['is_default'] == 1 ? 'Yes' :
                        'No')
                    ?></p>
            </div>
        </div>

        <div class="flex items-center space-x-4 mb-4">
            <button type="submit" id="update" class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4
                    focus:outline-none
            focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update address
            </button>
            <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <a href="<?= previous_url() ?>">Cancel</a>
            </button>
        </div>
    </form>

    <div></div>

    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
