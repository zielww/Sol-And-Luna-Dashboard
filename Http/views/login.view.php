<!doctype html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet"/>
    <title>Log In</title>
</head>
<body class="dark:bg-dark-background w-full h-svh flex items-center justify-center bg-white">
<img id="background" alt="" class="-z-10 absolute">
<script>
    document.querySelector('#background').src = screen.width > 700 ? 'images/background.jpg' :
        'images/background-phone' +
        '.jpg';
</script>
<div class="w-full h-svh flex items-center justify-center">
    <form action="login/verify" method="POST" class="max-w-sm mx-auto">
        <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="px-6 py-4">
                <div class="flex justify-center mx-auto">
                    <svg width="36" height="42" viewBox="0 0 36 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.7055 3.68032C19.753 3.69912 19.8005 3.71793 19.8494 3.73731C20.2104 3.89702 20.3754 4.09347 20.592 4.45207C20.7039 4.84372 20.7032 5.16502 20.583 5.55457C20.3617 5.95047 20.1569 6.17887 19.7561 6.28464C19.3915 6.32794 19.0913 6.20093 18.7515 6.05857C18.139 5.80997 17.5868 5.6976 16.938 5.70157C16.8837 5.70124 16.8294 5.70092 16.7735 5.70058C16.5397 5.70107 16.3513 5.70923 16.128 5.79607C16.1196 6.24576 16.2279 6.45756 16.4835 6.79357C16.6035 6.9388 16.725 7.08231 16.848 7.22407C16.9008 7.28654 16.9536 7.34902 17.008 7.41339C17.4221 7.87656 17.8795 8.23118 18.368 8.57707C18.827 8.90743 19.0739 9.20926 19.224 9.82807C19.2404 10.0781 19.2404 10.0781 19.2381 10.3367C19.2374 10.4763 19.2374 10.4763 19.2367 10.6188C19.2349 10.7628 19.2349 10.7628 19.233 10.9096C19.2324 11.0075 19.2317 11.1053 19.231 11.2062C19.2293 11.4468 19.227 11.6874 19.224 11.9281C19.2705 11.9495 19.3169 11.9708 19.3648 11.9929C20.7348 12.6269 22.0777 13.3187 23.4146 14.0421C23.5333 14.1063 23.6521 14.1701 23.7709 14.2339C24.6864 14.7261 25.5734 15.2669 26.4539 15.8393C26.6279 15.9522 26.8024 16.064 26.9772 16.1753C30.4182 18.3728 30.4182 18.3728 30.672 19.3201C30.7352 19.8406 30.7265 20.3103 30.456 20.7481C29.558 21.9061 28.0341 21.9967 26.784 22.0921C26.2021 22.1197 25.6196 22.1151 25.0373 22.1138C24.8671 22.114 24.6968 22.1143 24.5266 22.1147C24.0685 22.1155 23.6105 22.1152 23.1525 22.1146C22.8654 22.1144 22.5783 22.1144 22.2913 22.1145C22.2194 22.1146 22.2194 22.1146 22.146 22.1146C22.0485 22.1147 21.9511 22.1147 21.8536 22.1148C20.9439 22.1153 20.0342 22.1147 19.1244 22.1138C18.3472 22.1131 17.5699 22.1132 16.7926 22.114C15.8857 22.1149 14.9788 22.1152 14.0719 22.1147C13.9749 22.1147 13.8778 22.1146 13.7807 22.1145C13.733 22.1145 13.6853 22.1145 13.6361 22.1145C13.3029 22.1143 12.9697 22.1146 12.6364 22.115C12.1863 22.1155 11.7362 22.1151 11.2861 22.1141C11.1221 22.1139 10.9581 22.114 10.794 22.1144C6.9137 22.1224 6.9137 22.1224 5.76451 20.9528C5.7155 20.8852 5.6665 20.8177 5.61601 20.7481C5.57443 20.6909 5.53285 20.6337 5.49001 20.5748C5.29356 20.2196 5.28468 19.8175 5.32801 19.4041C5.61688 18.153 7.20267 17.3896 8.08988 16.7889C8.51076 16.5073 8.93503 16.2331 9.36001 15.9601C9.43618 15.9108 9.51236 15.8615 9.59084 15.8108C11.9586 14.2839 14.4398 12.8982 16.992 11.8441C17.0966 11.4315 17.1385 11.0924 17.064 10.6681C16.8022 10.2859 16.4133 10.0418 16.0646 9.78049C15.124 9.03831 14.2046 7.92201 13.932 6.61375C13.8054 5.80627 13.9241 4.96656 14.328 4.28407C14.9 3.51947 15.54 3.22066 16.3902 3.12119C17.5055 3.03497 18.6554 3.24766 19.7055 3.68032ZM17.2792 14.3339C17.2304 14.3572 17.1817 14.3806 17.1315 14.4046C16.9722 14.4813 16.8133 14.5591 16.6545 14.6371C16.5435 14.691 16.4324 14.745 16.3213 14.799C15.3573 15.2696 14.4078 15.7724 13.464 16.2961C13.3 16.3861 13.1361 16.4761 12.9721 16.5661C11.6521 17.2949 10.3715 18.0857 9.11701 18.9578C9.05441 19.0013 8.99181 19.0448 8.92732 19.0896C8.87056 19.1296 8.8138 19.1696 8.75532 19.2108C8.70507 19.2462 8.65483 19.2815 8.60306 19.318C8.56773 19.3464 8.5324 19.3748 8.49601 19.4041C8.49601 19.4318 8.49601 19.4595 8.49601 19.4881C8.91356 19.572 9.31788 19.5839 9.74106 19.5827C9.81469 19.5829 9.88832 19.583 9.96418 19.5831C10.2104 19.5835 10.4565 19.5832 10.7027 19.5829C10.8794 19.583 11.0561 19.5832 11.2328 19.5834C11.6626 19.5837 12.0924 19.5837 12.5222 19.5834C12.8716 19.5832 13.2209 19.5832 13.5703 19.5833C13.62 19.5833 13.6698 19.5833 13.7211 19.5833C13.8222 19.5834 13.9233 19.5834 14.0244 19.5834C14.9718 19.5837 15.9192 19.5834 16.8666 19.5829C17.6793 19.5826 18.492 19.5826 19.3047 19.583C20.2489 19.5835 21.1931 19.5836 22.1373 19.5834C22.238 19.5834 22.3387 19.5833 22.4394 19.5833C22.4889 19.5833 22.5385 19.5833 22.5895 19.5833C22.9384 19.5832 23.2873 19.5833 23.6362 19.5835C24.1059 19.5838 24.5755 19.5836 25.0451 19.5831C25.2176 19.583 25.3901 19.583 25.5625 19.5832C25.7977 19.5834 26.0329 19.5832 26.2681 19.5827C26.3708 19.583 26.3707 19.583 26.4755 19.5833C26.8027 19.5822 27.1101 19.5662 27.432 19.4881C27.2685 19.2796 27.1014 19.1467 26.8909 19.008C26.8254 18.9647 26.7598 18.9214 26.6923 18.8768C26.6216 18.8308 26.5509 18.7848 26.478 18.7373C26.4046 18.6893 26.3313 18.6412 26.2557 18.5917C25.4804 18.0872 24.6946 17.6071 23.904 17.1361C23.852 17.105 23.8 17.074 23.7465 17.0421C23.4678 16.8763 23.188 16.7133 22.907 16.5527C22.7973 16.49 22.6877 16.4269 22.5782 16.3636C21.4401 15.7071 20.2792 15.1239 19.1046 14.5633C18.9529 14.4906 18.8015 14.4169 18.6507 14.3417C18.5879 14.3109 18.5251 14.28 18.4604 14.2482C18.4073 14.2216 18.3542 14.1951 18.2995 14.1677C17.9196 14.0318 17.6325 14.1599 17.2792 14.3339Z"
                              fill="black"/>
                        <path d="M11.169 24.5543C11.304 24.612 11.304 24.612 11.376 24.696C11.4113 25.1317 11.3063 25.4733 11.1681 25.8701C11.1239 26.0015 11.0798 26.1329 11.0357 26.2643C11.0126 26.3324 10.9894 26.4004 10.9656 26.4705C10.0639 28.8662 10.0639 28.8662 10.0935 31.395C10.2122 31.5919 10.2122 31.5919 10.3815 31.6838C10.873 31.6456 11.1926 31.2241 11.5065 30.8175C11.5589 30.7463 11.6113 30.675 11.6654 30.6016C11.99 30.1609 11.99 30.1609 12.2085 30.1298C12.384 30.156 12.384 30.156 12.528 30.324C12.5189 30.7307 12.3209 30.9633 12.0915 31.2428C12.0556 31.2871 12.0197 31.3315 11.9828 31.3771C11.5425 31.9119 11.0896 32.3886 10.44 32.508C10.1584 32.5044 9.9568 32.4275 9.73712 32.2206C9.45372 31.8716 9.35844 31.5487 9.28796 31.08C9.18104 31.1216 9.18104 31.1216 9.07196 31.164C8.9099 31.1529 8.74791 31.1405 8.58596 31.1273C8.21985 31.1155 8.21985 31.1155 7.90337 31.2986C7.77859 31.4721 7.77859 31.4721 7.66909 31.6589C7.44924 32.0158 7.13963 32.2576 6.76796 32.34C6.36256 32.3706 6.10942 32.3568 5.75996 32.088C5.30518 31.528 5.32796 31.1202 5.32796 30.324C4.63892 30.7121 3.94988 31.1002 3.23996 31.5C3.28748 31.8881 3.335 32.2762 3.38396 32.676C3.37209 33.4375 3.35086 34.0456 2.88446 34.6084C2.46146 35.0574 2.16086 35.1474 1.59015 35.1409C1.25669 35.0976 1.03354 34.9605 0.79196 34.692C0.573748 34.3261 0.531925 34.0404 0.57596 33.6C0.834679 32.4743 1.51485 31.7993 2.30396 31.164C2.16124 30.6347 1.99033 30.1287 1.79996 29.6205C1.11245 27.7425 1.11245 27.7425 1.37696 26.7855C1.55026 26.3144 1.79937 25.9191 2.20946 25.7093C2.76285 25.5122 3.301 25.5484 3.81568 25.8556C4.22608 26.1412 4.45681 26.4154 4.60796 26.964C4.63046 27.2003 4.63046 27.2003 4.60796 27.384C4.46396 27.552 4.46396 27.552 4.29296 27.5625C4.06884 27.4505 4.05997 27.3981 3.96446 27.1478C3.82718 26.7917 3.69288 26.6333 3.38396 26.46C2.95026 26.3376 2.62206 26.3602 2.23196 26.628C2.03369 26.8738 2.01708 27.0379 1.97996 27.3735C2.01783 28.4927 2.57636 29.6499 2.95196 30.66C3.2924 30.5369 3.61188 30.3775 3.93324 30.1994C3.98451 30.171 4.03579 30.1426 4.08861 30.1133C4.19645 30.0533 4.30422 29.9932 4.41191 29.9328C4.52152 29.8717 4.63135 29.8111 4.7414 29.751C4.90152 29.6637 5.06093 29.5747 5.22024 29.4854C5.269 29.4591 5.31776 29.4328 5.368 29.4057C5.70816 29.2117 5.89114 28.9955 6.11996 28.644C6.40022 28.3916 6.70222 28.2006 7.06046 28.1768C7.4983 28.2498 7.8341 28.4173 8.12696 28.812C8.3584 29.1932 8.4426 29.4106 8.43296 29.883C8.43166 29.9658 8.43036 30.0485 8.42902 30.1337C8.42735 30.1965 8.42568 30.2593 8.42396 30.324C8.81309 30.3751 8.81309 30.3751 9.15324 30.1974C9.3316 29.9202 9.38271 29.6374 9.44546 29.3055C9.66501 28.2478 9.97804 27.2301 10.296 26.208C10.3207 26.1281 10.3455 26.0482 10.3711 25.9659C10.4379 25.7521 10.5061 25.539 10.575 25.326C10.5947 25.2638 10.6144 25.2015 10.6347 25.1373C10.8465 24.499 10.8465 24.499 11.169 24.5543ZM6.33596 29.4C6.08728 29.8175 5.90396 30.2262 5.90396 30.744C6.03876 31.231 6.03876 31.231 6.33596 31.584C6.614 31.6345 6.74411 31.5991 6.99296 31.4423C7.19266 31.2549 7.33836 31.0697 7.48796 30.828C7.38897 30.6985 7.38897 30.6985 7.27196 30.576C7.22444 30.576 7.17692 30.576 7.12796 30.576C7.07996 30.464 7.03196 30.352 6.98396 30.24C6.95946 30.1898 6.93496 30.1396 6.90971 30.0878C6.82867 29.8743 6.81067 29.6953 6.79496 29.463C6.78958 29.3881 6.78419 29.3132 6.77865 29.236C6.77512 29.1792 6.77159 29.1225 6.76796 29.064C6.59002 29.064 6.45407 29.2716 6.33596 29.4ZM7.41596 29.148C7.36844 29.2035 7.32092 29.2589 7.27196 29.316C7.26775 29.5232 7.26775 29.5232 7.34396 29.736C7.56121 29.9953 7.56121 29.9953 7.84796 30.072C7.80616 29.5589 7.80616 29.5589 7.55996 29.148C7.51244 29.148 7.46492 29.148 7.41596 29.148ZM1.58199 32.741C1.32713 33.0507 1.22439 33.3298 1.20737 33.7608C1.23459 34.0483 1.32322 34.1754 1.51196 34.356C1.79926 34.4827 1.91816 34.452 2.20496 34.3193C2.4989 34.0957 2.64254 33.8236 2.73596 33.432C2.78781 32.8991 2.74546 32.4237 2.59196 31.92C2.27904 31.92 1.81068 32.5076 1.58199 32.741Z"
                              fill="#020202"/>
                        <path d="M28.323 27.9404C28.3854 27.9508 28.4477 27.9612 28.512 27.9719C28.6425 28.1819 28.6425 28.1819 28.728 28.3919C28.7674 28.3648 28.8069 28.3376 28.8475 28.3096C29.1541 28.1537 29.48 28.187 29.808 28.2239C30.0261 28.3278 30.1234 28.3925 30.2468 28.6233C30.6038 29.6556 30.0835 31.004 29.736 31.9619C29.637 32.2271 29.637 32.2271 29.52 32.4239C29.3355 32.5053 29.3355 32.5053 29.16 32.5079C29.016 32.3399 29.016 32.3399 28.9941 32.1188C29.021 31.7717 29.1105 31.4948 29.223 31.1744C29.421 30.6007 29.6179 30.0294 29.601 29.3999C29.5997 29.3358 29.5984 29.2717 29.5971 29.2057C29.5954 29.1589 29.5937 29.1121 29.592 29.0639C29.5207 29.0362 29.4494 29.0085 29.376 28.9799C28.4222 29.5487 28.1642 30.9152 27.8581 32.0157C27.8363 32.095 27.8145 32.1743 27.792 32.2559C27.6224 32.3081 27.6224 32.3081 27.432 32.3399C27.2655 32.1772 27.2655 32.1772 27.144 32.0039C27.0594 32.0472 26.9747 32.0906 26.8875 32.1352C26.5865 32.2655 26.3787 32.2758 26.064 32.1719C25.8525 32.0144 25.8525 32.0144 25.704 31.8359C25.704 31.7528 25.704 31.6696 25.704 31.5839C25.6666 31.6184 25.6292 31.6528 25.5907 31.6883C25.1446 32.0904 24.8463 32.3045 24.264 32.2559C24.034 32.1873 23.9173 32.1013 23.7375 31.9199C23.5177 31.4639 23.5656 31.0521 23.677 30.5562C23.8964 29.7893 24.2123 29.094 24.552 28.3919C24.723 28.3814 24.723 28.3814 24.912 28.3919C24.9595 28.4474 25.007 28.5028 25.056 28.5599C25.0393 29.0487 24.8938 29.3882 24.696 29.8042C24.4647 30.3132 24.3187 30.7445 24.336 31.3319C24.336 31.3874 24.336 31.4428 24.336 31.4999C24.4117 31.4791 24.4875 31.4583 24.5655 31.4369C24.6081 31.4252 24.6507 31.4135 24.6946 31.4015C25.0809 31.2167 25.2976 30.8671 25.5105 30.4657C25.5379 30.4151 25.5654 30.3645 25.5936 30.3124C25.8275 29.8742 26.0378 29.4224 26.2395 28.9631C26.3361 28.7441 26.4177 28.5673 26.568 28.3919C26.757 28.3814 26.757 28.3814 26.928 28.3919C27.0194 28.5514 27.0194 28.5514 27.072 28.8119C26.9964 29.0974 26.8792 29.3558 26.7615 29.6204C26.7002 29.7632 26.639 29.9061 26.5778 30.049C26.5502 30.1118 26.5225 30.1747 26.4939 30.2395C26.3763 30.5229 26.3436 30.7429 26.3475 31.0537C26.3482 31.1216 26.3488 31.1895 26.3495 31.2594C26.3503 31.3111 26.3511 31.3627 26.352 31.4159C26.7821 31.3915 27.0041 31.1802 27.288 30.8279C27.7659 30.1898 27.9681 29.1794 28.0496 28.3526C28.0874 27.9838 28.0874 27.9838 28.323 27.9404Z"
                              fill="#030303"/>
                        <path d="M33.552 28.1399C33.7608 28.1792 33.8304 28.2127 33.984 28.3919C33.9587 28.7577 33.8641 29.0565 33.7365 29.3894C33.5141 29.9978 33.3423 30.4944 33.48 31.1639C33.6177 31.3633 33.6177 31.3633 33.858 31.3371C34.2983 31.1916 34.4828 30.8136 34.7085 30.3711C34.848 30.1559 34.848 30.1559 35.037 30.1139C35.208 30.1559 35.208 30.1559 35.352 30.3239C35.352 30.9528 34.9417 31.3954 34.5915 31.8254C34.3175 32.1325 34.1168 32.239 33.7365 32.2874C33.3721 32.2426 33.1572 32.07 32.922 31.7466C32.8923 31.6929 32.8626 31.6392 32.832 31.5839C32.7845 31.5007 32.737 31.4176 32.688 31.3319C32.6397 31.3926 32.6397 31.3926 32.5904 31.4546C32.1259 32.0208 32.1259 32.0208 31.824 32.0879C31.4998 32.092 31.251 32.0552 30.969 31.8621C30.6494 31.4563 30.5536 31.0888 30.5711 30.5464C30.6598 29.8647 30.9878 29.3805 31.4367 28.9543C31.9804 28.5023 32.4548 28.4048 33.12 28.4759C33.1913 28.5036 33.2626 28.5313 33.336 28.5599C33.3583 28.5062 33.3806 28.4525 33.4035 28.3971C33.48 28.2239 33.48 28.2239 33.552 28.1399ZM31.464 29.9406C31.3065 30.2287 31.2535 30.4833 31.248 30.8279C31.2859 31.0682 31.2859 31.0682 31.392 31.2479C31.5166 31.3543 31.5166 31.3543 31.68 31.3319C32.4152 30.8935 32.743 30.0871 33.048 29.2319C32.9386 29.1042 32.8406 29.1213 32.688 29.1111C32.1673 29.1189 31.7777 29.4758 31.464 29.9406Z"
                              fill="#020202"/>
                        <path d="M16.56 25.6201C16.749 25.6989 16.749 25.6989 16.92 25.7881C16.8805 26.1721 16.8179 26.5168 16.704 26.8801C16.7491 26.8791 16.7942 26.8782 16.8407 26.8772C16.8995 26.8764 16.9583 26.8756 17.019 26.8749C17.0774 26.8739 17.1359 26.8729 17.1962 26.8719C17.352 26.8801 17.352 26.8801 17.496 26.9641C17.55 27.1216 17.55 27.1216 17.568 27.3001C17.5204 27.3833 17.4729 27.4664 17.424 27.5521C17.215 27.5758 17.0166 27.5866 16.8075 27.5889C16.0979 27.6041 16.0979 27.6041 15.48 27.9721C15.4254 28.1454 15.4254 28.1454 15.408 28.3081C15.4497 28.3244 15.4915 28.3406 15.5345 28.3573C15.6508 28.4026 15.767 28.4478 15.8833 28.4932C16.0246 28.5479 16.1662 28.6015 16.308 28.6546C16.488 28.7281 16.488 28.7281 16.56 28.8121C16.5629 28.9521 16.563 29.0922 16.56 29.2321C16.2152 29.4451 15.874 29.6178 15.507 29.7729C15.1432 29.9339 14.8772 30.0694 14.616 30.4081C14.5681 30.6257 14.5681 30.6257 14.544 30.8281C14.5956 30.8272 14.6471 30.8264 14.7003 30.8255C14.9332 30.822 15.1661 30.8198 15.399 30.8176C15.4802 30.8162 15.5614 30.8148 15.6451 30.8134C15.7226 30.8128 15.8001 30.8123 15.8799 30.8117C15.9515 30.8108 16.0232 30.81 16.097 30.809C16.272 30.8281 16.272 30.8281 16.416 30.9961C16.4385 31.2061 16.4385 31.2061 16.416 31.4161C16.0648 31.6893 15.7518 31.6776 15.336 31.6681C15.3281 31.7159 15.3202 31.7636 15.3121 31.8128C15.2367 32.2413 15.1349 32.616 14.976 33.0121C14.805 33.0226 14.805 33.0226 14.616 33.0121C14.5684 32.9567 14.5209 32.9012 14.472 32.8441C14.4974 32.458 14.5742 32.1149 14.688 31.7521C14.6377 31.7247 14.5874 31.6973 14.5355 31.6691C14.47 31.6324 14.4045 31.5957 14.337 31.5579C14.2718 31.5218 14.2067 31.4858 14.1395 31.4486C13.968 31.3321 13.968 31.3321 13.824 31.0801C13.7619 30.7194 13.7602 30.3847 13.9064 30.0534C14.2449 29.5547 14.7002 29.3128 15.192 29.0641C15.1355 29.0139 15.0791 28.9636 15.021 28.9119C14.7892 28.6866 14.6981 28.5533 14.652 28.2031C14.7006 27.7776 14.839 27.5699 15.12 27.3001C15.437 27.0829 15.6858 26.9641 16.056 26.9641C16.0678 26.891 16.0678 26.891 16.0799 26.8165C16.1503 26.4118 16.2316 26.0625 16.416 25.7041C16.4635 25.6764 16.511 25.6487 16.56 25.6201Z"
                              fill="#020202"/>
                        <path d="M21.672 25.5361C21.816 25.5325 21.9601 25.5326 22.104 25.5361C22.176 25.6201 22.176 25.6201 22.1786 25.7629C22.1267 26.4836 21.9529 27.1637 21.7845 27.8562C21.7525 27.99 21.7205 28.1238 21.6885 28.2576C21.6048 28.6075 21.5204 28.9571 21.4358 29.3067C21.3496 29.6633 21.2642 30.0202 21.1787 30.3771C21.0539 30.8974 20.9289 31.4176 20.8033 31.9376C20.7781 32.042 20.7529 32.1463 20.7269 32.2538C20.6849 32.4236 20.6399 32.5924 20.592 32.7601C21.1038 32.5977 21.5783 32.3849 22.059 32.1248C22.1221 32.0913 22.1851 32.0578 22.25 32.0233C22.58 31.8481 22.58 31.8481 22.9041 31.6586C23.0799 31.5622 23.2081 31.5605 23.4 31.5841C23.4713 31.6672 23.4713 31.6672 23.544 31.7521C23.5365 31.9569 23.5365 31.9569 23.472 32.1721C23.034 32.6154 22.4236 32.8587 21.8925 33.1118C21.7837 33.1653 21.7837 33.1653 21.6728 33.2199C20.3706 33.8481 20.3706 33.8481 19.872 33.6841C19.8483 33.6564 19.8245 33.6286 19.8 33.6001C19.8241 32.793 20.0287 32.0392 20.218 31.2684C20.2529 31.1243 20.2878 30.9803 20.3227 30.8362C20.3955 30.5354 20.4688 30.2348 20.5424 29.9343C20.6363 29.5506 20.7295 29.1666 20.8225 28.7826C20.8944 28.4854 20.9666 28.1884 21.0389 27.8914C21.0733 27.7499 21.1077 27.6084 21.1421 27.4669C21.1902 27.2686 21.2387 27.0706 21.2873 26.8725C21.3012 26.815 21.3151 26.7574 21.3295 26.6982C21.427 26.3024 21.5449 25.9203 21.672 25.5361Z"
                              fill="#030303"/>
                        <path d="M16.488 36.0361C16.7019 36.0777 16.7019 36.0777 16.92 36.1201C16.9676 36.0924 17.0151 36.0646 17.064 36.0361C17.5711 35.9779 17.5711 35.9779 17.8515 36.2146C18.0195 36.4877 18.072 36.6247 18.072 36.9601C17.9897 37.2584 17.9105 37.4777 17.73 37.7108C17.5016 37.8367 17.3132 37.8216 17.064 37.8001C17.0165 37.7724 16.969 37.7446 16.92 37.7161C16.8963 37.9101 16.8725 38.1042 16.848 38.3041C16.7292 38.3041 16.6104 38.3041 16.488 38.3041C16.488 37.5556 16.488 36.8072 16.488 36.0361ZM16.929 36.4666C16.8081 36.7017 16.8151 36.8591 16.848 37.1281C16.9546 37.3434 16.9546 37.3434 17.136 37.4641C17.3617 37.4716 17.3617 37.4716 17.568 37.3801C17.7346 37.0887 17.7426 36.9666 17.712 36.6241C17.64 36.4561 17.64 36.4561 17.496 36.3721C17.2693 36.339 17.1275 36.3277 16.929 36.4666Z"
                              fill="#030303"/>
                        <path d="M5.25598 36.708C6.6103 36.708 7.96462 36.708 9.35998 36.708C9.35998 36.8466 9.35998 36.9852 9.35998 37.128C8.00566 37.128 6.65134 37.128 5.25598 37.128C5.25598 36.9894 5.25598 36.8508 5.25598 36.708Z"
                              fill="#010101"/>
                        <path d="M26.64 36.3721C27.9943 36.3721 29.3487 36.3721 30.744 36.3721C30.744 36.5107 30.744 36.6493 30.744 36.7921C29.3897 36.7921 28.0354 36.7921 26.64 36.7921C26.64 36.6535 26.64 36.5149 26.64 36.3721Z"
                              fill="#010101"/>
                        <path d="M14.76 36.0359C14.9382 36.0775 14.9382 36.0775 15.12 36.1199C15.1675 36.0922 15.215 36.0645 15.264 36.0359C15.7673 35.9782 15.7673 35.9782 16.0515 36.2039C16.2499 36.5406 16.272 36.719 16.272 37.1279C16.1603 37.4365 16.0213 37.6395 15.768 37.7999C15.4823 37.8347 15.2933 37.8081 15.048 37.6319C15.048 37.8537 15.048 38.0755 15.048 38.3039C14.953 38.3039 14.8579 38.3039 14.76 38.3039C14.76 37.5555 14.76 36.8071 14.76 36.0359ZM15.1695 36.5137C15.0367 36.6975 15.0367 36.6975 15.012 36.9179C15.0606 37.2014 15.1321 37.3012 15.336 37.4639C15.5594 37.4847 15.5594 37.4847 15.768 37.3799C15.923 37.1999 15.923 37.1999 15.984 36.9599C15.9255 36.6933 15.8629 36.5667 15.696 36.3719C15.4576 36.328 15.3664 36.3461 15.1695 36.5137Z"
                              fill="#040404"/>
                        <path d="M22.104 36.036C22.32 36.2093 22.32 36.2093 22.464 36.456C22.4878 36.6501 22.5115 36.8441 22.536 37.044C22.1558 37.044 21.7757 37.044 21.384 37.044C21.479 37.1549 21.5741 37.2658 21.672 37.38C21.9119 37.3639 21.9119 37.3639 22.104 37.212C22.224 37.2086 22.344 37.2084 22.464 37.212C22.3636 37.4953 22.2651 37.653 22.032 37.8C21.7097 37.8557 21.567 37.827 21.285 37.632C21.0814 37.3605 21.0278 37.2259 21.0114 36.8757C21.0315 36.6084 21.1138 36.4248 21.24 36.204C21.5298 35.9786 21.7636 35.9691 22.104 36.036ZM21.4605 36.4875C21.3774 36.6086 21.3774 36.6086 21.384 36.708C21.6454 36.708 21.9067 36.708 22.176 36.708C22.1522 36.6249 22.1285 36.5417 22.104 36.456C21.766 36.3517 21.766 36.3517 21.4605 36.4875Z"
                              fill="#030303"/>
                        <path d="M19.224 36.0361C19.2715 36.0915 19.319 36.147 19.368 36.2041C19.3917 36.1486 19.4155 36.0932 19.44 36.0361C19.535 36.0361 19.63 36.0361 19.728 36.0361C19.728 36.5905 19.728 37.1449 19.728 37.7161C19.6092 37.6884 19.4904 37.6606 19.368 37.6321C19.2967 37.6875 19.2254 37.743 19.152 37.8001C18.8487 37.8394 18.6994 37.8392 18.441 37.6426C18.225 37.3907 18.2006 37.2401 18.189 36.8918C18.1933 36.5766 18.2086 36.4699 18.3555 36.1936C18.6439 35.9875 18.8923 35.9639 19.224 36.0361ZM18.5805 36.5033C18.471 36.7964 18.5082 36.9911 18.576 37.2961C18.7794 37.491 18.7794 37.491 19.0125 37.4483C19.2454 37.4021 19.2454 37.4021 19.368 37.1281C19.3914 36.866 19.4048 36.6957 19.287 36.4666C19.0374 36.2919 18.8083 36.289 18.5805 36.5033Z"
                              fill="#030303"/>
                        <path d="M13.536 36.0256C13.585 36.0271 13.634 36.0286 13.6845 36.0302C13.7536 36.0331 13.7536 36.0331 13.824 36.0361C13.8953 36.0361 13.9666 36.0361 14.04 36.0361C14.135 36.0361 14.2301 36.0361 14.328 36.0361C14.328 36.5905 14.328 37.1449 14.328 37.7161C14.1854 37.7161 14.0429 37.7161 13.896 37.7161C13.8485 37.7438 13.801 37.7715 13.752 37.8001C13.4582 37.8468 13.3387 37.8133 13.0815 37.6321C12.8733 37.4065 12.8187 37.2028 12.8033 36.8758C12.8235 36.6085 12.9058 36.4249 13.032 36.2041C13.2518 36.0331 13.2904 36.0158 13.536 36.0256ZM13.257 36.4614C13.1283 36.7199 13.1448 36.9205 13.176 37.2121C13.2882 37.3925 13.2882 37.3925 13.464 37.4641C13.6656 37.4526 13.7866 37.4063 13.959 37.2856C14.0911 37.0287 14.0249 36.821 13.968 36.5401C13.8327 36.347 13.8327 36.347 13.6125 36.3459C13.3984 36.3539 13.3984 36.3539 13.257 36.4614Z"
                              fill="#030303"/>
                        <path d="M20.088 36.0359C20.2662 36.0775 20.2662 36.0775 20.448 36.1199C20.6166 36.0973 20.7849 36.0703 20.952 36.0359C20.952 36.1468 20.952 36.2576 20.952 36.3719C20.8956 36.3909 20.8392 36.41 20.781 36.4296C20.5844 36.5199 20.5844 36.5199 20.502 36.7131C20.4294 37.0447 20.4002 37.3753 20.376 37.7159C20.281 37.7159 20.1859 37.7159 20.088 37.7159C20.088 37.1615 20.088 36.6071 20.088 36.0359Z"
                              fill="#080808"/>
                        <path d="M22.752 35.448C22.847 35.448 22.942 35.448 23.04 35.448C23.04 36.1964 23.04 36.9449 23.04 37.716C22.9449 37.716 22.8499 37.716 22.752 37.716C22.752 36.9676 22.752 36.2191 22.752 35.448Z"
                              fill="#020202"/>
                    </svg>

                </div>
                <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-200">Welcome Back</h3>

                <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Login as an administrator</p>

                <div class="w-full mt-4">
                    <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                           type="text" name="email" placeholder="Email Address" aria-label="Email Address"
                           value="<?=
                               $email
                               ?? '' ?>"/>
                </div>
                <p class="font-inter text-red-500 text-sm"><?= $errors['email'] ?? '' ?></p>

                <div class="w-full mt-4">
                    <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                           type="password" name="password" placeholder="Password" aria-label="Password"/>
                </div>
                <p class="font-inter text-red-500 text-sm"><?= $errors['password'] ?? '' ?></p>

                <div class="flex items-center justify-between mt-4">
                    <button class="px-6 py-2 w-full text-sm font-medium tracking-wide text-white capitalize
                        font-inter
                        transition-colors duration-300 transform bg-orange-500 rounded-lg hover:bg-orange-700
                        focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>
                <p class="font-inter text-red-500 text-sm text-center"><?= $errors['body'] ?? '' ?></p>

            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
