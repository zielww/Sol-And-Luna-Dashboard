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

    <!--    Page Title -->
    <div class="w-full flex justify-between mb-4">
        <div>
            <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl">Reports</h1>
            <?php require base_path('Http/views/partials/crumbs.php') ?>
        </div>
    </div>

    <!--    Filter Div -->
    <div class="hidden relative mt-4 overflow-x-auto sm:rounded-lg">
        <!--        Filters-->
        <div class="flex items-center gap-4">
            <h1 class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Filter by Date</h1>
            <!--            Date Picker-->
            <div id="date-range-picker" date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <label for="datepicker-range-start"></label>
                    <input id="datepicker-range-start" name="start" type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                           focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700
                           dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <label for="datepicker-range-end"></label>
                    <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300
                    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Select date end">
                </div>
            </div>
        </div>
    </div>

    <div class="grid sm:grid-cols-4 gap-4 my-4">
        <div class="flex flex-col items-center max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow
        hover:bg-gray-100
        dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-sm tracking-tight text-gray-600 dark:text-white">Total Sales</h5>
            <p class="text-gray-900 dark:text-gray-900 font-bold text-5xl">₱<?= number_format($total_sales ?? 0, 2) ?></p>
            <div class="flex items-center mt-2">
                <p class="text-sm font-medium text-gray-500">Amount of Product Sales</p>
            </div>
        </div>

        <div class="flex flex-col items-center max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow
        hover:bg-gray-100
        dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-sm tracking-tight text-gray-600 dark:text-white">Product Sold</h5>
            <p class="text-gray-900 dark:text-gray-900 font-bold text-5xl"><?= number_format($total_product_quantity_sold ?? 0) ?></p>
            <div class="flex items-center mt-2">
                <p class="text-sm font-medium text-gray-500">Total Product Quantity Sold</p>
            </div>
        </div>

        <div class="flex flex-col items-center max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow
        hover:bg-gray-100
        dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-sm tracking-tight text-gray-600 dark:text-white">Payment Count</h5>
            <p class="text-gray-900 dark:text-gray-900 font-bold text-5xl"><?= number_format($payment_count ?? 0) ?></p>
            <div class="flex items-center mt-2">
                <p class="text-sm font-medium text-gray-500">Successful Payments</p>
            </div>
        </div>

        <div class="flex flex-col items-center max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow
        hover:bg-gray-100
        dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-sm tracking-tight text-gray-600 dark:text-white">Delivery Count</h5>
            <p class="text-gray-900 dark:text-gray-900 font-bold text-5xl"><?= number_format($delivery_count ?? 0) ?></p>
            <div class="flex items-center mt-2">
                <p class="text-sm font-medium text-gray-500">Successful Deliveries</p>
            </div>
        </div>
    </div>

    <!--    Charts -->
    <div class="sm:grid sm:grid-cols-2 md:grid-cols-2 overflow-auto gap-4">
        <!--        Sales Report-->
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mb-4">
            <div class="flex justify-between mb-5">
                <div class="grid gap-4 grid-cols-2">
                    <div>
                        <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                            Total Sales
                            <svg data-popover-target="sales-info" data-popover-placement="bottom"
                                 class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                 viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div data-popover id="sales-info" role="tooltip"
                                 class="absolute z-[999] invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Total Sales Overview</h3>
                                    <p>This report provides insights into the total sales generated over time. Ideally, the chart should show a growing trend, as stagnating or declining sales indicate
                                        potential issues with sales performance or market demand.</p>

                                    <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                    <p>The total sales are calculated for each date bucket, aggregating all sales up to that point. This means that the sales for period n include all sales made in the
                                        prior periods, plus the sales generated during period n.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </h5>
                        <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">₱<?= number_format($total_sales ?? 0, 2) ?></p>
                    </div>
                </div>
            </div>
            <div id="sales-report"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <a
                            href="/sales-report"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Sales Report
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!--        Product Report-->
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mb-4">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                        <svg width="50px" height="50px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier"><title>product</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="icon" fill="#6b7280" transform="translate(64.000000, 34.346667)">
                                        <path d="M192,7.10542736e-15 L384,110.851252 L384,332.553755 L192,443.405007 L1.42108547e-14,332.553755 L1.42108547e-14,110.851252 L192,7.10542736e-15 Z M127.999,206.918 L128,357.189 L170.666667,381.824 L170.666667,231.552 L127.999,206.918 Z M42.6666667,157.653333 L42.6666667,307.920144 L85.333,332.555 L85.333,182.286 L42.6666667,157.653333 Z M275.991,97.759 L150.413,170.595 L192,194.605531 L317.866667,121.936377 L275.991,97.759 Z M192,49.267223 L66.1333333,121.936377 L107.795,145.989 L233.374,73.154 L192,49.267223 Z"
                                              id="Combined-Shape"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h5 class="flex items-center leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"><?= number_format($total_product_quantity_sold ?? 0) ?>
                            <svg data-popover-target="product-info" data-popover-placement="bottom"
                                 class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                 viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div data-popover id="product-info" role="tooltip"
                                 class="absolute z-[999] invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2 font-medium">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Product Quantity Sold Overview</h3>
                                    <p>This report provides insights into the total quantity of products sold over time. Ideally, the chart should display an upward trend, as stagnating or declining
                                        quantities sold could signal issues with product demand or sales performance.</p>

                                    <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                    <p>The quantity of products sold is calculated for each date bucket by summing the units sold. This means that the quantity for period n includes all products sold
                                        in prior periods, as well as the units sold during period n.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total product quantity sold</p>
                    </div>
                </div>
                <div>
                </div>
            </div>

            <div id="product-report"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <a
                            href="/product-report"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Product Report
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!--        Payment Report-->
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mb-4">
            <div class="flex justify-between mb-5">
                <div class="grid gap-4 grid-cols-2">
                    <div>
                        <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                            Successful Payments
                            <svg data-popover-target="payment-info" data-popover-placement="bottom"
                                 class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                 viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div data-popover id="payment-info" role="tooltip"
                                 class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Successful Payments Overview</h3>
                                    <p>This report helps track the cumulative growth of successful payments over time. Ideally, the chart should show a consistent upward trend, as stagnation or a
                                        decline in payments could indicate issues with payment processing or customer conversion.</p>

                                    <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                    <p>For each date bucket, the total number of successful payments is calculated. This includes all successful transactions up to that date, plus the successful
                                        payments made during the current period.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </h5>
                        <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold"><?= number_format($payment_count ?? 0) ?></p>
                    </div>
                </div>
            </div>
            <div id="payment-report"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <a
                            href="/payment-report"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Payment Report
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!--        Delivery Report-->
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mb-4">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                        <svg height="50px" width="50px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                             xml:space="preserve" fill="#6b7280"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <style type="text/css"> .st0 {
                                        fill: #6b7280;
                                    } </style>
                                <g>
                                    <path class="st0"
                                          d="M116.683,354.34c-26.836,0-48.607,21.764-48.607,48.6c0,26.85,21.771,48.614,48.607,48.614 c26.844,0,48.608-21.764,48.608-48.614C165.29,376.104,143.526,354.34,116.683,354.34z M116.683,424.826 c-12.08,0-21.872-9.799-21.872-21.886c0-12.073,9.792-21.865,21.872-21.865c12.08,0,21.872,9.792,21.872,21.865 C138.554,415.027,128.762,424.826,116.683,424.826z"></path>
                                    <path class="st0"
                                          d="M403.8,354.34c-26.836,0-48.6,21.764-48.6,48.6c0,26.85,21.764,48.614,48.6,48.614 c26.843,0,48.606-21.764,48.606-48.614C452.406,376.104,430.643,354.34,403.8,354.34z M403.8,424.826 c-12.073,0-21.865-9.799-21.865-21.886c0-12.073,9.792-21.865,21.865-21.865c12.079,0,21.871,9.792,21.871,21.865 C425.671,415.027,415.879,424.826,403.8,424.826z"></path>
                                    <path class="st0"
                                          d="M200.127,128.622H90.502c-3.561,0-6.957,1.582-9.23,4.331l-78.48,94.163C0.986,229.268,0,231.994,0,234.815 v82.595v43.189c0,6.648,5.389,12.029,12.03,12.029h36.844c11.626-25.9,37.621-44.024,67.81-44.024 c30.196,0,56.183,18.124,67.81,44.024h27.671V140.652C212.163,134.003,206.767,128.622,200.127,128.622z M43.931,236.052 c0-2.849,0.978-5.612,2.777-7.82l50.103-61.694c2.36-2.907,5.9-4.59,9.633-4.59h49.083c6.848,0,12.404,5.554,12.404,12.411v70.011 c0,6.849-5.555,12.404-12.404,12.404H56.334c-6.85,0-12.404-5.554-12.404-12.404V236.052z"></path>
                                    <path class="st0"
                                          d="M243.532,338.792c-3.741,0-6.763,3.03-6.763,6.77v20.303c0,3.735,3.022,6.763,6.763,6.763h92.466 c6.382-14.209,17.072-26.023,30.419-33.836H243.532z"></path>
                                    <path class="st0"
                                          d="M504.381,338.792h-63.19c13.353,7.814,24.044,19.627,30.419,33.836h32.772c3.741,0,6.77-3.028,6.77-6.763 v-20.303C511.151,341.822,508.122,338.792,504.381,338.792z"></path>
                                    <path class="st0"
                                          d="M497.568,60.446H252.043c-7.964,0-14.425,6.46-14.425,14.432v226.703c0,7.972,6.461,14.432,14.425,14.432 h245.525c7.971,0,14.432-6.46,14.432-14.432V74.878C512,66.906,505.539,60.446,497.568,60.446z M458.27,134.09H291.355 c-3.741,0-6.771-3.036-6.771-6.763v-13.533c0-3.741,3.03-6.77,6.771-6.77H458.27c3.735,0,6.763,3.029,6.763,6.77v13.533 C465.033,131.054,462.005,134.09,458.27,134.09z M291.355,174.697H458.27c3.735,0,6.763,3.021,6.763,6.763V195 c0,3.727-3.028,6.763-6.763,6.763H291.355c-3.741,0-6.771-3.036-6.771-6.763v-13.54 C284.584,177.718,287.614,174.697,291.355,174.697z M291.355,242.369H458.27c3.735,0,6.763,3.022,6.763,6.763v13.533 c0,3.727-3.028,6.77-6.763,6.77H291.355c-3.741,0-6.771-3.044-6.771-6.77v-13.533C284.584,245.391,287.614,242.369,291.355,242.369 z"></path>
                                </g>
                            </g></svg>
                    </div>
                    <div>
                        <h5 class="flex items-center leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"><?= number_format($delivery_count ?? 0) ?>
                            <svg data-popover-target="delivery-info" data-popover-placement="bottom"
                                 class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                 viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div data-popover id="delivery-info" role="tooltip"
                                 class="absolute z-[999] invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2 font-medium">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Delivery Performance Overview</h3>
                                    <p>This report provides insights into the performance of your product deliveries over time. Ideally, the chart should show a positive trend, with on-time deliveries
                                        increasing. Stagnation or declines in delivery performance may indicate issues with logistics or fulfillment processes.</p>

                                    <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                    <p>Delivery performance is calculated by tracking the number of deliveries completed within the promised time frame for each date bucket. A successful delivery is
                                        counted if it arrives on or before the expected delivery date, while delays are tracked separately.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total successful deliveries</p>
                    </div>
                </div>
                <div>
                </div>
            </div>

            <div id="delivery-report"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <a
                            href="/delivery-report"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Delivery Report
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add the options
        const sales = <?= $sales_report_json ?>;
        const payments = <?= $payment_report_json ?>;
        const products = <?= $product_report_json ?>;
        const deliveries = <?= $delivery_report_json ?>;
    </script>

    <script src="/public/scripts/charts/salesReport.js" type="module"></script>
    <script src="/public/scripts/charts/productReport.js" type="module"></script>
    <script src="/public/scripts/charts/paymentReport.js" type="module"></script>
    <script src="/public/scripts/charts/deliveryReport.js" type="module"></script>

    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
