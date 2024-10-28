<div x-show="isOpen" x-data="{ isOpen: true, currentSection: 1 }"
     class="fixed inset-0 z-50 m-auto w-10/12 overflow-auto flex items-center justify-center">
    <!-- Backdrop -->
    <div x-cloak x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"
         @click="isOpen = false">
    </div>

    <!-- Modal -->
    <div x-cloak x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
         @click.away="isOpen = false">

        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <!-- Section 1 -->
            <div x-show="currentSection === 1">
                <img class="object-cover w-full h-48 rounded-md"
                     src="https://images.unsplash.com/photo-1579226905180-636b76d96082?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                     alt="">

                <div class="mt-4 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Welcome back <?= $success ?? '' ?>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Welcome to your dashboard. Here, we allow the administrator to manage the state of Sol & Luna Apparel.
                    </p>
                </div>
            </div>

            <!-- Section 2 -->
            <div x-show="currentSection === 2">
                <img class="object-cover w-full h-48 rounded-md"
                     src="https://images.pexels.com/photos/8872665/pexels-photo-8872665.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="">
                <div class="mt-4 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Discover Our Features
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        In this dashboard, the administrator can oversee the state of products, orders, customers, reports and messages.
                    </p>
                </div>
            </div>

            <!-- Section 3 -->
            <div x-show="currentSection === 3">
                <img class="object-cover w-full h-48 rounded-md"
                     src="https://images.pexels.com/photos/927022/pexels-photo-927022.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                     alt="">
                <div class="mt-4 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Get Started
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        That's pretty much it, be careful and have fun. <3 <br>
                        -Shimi & Palo
                    </p>
                </div>
            </div>

            <!-- Dots -->
            <div class="flex justify-center mt-4">
                <button :class="{ 'bg-orange-500': currentSection === 1, 'bg-gray-200': currentSection !== 1 }"
                        class="w-2 h-2 mx-1 rounded-full focus:outline-none"
                        @click="currentSection = 1"></button>
                <button :class="{ 'bg-orange-500': currentSection === 2, 'bg-gray-200': currentSection !== 2 }"
                        class="w-2 h-2 mx-1 rounded-full focus:outline-none"
                        @click="currentSection = 2"></button>
                <button :class="{ 'bg-orange-500': currentSection === 3, 'bg-gray-200': currentSection !== 3 }"
                        class="w-2 h-2 mx-1 rounded-full focus:outline-none"
                        @click="currentSection = 3"></button>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button x-show="currentSection < 3"
                    @click="currentSection++"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-500 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                Next
            </button>
            <button x-show="currentSection === 3"
                    @click="isOpen = false"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-500 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                Get Started
            </button>
            <button @click="isOpen = false"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Skip
            </button>
        </div>
    </div>
</div>