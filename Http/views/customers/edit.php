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
            <span><?= htmlspecialchars(ucfirst($customer['first_name']) . ' ' . ucfirst($customer['last_name']) . ' ' . 'Information' ?? '') ?></span>
        </h1>
        <form action="/customers" method="POST">
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
    <form method="POST" action="/customers" enctype="multipart/form-data"
          class="w-full grid gap-4 sm:grid-cols-[78%_20%] sm:mb-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value=<?= $_GET['id'] ?? 0 ?>>
        <div class="relative grid gap-4 sm:grid-cols-2 p-6 bg-white rounded-lg shadow dark:bg-gray-700">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">First Name <span class="text-red-500">*</span></label>
                <input type="text" id="first_name" name="first_name"
                       value="<?= htmlspecialchars(ucfirst($customer['first_name']) ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Last Name <span class="text-red-500">*</span></label>
                <input type="text" id="last_name" name="last_name"
                       value="<?= htmlspecialchars(ucfirst($customer['last_name']) ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="col-span-2">
                <label for="email"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email<span
                            class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($customer['email'] ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="" required="">
            </div>
            <div class="col-span-2">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Phone<span class="text-red-500">*</span></label>
                <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($customer['phone'] ?? '') ?>"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="" required="">
            </div>
            <div class="col-span-2">
                <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country<span
                            class="text-red-500">*</span></label>
                <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900
                        text-sm
                        rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="Philippines" selected>Philippines</option>
                    <option disabled>Unfortunately, we only cater to Philippines residents</option>
                </select>
            </div>
        </div>


        <div class="relative md:h-1/2 overflow-auto md:w-full bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Additional Info
                </h3>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">Created At</label>
                <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($customer['created_at'] ?? '') ?></p>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-white">User Permission</label>
                <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars(ucfirst($customer['user_type']) ?? '') ?></p>
            </div>
        </div>

        <div class="relative p-6 bg-white rounded-lg shadow dark:bg-gray-700">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-white">Image <span class="text-red-500">*</span></label>
            <div class="mb-6 grid sm:grid-cols-[78%_20%] sm:gap-2">
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
                        <input id="dropzone-file" value="" type="file" name="image" accept="image/*"
                               class="hidden"/>
                    </label>
                </div>
                <div class="grid w-full gap-2 mt-2">
                    <?php if (!empty($image)) : ?>
                        <img class="w-full h-full overflow-auto border border-gray-300 rounded-md"
                             src="uploads/<?=
                             htmlspecialchars($image['name'] ?? '') ?>"
                             alt="<?= htmlspecialchars($image['name'] ?? '') ?>">
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
                Update information
            </button>
            <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <a href="/customers">Cancel</a>
            </button>
        </div>
    </form>

    <div></div>

    <?php require base_path("Http/views/customers/addresses/create.php") ?>

    <div class="mb-12 md:h-fit  overflow-auto sm:max-w-[78%] bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-2 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Address
            </h3>
            <button data-modal-target="address-modal" data-modal-toggle="address-modal" class="bg-orange-500 h-12 block
            text-white
        hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4
        py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                New Address
            </button>

        </div>
        <div class=" overflow-x-auto shadow-md bg-white sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border-y border-gray-200">
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Street Address
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
                            City
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
                            State/Province
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
                            Zip Code
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
                            Country
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
                            Default Address
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Action
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($addresses as $address) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= htmlspecialchars(ucfirst($address['street_address']) ??
                                'NA') ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= htmlspecialchars(ucfirst($address['city']) ?? '') ?>
                        </td>
                        <td class="px-6 py-4 ">
                            <?= htmlspecialchars(ucfirst($address['province']) ?? '') ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= htmlspecialchars(ucfirst($address['zip_code']) ?? '') ?>
                        </td>
                        <td class="px-6 py-4 ">
                            <?= htmlspecialchars(ucfirst($address['country']) ?? '') ?>
                        </td>
                        <td class="font-semibold px-6 py-4 text-center flex items-center">
                            <?= htmlspecialchars(($address['is_default'] == 1 ? 'Default' : '') ?? '0') ?>
                        </td>
                        <td>
                            <div class="flex items-center">
                                <svg width="17" height="16" viewBox="0 0 17 16" class="hover:underline" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.01644 11.1335L6.02604 8.60945C6.18695 8.20736 6.42782 7.84212 6.73404 7.53585L12.27 2.00145C12.5883 1.68319 13.02 1.50439 13.47 1.50439C13.9201 1.50439 14.3518 1.68319 14.67 2.00145C14.9883 2.31971 15.1671 2.75136 15.1671 3.20145C15.1671 3.65154 14.9883 4.08319 14.67 4.40145L9.13404 9.93585C8.82764 10.2423 8.46204 10.4839 8.05964 10.6447L5.53644 11.6543C5.46375 11.6833 5.38411 11.6905 5.30741 11.6747C5.23071 11.659 5.16032 11.6211 5.10495 11.5657C5.04959 11.5104 5.01169 11.44 4.99595 11.3633C4.98022 11.2866 4.98734 11.2069 5.01644 11.1343V11.1335Z"
                                          fill="#D97706"/>
                                    <path d="M3.47002 4.5999C3.47002 4.0479 3.91802 3.5999 4.47002 3.5999H8.67002C8.82915 3.5999 8.98176 3.53669 9.09428 3.42417C9.20681 3.31164 9.27002 3.15903 9.27002 2.9999C9.27002 2.84077 9.20681 2.68816 9.09428 2.57564C8.98176 2.46312 8.82915 2.3999 8.67002 2.3999H4.47002C3.88654 2.3999 3.32696 2.63169 2.91438 3.04427C2.5018 3.45685 2.27002 4.01643 2.27002 4.5999V12.1999C2.27002 12.7834 2.5018 13.343 2.91438 13.7555C3.32696 14.1681 3.88654 14.3999 4.47002 14.3999H12.07C12.6535 14.3999 13.2131 14.1681 13.6257 13.7555C14.0382 13.343 14.27 12.7834 14.27 12.1999V7.9999C14.27 7.84077 14.2068 7.68816 14.0943 7.57564C13.9818 7.46312 13.8291 7.3999 13.67 7.3999C13.5109 7.3999 13.3583 7.46312 13.2458 7.57564C13.1332 7.68816 13.07 7.84077 13.07 7.9999V12.1999C13.07 12.7519 12.622 13.1999 12.07 13.1999H4.47002C3.91802 13.1999 3.47002 12.7519 3.47002 12.1999V4.5999Z"
                                          fill="#D97706"/>
                                </svg>
                                <a href="/address?id=<?= htmlspecialchars($address['address_id'] ?? '0') ?>"
                                   class="font-medium text-orange-500 hover:underline">Edit</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
