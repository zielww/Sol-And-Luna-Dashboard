<?php
//Get Orders
use Core\App;
use Core\Database;

$items = App::resolve(Database::class)->query("
    SELECT *
    FROM orders
    WHERE status != 'delivered' 
    AND status != 'cancelled'
")->get();
?>

<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
       aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dashboard"
                   class="flex items-center p-2 rounded-lg dark:text-white <?= url_is('/dashboard') ? "bg-gray-100 text-primary-orange  dark:bg-gray-700 group" : "text-gray-900" ?> ">
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class=" <?= url_is('/products') ? "text-primary-orange" : "text-gray-500" ?>">
                        <path d="M1.25 11.0001L10.204 2.04507C10.644 1.60607 11.356 1.60607 11.795 2.04507L20.75 11.0001M3.5 8.75007V18.8751C3.5 19.4961 4.004 20.0001 4.625 20.0001H8.75V15.1251C8.75 14.5041 9.254 14.0001 9.875 14.0001H12.125C12.746 14.0001 13.25 14.5041 13.25 15.1251V20.0001H17.375C17.996 20.0001 18.5 19.4961 18.5 18.8751V8.75007M7.25 20.0001H15.5"
                              stroke="<?= url_is('/dashboard') ? "#D97706" : "#A1A1AA" ?>" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="ms-3 text-sm">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/products"
                   class="flex items-center p-2  rounded-lg dark:text-white <?= url_is('/products', '/product') ? "bg-gray-100 text-primary-orange dark:bg-gray-700 group" : "text-gray-900" ?> ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 6C3.75 5.40326 3.98705 4.83097 4.40901 4.40901C4.83097 3.98705 5.40326 3.75 6 3.75H8.25C8.84674 3.75 9.41903 3.98705 9.84099 4.40901C10.2629 4.83097 10.5 5.40326 10.5 6V8.25C10.5 8.84674 10.2629 9.41903 9.84099 9.84099C9.41903 10.2629 8.84674 10.5 8.25 10.5H6C5.40326 10.5 4.83097 10.2629 4.40901 9.84099C3.98705 9.41903 3.75 8.84674 3.75 8.25V6ZM3.75 15.75C3.75 15.1533 3.98705 14.581 4.40901 14.159C4.83097 13.7371 5.40326 13.5 6 13.5H8.25C8.84674 13.5 9.41903 13.7371 9.84099 14.159C10.2629 14.581 10.5 15.1533 10.5 15.75V18C10.5 18.5967 10.2629 19.169 9.84099 19.591C9.41903 20.0129 8.84674 20.25 8.25 20.25H6C5.40326 20.25 4.83097 20.0129 4.40901 19.591C3.98705 19.169 3.75 18.5967 3.75 18V15.75ZM13.5 6C13.5 5.40326 13.7371 4.83097 14.159 4.40901C14.581 3.98705 15.1533 3.75 15.75 3.75H18C18.5967 3.75 19.169 3.98705 19.591 4.40901C20.0129 4.83097 20.25 5.40326 20.25 6V8.25C20.25 8.84674 20.0129 9.41903 19.591 9.84099C19.169 10.2629 18.5967 10.5 18 10.5H15.75C15.1533 10.5 14.581 10.2629 14.159 9.84099C13.7371 9.41903 13.5 8.84674 13.5 8.25V6ZM13.5 15.75C13.5 15.1533 13.7371 14.581 14.159 14.159C14.581 13.7371 15.1533 13.5 15.75 13.5H18C18.5967 13.5 19.169 13.7371 19.591 14.159C20.0129 14.581 20.25 15.1533 20.25 15.75V18C20.25 18.5967 20.0129 19.169 19.591 19.591C19.169 20.0129 18.5967 20.25 18 20.25H15.75C15.1533 20.25 14.581 20.0129 14.159 19.591C13.7371 19.169 13.5 18.5967 13.5 18V15.75Z"
                              stroke="<?= url_is('/products', '/product') ? "#D97706" : "#A1A1AA" ?>" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Products</span>
                </a>
            </li>
            <li>
                <a href="/orders"
                   class="flex items-center p-2  rounded-lg dark:text-white <?= url_is('/orders', '/order') ? "bg-gray-100 text-primary-orange dark:bg-gray-700 group" : "text-gray-900" ?> ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.75 10.5V6C15.75 5.00544 15.3549 4.05161 14.6516 3.34835C13.9484 2.64509 12.9945 2.25 12 2.25C11.0054 2.25 10.0516 2.64509 9.34833 3.34835C8.64507 4.05161 8.24998 5.00544 8.24998 6V10.5M19.606 8.507L20.869 20.507C20.939 21.172 20.419 21.75 19.75 21.75H4.24998C4.09219 21.7502 3.93613 21.7171 3.79193 21.6531C3.64774 21.589 3.51863 21.4953 3.41301 21.3781C3.30738 21.2608 3.2276 21.1227 3.17884 20.9726C3.13008 20.8226 3.11343 20.6639 3.12999 20.507L4.39399 8.507C4.42314 8.23056 4.55361 7.9747 4.76024 7.78876C4.96686 7.60281 5.23501 7.49995 5.51298 7.5H18.487C19.063 7.5 19.546 7.935 19.606 8.507ZM8.62498 10.5C8.62498 10.5995 8.58548 10.6948 8.51515 10.7652C8.44482 10.8355 8.34944 10.875 8.24998 10.875C8.15053 10.875 8.05515 10.8355 7.98482 10.7652C7.91449 10.6948 7.87498 10.5995 7.87498 10.5C7.87498 10.4005 7.91449 10.3052 7.98482 10.2348C8.05515 10.1645 8.15053 10.125 8.24998 10.125C8.34944 10.125 8.44482 10.1645 8.51515 10.2348C8.58548 10.3052 8.62498 10.4005 8.62498 10.5ZM16.125 10.5C16.125 10.5995 16.0855 10.6948 16.0152 10.7652C15.9448 10.8355 15.8494 10.875 15.75 10.875C15.6505 10.875 15.5551 10.8355 15.4848 10.7652C15.4145 10.6948 15.375 10.5995 15.375 10.5C15.375 10.4005 15.4145 10.3052 15.4848 10.2348C15.5551 10.1645 15.6505 10.125 15.75 10.125C15.8494 10.125 15.9448 10.1645 16.0152 10.2348C16.0855 10.3052 16.125 10.4005 16.125 10.5Z"
                              stroke="<?= url_is('/orders', '/order') ? "#D97706" : "#A1A1AA" ?>" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Orders</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium
                    text-primary-orange bg-primary-orange-2 rounded-full dark:bg-blue-900 dark:text-blue-300"><?= isset($items) ? count($items) : 0 ?></span>
                </a>
            </li>
            <li>
                <a href="/categories"
                   class="flex items-center p-2  rounded-lg dark:text-white <?= url_is('/categories','/category') ? "bg-gray-100 text-primary-orange dark:bg-gray-700 group" : "text-gray-900" ?> ">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.068 3H5.75C5.15326 3 4.58097 3.23705 4.15901 3.65901C3.73705 4.08097 3.5 4.65326 3.5 5.25V9.568C3.5 10.165 3.737 10.738 4.159 11.159L13.74 20.74C14.439 21.439 15.52 21.612 16.347 21.07C18.4286 19.7066 20.2066 17.9286 21.57 15.847C22.112 15.02 21.939 13.939 21.24 13.24L11.66 3.66C11.451 3.45077 11.2029 3.28478 10.9297 3.17154C10.6565 3.05829 10.3637 3 10.068 3Z"
                              stroke="<?= url_is('/categories', '/category') ? "#D97706" : "#A1A1AA" ?>" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.5 6H6.508V6.008H6.5V6Z" stroke="#A1A1AA" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Categories</span>
                </a>
            </li>
            <li>
                <a href="/customers"
                   class="flex items-center p-2  rounded-lg dark:text-white <?= url_is('/customers', '/customer', '/address') ? "bg-gray-100 text-primary-orange dark:bg-gray-700 group" : "text-gray-900" ?> ">
                    <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.059 12.521C16.5268 12.2015 17.0755 12.0211 17.6415 12.0004C18.2076 11.9798 18.768 12.1199 19.2578 12.4044C19.7476 12.689 20.1468 13.1064 20.4093 13.6084C20.6718 14.1104 20.7868 14.6764 20.741 15.241C19.5412 15.6603 18.2668 15.8235 17 15.72C16.9961 14.5866 16.6697 13.4768 16.059 12.522C15.5169 11.6718 14.7691 10.972 13.8848 10.4875C13.0005 10.003 12.0083 9.74932 11 9.75C9.99182 9.74948 8.99981 10.0032 8.11571 10.4877C7.23162 10.9723 6.48399 11.6719 5.94199 12.522M16.999 15.719L17 15.75C17 15.975 16.988 16.197 16.963 16.416C15.1483 17.4571 13.0921 18.0033 11 18C8.82998 18 6.79299 17.424 5.03699 16.416C5.01128 16.1846 4.99892 15.9519 4.99999 15.719M4.99999 15.719C3.73361 15.8263 2.45989 15.6637 1.26099 15.242C1.21534 14.6776 1.33038 14.1117 1.59281 13.6099C1.85525 13.1081 2.25435 12.6908 2.74399 12.4063C3.23362 12.1218 3.79378 11.9817 4.3597 12.0021C4.92563 12.0226 5.4742 12.2028 5.94199 12.522M4.99999 15.719C5.00358 14.5857 5.33161 13.4769 5.94199 12.522M14 3.75C14 4.54565 13.6839 5.30871 13.1213 5.87132C12.5587 6.43393 11.7956 6.75 11 6.75C10.2043 6.75 9.44127 6.43393 8.87866 5.87132C8.31606 5.30871 7.99999 4.54565 7.99999 3.75C7.99999 2.95435 8.31606 2.19129 8.87866 1.62868C9.44127 1.06607 10.2043 0.75 11 0.75C11.7956 0.75 12.5587 1.06607 13.1213 1.62868C13.6839 2.19129 14 2.95435 14 3.75ZM20 6.75C20 7.04547 19.9418 7.33806 19.8287 7.61104C19.7156 7.88402 19.5499 8.13206 19.341 8.34099C19.132 8.54992 18.884 8.71566 18.611 8.82873C18.338 8.9418 18.0455 9 17.75 9C17.4545 9 17.1619 8.9418 16.8889 8.82873C16.616 8.71566 16.3679 8.54992 16.159 8.34099C15.9501 8.13206 15.7843 7.88402 15.6713 7.61104C15.5582 7.33806 15.5 7.04547 15.5 6.75C15.5 6.15326 15.737 5.58097 16.159 5.15901C16.581 4.73705 17.1532 4.5 17.75 4.5C18.3467 4.5 18.919 4.73705 19.341 5.15901C19.7629 5.58097 20 6.15326 20 6.75ZM6.49999 6.75C6.49999 7.04547 6.44179 7.33806 6.32871 7.61104C6.21564 7.88402 6.04991 8.13206 5.84098 8.34099C5.63204 8.54992 5.38401 8.71566 5.11102 8.82873C4.83804 8.9418 4.54546 9 4.24999 9C3.95451 9 3.66193 8.9418 3.38895 8.82873C3.11596 8.71566 2.86793 8.54992 2.65899 8.34099C2.45006 8.13206 2.28433 7.88402 2.17126 7.61104C2.05818 7.33806 1.99999 7.04547 1.99999 6.75C1.99999 6.15326 2.23704 5.58097 2.65899 5.15901C3.08095 4.73705 3.65325 4.5 4.24999 4.5C4.84672 4.5 5.41902 4.73705 5.84098 5.15901C6.26293 5.58097 6.49999 6.15326 6.49999 6.75Z"
                              stroke="<?= url_is('/customers', '/customer', '/address') ? "#D97706" : "#A1A1AA" ?>" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Customers</span>
                </a>
            </li>
            <li>
                <a href="/reports"
                   class="flex items-center p-2  rounded-lg dark:text-white <?= url_is("/reports", '/sales-report') ? "bg-gray-100 text-primary-orange
                   dark:bg-gray-700 group" : "text-gray-900" ?> ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 14.25V11.625C19.5 10.7299 19.1444 9.87145 18.5115 9.23851C17.8786 8.60558 17.0201 8.25 16.125 8.25H14.625C14.3266 8.25 14.0405 8.13147 13.8295 7.9205C13.6185 7.70952 13.5 7.42337 13.5 7.125V5.625C13.5 4.72989 13.1444 3.87145 12.5115 3.23851C11.8785 2.60558 11.0201 2.25 10.125 2.25H8.25M8.25 15H15.75M8.25 18H12M10.5 2.25H5.625C5.004 2.25 4.5 2.754 4.5 3.375V20.625C4.5 21.246 5.004 21.75 5.625 21.75H18.375C18.996 21.75 19.5 21.246 19.5 20.625V11.25C19.5 8.86305 18.5518 6.57387 16.864 4.88604C15.1761 3.19821 12.8869 2.25 10.5 2.25Z"
                              stroke="<?= url_is('/reports', '/sales-report') ? "#D97706" : "#A1A1AA" ?>" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Reports</span>
                </a>
            </li>
            <li>
                <a href="/messages"
                   class="flex items-center p-2  rounded-lg dark:text-white <?= url_is('/messages') ? "bg-gray-100 text-primary-orange dark:bg-gray-700 group" : "text-gray-900" ?> ">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.19 7.68803C12.8399 7.99828 13.4057 8.45996 13.8401 9.03427C14.2745 9.60857 14.5648 10.2787 14.6865 10.9885C14.8081 11.6982 14.7577 12.4268 14.5394 13.113C14.3212 13.7992 13.9414 14.423 13.432 14.932L8.93203 19.432C8.08811 20.2759 6.94351 20.7501 5.75003 20.7501C4.55655 20.7501 3.41195 20.2759 2.56803 19.432C1.72411 18.5881 1.25 17.4435 1.25 16.25C1.25 15.0565 1.72411 13.9119 2.56803 13.068L4.32503 11.311M17.675 10.689L19.432 8.93203C20.2759 8.08811 20.7501 6.94351 20.7501 5.75003C20.7501 4.55655 20.2759 3.41195 19.432 2.56803C18.5881 1.72411 17.4435 1.25 16.25 1.25C15.0565 1.25 13.9119 1.72411 13.068 2.56803L8.56803 7.06803C8.05866 7.57703 7.67889 8.20084 7.46061 8.88705C7.24233 9.57326 7.19191 10.3018 7.3136 11.0116C7.43528 11.7213 7.72552 12.3915 8.15992 12.9658C8.59432 13.5401 9.1602 14.0018 9.81003 14.312"
                              stroke="<?= url_is('/messages') ? "#D97706" : "#A1A1AA" ?>" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Messages</span>
                </a>
            </li>
        </ul>
    </div>
</aside>