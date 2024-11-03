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

    <!--    Chat Content -->
    <div class="w-full h-fit sm:h-[90%] grid sm:grid-cols-[20%_78%] gap-4 mb-2">
        <!--        Chat Sidebar-->
        <div class="w-full p-4 bg-white border border-gray-200 sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Messages</h5>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">

                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 cursor-pointer dark:divide-gray-700">
                    <?php foreach ($users as $user) : ?>
                        <li class="<?= $user['user_id'] == substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY),
                            5) ? 'bg-gray-200' : 'bg-white' ?> py-3 px-1 sm:py-4 hover:bg-gray-100 rounded-md">
                            <a href="/messages?chat=<?= $user['user_id'] ?>" class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full"
                                         src="/public/uploads/<?= htmlspecialchars($user['name'] ?? '')
                                         ?>"
                                         alt="profile picture">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        <?= htmlspecialchars(ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name']) ?? '') ?>
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        <?= htmlspecialchars($user['email'] ?? '') ?>
                                    </p>
                                </div>

                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!--        Main Chat Window-->
        <div class="grid h-[90svh] sm:grid grid-rows-[10%_80%_10%] w-full bg-white border border-gray-200">
            <!--            User Details-->
            <div class="p-3 sm:p-4 w-full flex justify-between border-b border-gray-50">
                <div class="flex items-center ">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full"
                             src="/public/uploads/<?= htmlspecialchars($current_chat_mate['name'] ?? '')
                             ?>"
                             alt="profile picture">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-md font-semibold text-gray-900 truncate dark:text-white">
                            <?= htmlspecialchars(ucfirst($current_chat_mate['first_name']) . ' ' . ucfirst($current_chat_mate['last_name'])) ?>
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            Online
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">

                    </div>
                </div>
                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                        data-dropdown-placement="bottom-start"
                        class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                        type="button">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                        <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                    </svg>
                </button>
                <div id="dropdownDots"
                     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownMenuIconButton">
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reply</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Forward</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--            Message Content-->
            <div id="messages" class="message-container overflow-auto p-3 bg-white sm:p-4 w-full flex flex-col gap-2">
                <?php foreach ($chat_history as $message) : ?>
                    <?php if ($message['sender_id'] == intval($_GET['chat'])) : ?>
                        <!--                Chat Mate Message-->
                        <div class="flex items-start gap-2.5">
                            <img class="w-8 h-8 rounded-full"
                                 src="/public/uploads/<?= htmlspecialchars($current_chat_mate['name'] ?? '')
                                 ?>" alt="profile picture">
                            <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-gray-900 dark:text-white"><?=
                                    htmlspecialchars(ucfirst($current_chat_mate['first_name']) . ' ' . ucfirst($current_chat_mate['last_name']) ?? '') ?></span>
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?= date('h:i A',
                                            strtotime($message['sent_at'])) ?? ''
                                        ?></span>
                                </div>
                                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white"><?=
                                    htmlspecialchars($message['message_text'] ?? '') ?></p>
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                            </div>
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                    data-dropdown-placement="bottom-start"
                                    class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                                    type="button">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                            </button>
                        </div>
                    <?php else: ?>
                        <!--                Your Message-->
                        <div class="flex items-start gap-2.5 self-end">
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                    data-dropdown-placement="bottom-start"
                                    class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                                    type="button">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                            </button>
                            <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Me</span>
                                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white"><?=
                                    htmlspecialchars($message['message_text']) ?></p>
                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?= date('h:i A', strtotime($message['sent_at']))
                                        ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!--            Chat Form-->
            <form method="POST" id="message-form" class="w-full h-full">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="chat" value="<?= $_GET['chat'] ?>">
                <label for="chat" class="sr-only">Your message</label>
                <div class="w-full h-full flex items-center px-3 py-2 rounded-lg dark:bg-gray-700">
                    <button type="button"
                            class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 20 18">
                            <path fill="currentColor"
                                  d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                        </svg>
                        <span class="sr-only">Upload image</span>
                    </button>
                    <button type="button"
                            class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z"/>
                        </svg>
                        <span class="sr-only">Add emoji</span>
                    </button>
                    <textarea id="chat" rows="1" name="message"
                              class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Your message..."></textarea>
                    <button type="submit"
                            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                        <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                        </svg>
                        <span class="sr-only">Send message</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        let pusher = new Pusher('34b64d396c60eab0c004', {
            cluster: 'ap1',
            forceTLS: true
        });

        let messageDiv = document.getElementById('messages');
        const myId = parseInt(<?= $admin['user_id'] ?>);
        const chatMateId = parseInt(Object.fromEntries(new URLSearchParams(window.location.search)).chat);
        const sortedId = [myId, chatMateId].sort((a, b) => a - b);
        const chatChannel = `chat-channel-${sortedId[0]}-${sortedId[1]}`

        function scrollToBottom() {
            messageDiv.scrollTop = messageDiv.scrollHeight;
        }

        //Subscribe to a channel
        let channel = pusher.subscribe(chatChannel);

        // Look out for messages in this channel
        channel.bind('message-sent', function (data) {
            let messageContainer = document.getElementById('messages');

            const options = {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            };

            if (data.sender_id === myId) {
                let senderDiv = `
                    <div class="flex items-start gap-2.5 self-end">
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                    data-dropdown-placement="bottom-start"
                                    class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                                    type="button">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                            </button>
                            <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Me</span>
                                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">${data.message}</p>
                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">${new Date()
                    .toLocaleTimeString([], options)}</span>
                                </div>
                            </div>
                        </div>
                `;
                messageContainer.innerHTML += senderDiv;
            } else {
                let recipientDiv = `
                    <div class="flex items-start gap-2.5">
                        <img class="w-8 h-8 rounded-full" src="/public/uploads/<?= htmlspecialchars($current_chat_mate['name'] ?? '')
                ?>" alt="profile picture">
                        <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-gray-900 dark:text-white"><?=
                htmlspecialchars(ucfirst($current_chat_mate['first_name']) . ' ' . ucfirst($current_chat_mate['last_name']) ?? '') ?></span>
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">${new Date()
                    .toLocaleTimeString([], options)}</span>
                            </div>
                            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">${data.message}</p>
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                        </div>
                        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                data-dropdown-placement="bottom-start"
                                class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                                type="button">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                            </svg>
                        </button>
                    </div>
                `;
                messageContainer.innerHTML += recipientDiv;
            }

            scrollToBottom();
        });

        window.addEventListener('load', scrollToBottom);

        document.getElementById('message-form').addEventListener('submit', function (e) {
            e.preventDefault();

            let messageInput = document.querySelector('textarea[name="message"]');
            let message = messageInput.value;

            if (message.trim() !== '') {
                axios.post(window.location.href, {
                    message: message,
                    _token: document.querySelector('input[name="_token"]').value
                })
                    .then(function (response) {
                        console.log('Response:', response.data);
                        messageInput.value = '';
                    })
                    .catch(function (error) {
                        console.error('Error sending message:', error);
                    });
            }
        });
    </script>
    <?php
    require base_path("Http/views/partials/footer.php");
    ?>
