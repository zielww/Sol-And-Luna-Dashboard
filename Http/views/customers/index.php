<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/body.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
require base_path("Http/views/partials/main.php");
?>
<div  x-data="{ isOpen: false}" class="p-4 h-svh w-full rounded-lg dark:border-gray-700 mt-14">

    <!--    Error Notification-->
    <?php require base_path("Http/views/partials/alerts.php") ?>

    <?php require base_path("Http/views/customers/create.php") ?>

    <div class="w-full flex justify-between mb-4">
        <div>
            <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl">Customers</h1>
            <?php require base_path('Http/views/partials/crumbs.php') ?>
        </div>
        <button @click="isOpen = true" class="bg-orange-500 h-12 block text-white
        hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4
        py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            New Customer
        </button>
    </div>

    <div class="relative overflow-x-auto bg-white p-4 shadow-md rounded-md">
        <table id="main-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border-y border-gray-200">
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Name
                            <div>
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Email
                            <div>
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Country
                            <div>
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Phone
                            <div>
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </div>
                        </div>
                    </th>
                    <th data-type="date" data-format="YYYY/MM/DD HH:mm:ss" scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Date Created
                            <div>
                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $customer) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= htmlspecialchars(ucfirst($customer['first_name']) . ' ' . ucfirst($customer['last_name']) ??
                            'NA') ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= htmlspecialchars(ucfirst($customer['email']) ?? 'NA') ?>
                    </td>
                    <td class="px-6 py-4 ">
                        <?= htmlspecialchars(ucfirst($customer['country']) ?? 'NA') ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= htmlspecialchars('(+63) ' . substr($customer['phone'] ?? '', 1) ?? '') ?>
                    </td>
                    <td class="px-6 py-4 ">
                        <?= date('Y/m/d H:i:s', strtotime($customer['created_at'])) ?>
                    </td>
                    <td class="px-6 py-4 text-center flex items-center">
                        <svg width="17" height="16" viewBox="0 0 17 16" class="hover:underline" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.01644 11.1335L6.02604 8.60945C6.18695 8.20736 6.42782 7.84212 6.73404 7.53585L12.27 2.00145C12.5883 1.68319 13.02 1.50439 13.47 1.50439C13.9201 1.50439 14.3518 1.68319 14.67 2.00145C14.9883 2.31971 15.1671 2.75136 15.1671 3.20145C15.1671 3.65154 14.9883 4.08319 14.67 4.40145L9.13404 9.93585C8.82764 10.2423 8.46204 10.4839 8.05964 10.6447L5.53644 11.6543C5.46375 11.6833 5.38411 11.6905 5.30741 11.6747C5.23071 11.659 5.16032 11.6211 5.10495 11.5657C5.04959 11.5104 5.01169 11.44 4.99595 11.3633C4.98022 11.2866 4.98734 11.2069 5.01644 11.1343V11.1335Z"
                                  fill="#D97706"/>
                            <path d="M3.47002 4.5999C3.47002 4.0479 3.91802 3.5999 4.47002 3.5999H8.67002C8.82915 3.5999 8.98176 3.53669 9.09428 3.42417C9.20681 3.31164 9.27002 3.15903 9.27002 2.9999C9.27002 2.84077 9.20681 2.68816 9.09428 2.57564C8.98176 2.46312 8.82915 2.3999 8.67002 2.3999H4.47002C3.88654 2.3999 3.32696 2.63169 2.91438 3.04427C2.5018 3.45685 2.27002 4.01643 2.27002 4.5999V12.1999C2.27002 12.7834 2.5018 13.343 2.91438 13.7555C3.32696 14.1681 3.88654 14.3999 4.47002 14.3999H12.07C12.6535 14.3999 13.2131 14.1681 13.6257 13.7555C14.0382 13.343 14.27 12.7834 14.27 12.1999V7.9999C14.27 7.84077 14.2068 7.68816 14.0943 7.57564C13.9818 7.46312 13.8291 7.3999 13.67 7.3999C13.5109 7.3999 13.3583 7.46312 13.2458 7.57564C13.1332 7.68816 13.07 7.84077 13.07 7.9999V12.1999C13.07 12.7519 12.622 13.1999 12.07 13.1999H4.47002C3.91802 13.1999 3.47002 12.7519 3.47002 12.1999V4.5999Z"
                                  fill="#D97706"/>
                        </svg>
                        <a href="/customer?id=<?= htmlspecialchars($customer['user_id'] ?? '0') ?>"
                           class="font-medium
                        text-orange-500
                        hover:underline">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="/public/scripts/datatables/table.js"></script>
    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
