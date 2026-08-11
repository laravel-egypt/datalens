<div class="max-w-3xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white shadow sm:rounded-lg dark:bg-gray-800">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Settings</h3>
            
            <div class="mb-6">
                <h4 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Theme</h4>
                <div class="flex items-center space-x-4">
                    <button 
                        @click="$dispatch('set-theme', 'light')"
                        :class="theme === 'light' ? 'bg-indigo-600 text-white border-transparent' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600'"
                        class="inline-flex items-center px-4 py-2 border rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Light
                    </button>
                    <button 
                        @click="$dispatch('set-theme', 'dark')"
                        :class="theme === 'dark' ? 'bg-indigo-600 text-white border-transparent' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600'"
                        class="inline-flex items-center px-4 py-2 border rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Dark
                    </button>
                    <button 
                        @click="$dispatch('set-theme', 'system')"
                        :class="theme === 'system' ? 'bg-indigo-600 text-white border-transparent' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600'"
                        class="inline-flex items-center px-4 py-2 border rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        System
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>
