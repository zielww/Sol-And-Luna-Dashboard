<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/body.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
require base_path("Http/views/partials/main.php");
?>
<div class="w-full p-4 h-svh rounded-lg dark:border-gray-700 mt-14">
    <!--    Error Notification-->
    <?php require base_path("Http/views/partials/alerts.php") ?>
    <div class="w-full flex justify-between mb-4">
        <div>
            <h1 class="font-sans font-bold mb-4 text-2xl sm:text-3xl"><?= htmlspecialchars(ucfirst(explode('@', $order['email'])[0])) . ' ' . 'Order' ?? 'Guest' ?></h1>
            <?php require base_path('Http/views/partials/crumbs.php') ?>
        </div>
        <button class="bg-orange-500 block text-white
        hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 h-12 rounded-lg text-sm px-4
        py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            <a href="/orders">Back To Orders</a>
        </button>
    </div>

    <?php if ($order['status'] == 'pending') : ?>
        <div class="flex gap-x-5">
            <form action="/orders" method="POST" class="col-span-2 my-2 mr-2">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value=<?= $_GET['id'] ?? 0 ?>>
                <input type="hidden" name="order_id" value=<?= htmlspecialchars($order['order_id'] ?? 0) ?>>
                <input type="hidden" name="status" value=<?= 'new' ?>>
                <button data-status="pending" class="status_indicator bg-green-500 block text-white
        hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 h-12 rounded-lg text-sm px-4
        py-1 text-center" type="submit">
                    Accept Order
                </button>
            </form>

            <form action="/orders" method="POST" class="col-span-2 my-2">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value=<?= $_GET['id'] ?? 0 ?>>
                <input type="hidden" name="order_id" value=<?= htmlspecialchars($order['order_id'] ?? 0) ?>>
                <button data-status="pending" class="status_indicator bg-red-500 block text-white
        hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 h-12 rounded-lg text-sm px-4
        py-1 text-center" type="submit">
                    Reject Order
                </button>
            </form>
        </div>

    <?php endif; ?>

    <form method="POST" action="/orders" enctype="multipart/form-data"
          class="w-full grid gap-4 sm:grid-cols-[78%_20%] sm:mb-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value=<?= $_GET['id'] ?? 0 ?>>
        <input type="hidden" name="order_id" value=<?= htmlspecialchars($order['order_id'] ?? 0) ?>>
        <div class="relative grid gap-2 sm:grid-cols-2 p-4 bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="mb-4">
                <label for="default-input" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Order Code<span class="text-red-500">*</span></label>
                <input type="text" id="default-input" name="id"
                       value="<?= htmlspecialchars($order['order_id'] ?? '') ?>"
                       class="opacity-90 bg-gray-100  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="user" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Customer Email<span class="text-red-500">*</span></label>
                <input type="text" id="user" name="user" readonly
                       value="<?= htmlspecialchars($order['email'] ?? '') ?>"
                       class=" border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4 col-span-2 sm:col-span-1">
                <label for="tracking_number" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Tracking Number<span class="text-red-500">*</span><span class="text-gray-500
                text-xs sm:text-sm">
                        note: add the tracking number here</span></label>
                <input type="text" id="tracking_number" name="tracking_number"
                       value="<?= htmlspecialchars($order['tracking_number'] ?? '') ?>"
                       class=" border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4 col-span-2 sm:col-span-1">
                <label for="payment_status" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Payment Status<span class="text-red-500">*</span></label>
                <input type="text" id="payment_status" name="payment_status" readonly
                       value="<?= htmlspecialchars(ucfirst($order['payment_status']) ?? '') ?>"
                       class="<?= $order['payment_status'] == 'not paid' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-900' ?> border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <?php if ($order['status'] !== 'pending') : ?>
                <div class="mb-4 col-span-2">
                    <label for="status" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Status<span class="text-red-500">*</span><span class="text-gray-500
                text-xs sm:text-sm">
                        note: change status manually</span></label>
                    <input id="status" type="hidden" readonly name="status" value="<?= $order['status'] ?>">
                    <div id="status_container" class="flex flex-wrap sm:flex gap-2">
                        <div data-status="new"
                             class="status_indicator <?= order_status($order, 'new') ? 'status_selected' : 'status_not_selected'
                             ?>">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.4802 1.80393C16.4343 1.57787 16.3117 1.37464 16.1331 1.22866C15.9545 1.08268 15.7309 1.00293 15.5002 1.00293C15.2696 1.00293 15.046 1.08268 14.8674 1.22866C14.6888 1.37464 14.5661 1.57787 14.5202 1.80393L14.2802 2.99593C14.2416 3.18956 14.1466 3.36743 14.0071 3.50713C13.8676 3.64682 13.6898 3.74209 13.4962 3.78093L12.3042 4.01893C12.0771 4.06385 11.8726 4.18621 11.7256 4.36511C11.5786 4.54402 11.4982 4.76839 11.4982 4.99993C11.4982 5.23148 11.5786 5.45585 11.7256 5.63475C11.8726 5.81366 12.0771 5.93601 12.3042 5.98093L13.4962 6.21893C13.69 6.25759 13.868 6.35279 14.0077 6.4925C14.1474 6.63221 14.2426 6.81017 14.2812 7.00393L14.5192 8.19593C14.5642 8.42308 14.6865 8.6276 14.8654 8.77458C15.0443 8.92157 15.2687 9.00192 15.5002 9.00192C15.7318 9.00192 15.9562 8.92157 16.1351 8.77458C16.314 8.6276 16.4363 8.42308 16.4812 8.19593L16.7192 7.00393C16.7579 6.81017 16.8531 6.63221 16.9928 6.4925C17.1325 6.35279 17.3105 6.25759 17.5042 6.21893L18.6962 5.98093C18.9234 5.93601 19.1279 5.81366 19.2749 5.63475C19.4219 5.45585 19.5022 5.23148 19.5022 4.99993C19.5022 4.76839 19.4219 4.54402 19.2749 4.36511C19.1279 4.18621 18.9234 4.06385 18.6962 4.01893L17.5042 3.78093C17.3105 3.74227 17.1325 3.64708 16.9928 3.50737C16.8531 3.36766 16.7579 3.18969 16.7192 2.99593L16.4812 1.80393H16.4802ZM7.44924 5.68393C7.38301 5.48459 7.2557 5.31117 7.08535 5.18826C6.91501 5.06535 6.71029 4.99921 6.50024 4.99921C6.29018 4.99921 6.08546 5.06535 5.91512 5.18826C5.74478 5.31117 5.61746 5.48459 5.55124 5.68393L4.86824 7.73493C4.81916 7.88237 4.7364 8.01634 4.62652 8.12622C4.51665 8.2361 4.38267 8.31886 4.23524 8.36793L2.18424 9.05093C1.98489 9.11716 1.81147 9.24447 1.68856 9.41481C1.56566 9.58516 1.49951 9.78988 1.49951 9.99993C1.49951 10.21 1.56566 10.4147 1.68856 10.585C1.81147 10.7554 1.98489 10.8827 2.18424 10.9489L4.23524 11.6329C4.38257 11.6819 4.51647 11.7645 4.62634 11.8742C4.73621 11.9839 4.81903 12.1177 4.86824 12.2649L5.55124 14.3159C5.61746 14.5153 5.74478 14.6887 5.91512 14.8116C6.08546 14.9345 6.29018 15.0007 6.50024 15.0007C6.71029 15.0007 6.91501 14.9345 7.08535 14.8116C7.2557 14.6887 7.38301 14.5153 7.44924 14.3159L8.13224 12.2649C8.18131 12.1175 8.26407 11.9835 8.37395 11.8736C8.48383 11.7638 8.6178 11.681 8.76524 11.6319L10.8162 10.9489C11.0156 10.8827 11.189 10.7554 11.3119 10.585C11.4348 10.4147 11.501 10.21 11.501 9.99993C11.501 9.78988 11.4348 9.58516 11.3119 9.41481C11.189 9.24447 11.0156 9.11716 10.8162 9.05093L8.76524 8.36793C8.6178 8.31886 8.48383 8.2361 8.37395 8.12622C8.26407 8.01634 8.18131 7.88237 8.13224 7.73493L7.44924 5.68393ZM14.4492 13.6839C14.383 13.4846 14.2557 13.3112 14.0854 13.1883C13.915 13.0654 13.7103 12.9992 13.5002 12.9992C13.2902 12.9992 13.0855 13.0654 12.9151 13.1883C12.7448 13.3112 12.6175 13.4846 12.5512 13.6839L12.3672 14.2349C12.3183 14.3823 12.2357 14.5162 12.126 14.626C12.0163 14.7359 11.8825 14.8187 11.7352 14.8679L11.1842 15.0509C10.9849 15.1172 10.8115 15.2445 10.6886 15.4148C10.5657 15.5852 10.4995 15.7899 10.4995 15.9999C10.4995 16.21 10.5657 16.4147 10.6886 16.585C10.8115 16.7554 10.9849 16.8827 11.1842 16.9489L11.7352 17.1319C11.8827 17.181 12.0166 17.2638 12.1265 17.3736C12.2364 17.4835 12.3192 17.6175 12.3682 17.7649L12.5512 18.3159C12.6175 18.5153 12.7448 18.6887 12.9151 18.8116C13.0855 18.9345 13.2902 19.0007 13.5002 19.0007C13.7103 19.0007 13.915 18.9345 14.0854 18.8116C14.2557 18.6887 14.383 18.5153 14.4492 18.3159L14.6332 17.7649C14.6822 17.6176 14.7648 17.4837 14.8745 17.3738C14.9842 17.264 15.118 17.1811 15.2652 17.1319L15.8162 16.9489C16.0156 16.8827 16.189 16.7554 16.3119 16.585C16.4348 16.4147 16.501 16.21 16.501 15.9999C16.501 15.7899 16.4348 15.5852 16.3119 15.4148C16.189 15.2445 16.0156 15.1172 15.8162 15.0509L15.2652 14.8669C15.1179 14.818 14.984 14.7353 14.8741 14.6257C14.7643 14.516 14.6814 14.3822 14.6322 14.2349L14.4492 13.6839Z"
                                      fill="#A1A1AA"/>
                            </svg>
                            <p>New</p>
                        </div>
                        <div data-status="processing"
                             class="status_indicator <?= order_status($order, 'processing') ? 'status_selected' : 'status_not_selected'
                             ?>">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.262 11.4242C16.0121 12.3567 15.5212 13.2069 14.8386 13.8895C14.156 14.5722 13.3057 15.0631 12.3733 15.313C11.4408 15.5629 10.459 15.563 9.52654 15.3132C8.59404 15.0635 7.74371 14.5727 7.06099 13.8902L6.74899 13.5792H9.18199C9.3809 13.5792 9.57167 13.5002 9.71232 13.3595C9.85297 13.2189 9.93199 13.0281 9.93199 12.8292C9.93199 12.6303 9.85297 12.4395 9.71232 12.2989C9.57167 12.1582 9.3809 12.0792 9.18199 12.0792H4.93899C4.74008 12.0792 4.54931 12.1582 4.40866 12.2989C4.26801 12.4395 4.18899 12.6303 4.18899 12.8292V17.0712C4.18899 17.2701 4.26801 17.4609 4.40866 17.6015C4.54931 17.7422 4.74008 17.8212 4.93899 17.8212C5.1379 17.8212 5.32867 17.7422 5.46932 17.6015C5.60997 17.4609 5.68899 17.2701 5.68899 17.0712V14.6412L5.99899 14.9512C6.86784 15.8203 7.95015 16.4453 9.13714 16.7634C10.3241 17.0816 11.5739 17.0816 12.761 16.7636C13.948 16.4455 15.0304 15.8206 15.8993 14.9516C16.7682 14.0827 17.393 13.0002 17.711 11.8132C17.7627 11.621 17.736 11.4162 17.6367 11.2438C17.5374 11.0713 17.3736 10.9454 17.1815 10.8937C16.9893 10.842 16.7845 10.8687 16.6121 10.968C16.4396 11.0673 16.3137 11.232 16.262 11.4242ZM17.492 7.7012C17.6323 7.56052 17.7111 7.3699 17.711 7.1712V2.9292C17.711 2.73029 17.632 2.53952 17.4913 2.39887C17.3507 2.25822 17.1599 2.1792 16.961 2.1792C16.7621 2.1792 16.5713 2.25822 16.4307 2.39887C16.29 2.53952 16.211 2.73029 16.211 2.9292V5.3602L15.901 5.0502C15.0321 4.18114 13.9498 3.55612 12.7628 3.23798C11.5759 2.91984 10.326 2.91979 9.13902 3.23782C7.952 3.55586 6.86963 4.18078 6.00071 5.04976C5.13179 5.91874 4.50695 7.00116 4.18899 8.1882C4.16009 8.28431 4.15078 8.38524 4.1616 8.48502C4.17242 8.5848 4.20316 8.68139 4.25199 8.76907C4.30082 8.85675 4.36675 8.93374 4.44588 8.99548C4.525 9.05721 4.61572 9.10244 4.71264 9.12848C4.80957 9.15452 4.91073 9.16084 5.01014 9.14706C5.10956 9.13329 5.20519 9.09971 5.29139 9.0483C5.37759 8.99689 5.45259 8.92871 5.51195 8.84779C5.57132 8.76687 5.61384 8.67485 5.63699 8.5772C5.88656 7.64427 6.37738 6.79351 7.06007 6.11046C7.74277 5.42741 8.59329 4.93616 9.52608 4.68611C10.4589 4.43606 11.4411 4.43602 12.3739 4.68601C13.3067 4.936 14.1572 5.42719 14.84 6.1102L15.151 6.4202H12.719C12.5201 6.4202 12.3293 6.49922 12.1887 6.63987C12.048 6.78052 11.969 6.97129 11.969 7.1702C11.969 7.36911 12.048 7.55988 12.1887 7.70053C12.3293 7.84118 12.5201 7.9202 12.719 7.9202H16.962C17.1607 7.92029 17.3513 7.84153 17.492 7.7012Z"
                                      fill="white"/>
                            </svg>
                            <p>Processing</p>
                        </div>
                        <div data-status="shipped" class="status_indicator <?= order_status($order, 'shipped') ?
                            'status_selected' : 'status_not_selected'
                        ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 20">
                                <path d="M7.06007 3C6.00907 3 4.96707 3.04 3.93507 3.117C3.56015 3.14602 3.21008 3.31573 2.95506 3.59207C2.70004 3.86842 2.55894 4.23097 2.56007 4.607V10.5H11.5601V4.606C11.5601 3.835 10.9701 3.176 10.1851 3.117C9.14524 3.03882 8.10283 2.99979 7.06007 3ZM2.56007 12V14.5C2.56007 14.8978 2.7181 15.2794 2.99941 15.5607C3.28071 15.842 3.66224 16 4.06007 16H4.10107C4.21804 15.2997 4.57957 14.6637 5.12136 14.2049C5.66316 13.7461 6.35011 13.4943 7.06007 13.4943C7.77002 13.4943 8.45697 13.7461 8.99877 14.2049C9.54056 14.6637 9.90209 15.2997 10.0191 16H10.8101C11.009 16 11.1997 15.921 11.3404 15.7803C11.481 15.6397 11.5601 15.4489 11.5601 15.25V12H2.56007Z"/>
                                <path d="M7.06006 18C7.45788 18 7.83941 17.842 8.12072 17.5607C8.40202 17.2794 8.56006 16.8978 8.56006 16.5C8.56006 16.1022 8.40202 15.7206 8.12072 15.4393C7.83941 15.158 7.45788 15 7.06006 15C6.66223 15 6.2807 15.158 5.9994 15.4393C5.71809 15.7206 5.56006 16.1022 5.56006 16.5C5.56006 16.8978 5.71809 17.2794 5.9994 17.5607C6.2807 17.842 6.66223 18 7.06006 18ZM13.8101 5C13.6111 5 13.4204 5.07902 13.2797 5.21967C13.1391 5.36033 13.0601 5.55109 13.0601 5.75V14.264C13.4408 13.9237 13.9022 13.6861 14.4004 13.5739C14.8986 13.4616 15.4173 13.4784 15.9072 13.6226C16.3972 13.7668 16.8422 14.0336 17.2002 14.3978C17.5582 14.7621 17.8173 15.2117 17.9531 15.704C18.3231 15.429 18.5631 14.985 18.5481 14.477C18.4616 11.5445 17.8576 8.65035 16.7641 5.928C16.6527 5.6532 16.4617 5.41798 16.2156 5.2526C15.9695 5.08723 15.6796 4.99926 15.3831 5H13.8101ZM15.0601 18C15.4579 18 15.8394 17.842 16.1207 17.5607C16.402 17.2794 16.5601 16.8978 16.5601 16.5C16.5601 16.1022 16.402 15.7206 16.1207 15.4393C15.8394 15.158 15.4579 15 15.0601 15C14.6622 15 14.2807 15.158 13.9994 15.4393C13.7181 15.7206 13.5601 16.1022 13.5601 16.5C13.5601 16.8978 13.7181 17.2794 13.9994 17.5607C14.2807 17.842 14.6622 18 15.0601 18Z"/>
                            </svg>
                            <p>Shipped</p>
                        </div>
                        <div data-status="delivered"
                             class="status_indicator <?= order_status($order, 'delivered') ? 'status_selected' : 'status_not_selected'
                             ?>">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M14.903 10.652C15.3853 10.397 15.7888 10.0153 16.0703 9.54802C16.3518 9.08074 16.5006 8.54554 16.5006 8.00002C16.5006 7.4545 16.3518 6.91931 16.0703 6.45202C15.7888 5.98473 15.3853 5.60304 14.903 5.34802C15.0638 4.82672 15.0793 4.27145 14.948 3.74197C14.8167 3.21249 14.5435 2.72883 14.1578 2.34303C13.7721 1.95724 13.2885 1.68392 12.7591 1.55247C12.2296 1.42102 11.6744 1.43642 11.153 1.59702C10.8981 1.11453 10.5164 0.710712 10.049 0.429047C9.58159 0.147381 9.04622 -0.00146484 8.50052 -0.00146484C7.95482 -0.00146484 7.41945 0.147381 6.95206 0.429047C6.48467 0.710712 6.10296 1.11453 5.84802 1.59702C5.32672 1.43628 4.77145 1.42073 4.24197 1.55204C3.71249 1.68335 3.22883 1.95654 2.84303 2.34223C2.45724 2.72792 2.18392 3.21151 2.05247 3.74096C1.92102 4.27041 1.93642 4.82567 2.09702 5.34702C1.61453 5.60196 1.21071 5.98367 0.929047 6.45106C0.647381 6.91845 0.498535 7.45382 0.498535 7.99952C0.498535 8.54522 0.647381 9.08059 0.929047 9.54798C1.21071 10.0154 1.61453 10.3971 2.09702 10.652C1.93628 11.1733 1.92073 11.7286 2.05204 12.2581C2.18335 12.7876 2.45654 13.2712 2.84223 13.657C3.22792 14.0428 3.71151 14.3161 4.24096 14.4476C4.77041 14.579 5.32567 14.5636 5.84702 14.403C6.10196 14.8855 6.48367 15.2893 6.95106 15.571C7.41845 15.8527 7.95382 16.0015 8.49952 16.0015C9.04522 16.0015 9.58059 15.8527 10.048 15.571C10.5154 15.2893 10.8971 14.8855 11.152 14.403C11.6733 14.5638 12.2286 14.5793 12.7581 14.448C13.2876 14.3167 13.7712 14.0435 14.157 13.6578C14.5428 13.2721 14.8161 12.7885 14.9476 12.2591C15.079 11.7296 15.0636 11.1734 14.903 10.652ZM12.357 6.19202C12.415 6.11231 12.4567 6.02196 12.4798 5.92612C12.5028 5.83029 12.5068 5.73086 12.4914 5.63349C12.4761 5.53613 12.4417 5.44275 12.3902 5.35868C12.3387 5.27461 12.2712 5.2015 12.1915 5.14352C12.1118 5.08554 12.0215 5.04383 11.9256 5.02077C11.8298 4.99771 11.7304 4.99375 11.633 5.00912C11.5356 5.02449 11.4423 5.05888 11.3582 5.11034C11.2741 5.1618 11.201 5.22931 11.143 5.30902L7.66002 10.099L5.78002 8.21902C5.7108 8.14742 5.62802 8.09032 5.53649 8.05106C5.44497 8.0118 5.34655 7.99116 5.24696 7.99034C5.14738 7.98952 5.04863 8.00854 4.95648 8.0463C4.86432 8.08405 4.78061 8.13978 4.71022 8.21023C4.63984 8.28068 4.58419 8.36445 4.54652 8.45664C4.50885 8.54883 4.48992 8.6476 4.49083 8.74718C4.49175 8.84676 4.51248 8.94517 4.55183 9.03665C4.59118 9.12814 4.64836 9.21087 4.72002 9.28002L7.22002 11.78C7.29665 11.8567 7.38898 11.9158 7.49067 11.9534C7.59235 11.9909 7.70097 12.006 7.80903 11.9976C7.9171 11.9891 8.02205 11.9573 8.11665 11.9044C8.21125 11.8515 8.29326 11.7787 8.35702 11.691L12.357 6.19102V6.19202Z"
                                      fill="#A1A1AA"/>
                            </svg>
                            <p>Delivered</p>
                        </div>
                        <div data-status="cancelled"
                             class="status_indicator <?= order_status($order, 'cancelled') ? 'status_selected' : 'status_not_selected'
                             ?>">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10.73 18C12.8517 18 14.8865 17.1571 16.3868 15.6569C17.8871 14.1566 18.73 12.1217 18.73 10C18.73 7.87827 17.8871 5.84344 16.3868 4.34315C14.8865 2.84285 12.8517 2 10.73 2C8.60825 2 6.57342 2.84285 5.07313 4.34315C3.57284 5.84344 2.72998 7.87827 2.72998 10C2.72998 12.1217 3.57284 14.1566 5.07313 15.6569C6.57342 17.1571 8.60825 18 10.73 18ZM9.00998 7.22C8.86781 7.08752 8.67976 7.0154 8.48546 7.01883C8.29116 7.02225 8.10577 7.10097 7.96836 7.23838C7.83095 7.37579 7.75223 7.56118 7.74881 7.75548C7.74538 7.94978 7.8175 8.13783 7.94998 8.28L9.66998 10L7.94998 11.72C7.87629 11.7887 7.81719 11.8715 7.7762 11.9635C7.73521 12.0555 7.71317 12.1548 7.71139 12.2555C7.70961 12.3562 7.72814 12.4562 7.76586 12.5496C7.80358 12.643 7.85972 12.7278 7.93094 12.799C8.00216 12.8703 8.08699 12.9264 8.18038 12.9641C8.27377 13.0018 8.3738 13.0204 8.4745 13.0186C8.57521 13.0168 8.67452 12.9948 8.76652 12.9538C8.85852 12.9128 8.94132 12.8537 9.00998 12.78L10.73 11.06L12.45 12.78C12.5186 12.8537 12.6014 12.9128 12.6934 12.9538C12.7854 12.9948 12.8848 13.0168 12.9855 13.0186C13.0862 13.0204 13.1862 13.0018 13.2796 12.9641C13.373 12.9264 13.4578 12.8703 13.529 12.799C13.6002 12.7278 13.6564 12.643 13.6941 12.5496C13.7318 12.4562 13.7503 12.3562 13.7486 12.2555C13.7468 12.1548 13.7248 12.0555 13.6838 11.9635C13.6428 11.8715 13.5837 11.7887 13.51 11.72L11.79 10L13.51 8.28C13.6425 8.13783 13.7146 7.94978 13.7112 7.75548C13.7077 7.56118 13.629 7.37579 13.4916 7.23838C13.3542 7.10097 13.1688 7.02225 12.9745 7.01883C12.7802 7.0154 12.5922 7.08752 12.45 7.22L10.73 8.94L9.00998 7.22Z"
                                      fill="#A1A1AA"/>
                            </svg>
                            <p>Cancelled</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <script>
                const statusContainer = document.querySelector('#status_container');
                const statusInput = document.querySelector('#status');

                statusContainer.addEventListener('click', (event) => {
                    const clickedIndicator = event.target.closest('.status_indicator');

                    if (!clickedIndicator) return;

                    statusContainer.querySelectorAll('.status_indicator').forEach(indicator => {
                        indicator.classList.remove('status_selected');
                        indicator.classList.add('status_not_selected');
                    });

                    clickedIndicator.classList.remove('status_not_selected');
                    clickedIndicator.classList.add('status_selected');

                    statusInput.value = clickedIndicator.getAttribute('data-status');
                });
            </script>
            <div class="mb-4 col-span-2">
                <label for="street" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Street Address<span class="text-red-500">*</span></label>
                <input type="text" id="street" name="street" readonly
                       value="<?= htmlspecialchars($shipping_address['street_address'] ?? '') ?>"
                       class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4 col-span-2 grid gap-2 sm:grid-cols-3">
                <div class="w-full">
                    <label for="city" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">City<span class="text-red-500">*</span></label>
                    <input type="text" id="city" name="city" readonly
                           value="<?= htmlspecialchars($shipping_address['city'] ?? '') ?>"
                           class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="w-full">
                    <label for="province" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">State / Province<span class="text-red-500">*</span></label>
                    <input type="text" id="province" name="province" readonly
                           value="<?= htmlspecialchars($shipping_address['province'] ?? '') ?>"
                           class="  border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="w-full">
                    <label for="zip" class="block mb-2 text-sm text-gray-900
                dark:text-white font-semibold">Zip Code<span class="text-red-500">*</span></label>
                    <input type="text" id="zip" name="zip" readonly
                           value="<?= htmlspecialchars($shipping_address['zip_code'] ?? '') ?>"
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
                        dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly><?= htmlspecialchars($order['notes'] ?? '')
                    ?></textarea>
            </div>
        </div>

        <div class="hidden p-4 sm:grid sm:gap-4 grid-rows-2 relative md:h-40 overflow-auto md:w-full bg-white
        rounded-lg shadow
        dark:bg-gray-700">
            <div class="w-full mb-2">
                <h1 class="font-sans text-sm font-semibold mb-2">Created at</h1>
                <p class="text-sm"><?= htmlspecialchars($order['created_at'] ?? '') ?></p>
            </div>
            <div class="w-full">
                <h1 class="font-sans text-sm font-semibold mb-2">Last modified at</h1>
                <p class="text-sm"><?= htmlspecialchars($order['created_at'] ?? '') ?></p>
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

        <div class="relative grid gap-2 p-4 w-full bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex col-span-3 items-center w-full justify-between pb-4 mb-4 border-b rounded-t
            dark:border-gray-600">
                <h3 class="text-lg font-semibold w-full text-gray-900 dark:text-white">
                    Order items
                </h3>
            </div>
            <?php foreach ($orders as $order) : ?>
                <div class="w-full col-span-4 gap-2 grid sm:grid-cols-[35%_20%_20%_20%] border border-gray-200 rounded-md py-4 items-center justify-center">
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
                        <label for="size" class="block mb-2 text-sm text-gray-900
                    dark:text-white font-semibold">Size<span class="text-red-500">*</span></label>
                        <input type="text" id="size" name="size" readonly
                               value="<?= htmlspecialchars($order['size'] ?? '') ?>"
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
            <?php endforeach; ?>
        </div>

        <div></div>


        <div class="relative grid gap-2 p-4 w-full mb-20 sm:grid-cols-[50%_22%_22%] bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex col-span-3 items-center w-full justify-between pb-4 mb-4 border-b rounded-t
            dark:border-gray-600">
                <h3 class="text-lg font-semibold w-full text-gray-900 dark:text-white">
                    Payments
                </h3>
            </div>
            <div class="text-sm w-full text-gray-900 dark:text-white gap-y-1">
                <h3>Payment Method: <?= htmlspecialchars($order['payment'] ?? 'Not Paid') ?></h3>
                <h3>Payment Status: <?= htmlspecialchars(ucfirst($order['payment_status']) ?? 'Not Paid') ?></h3>
            </div>
        </div>
    </form>

    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
