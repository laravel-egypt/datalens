<div class="h-full flex flex-col bg-white dark:bg-gray-800">
    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
        <button 
            wire:click="openSqlEditor" 
            class="w-full mb-4 flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $activeView === 'sql' ? 'ring-2 ring-offset-2 ring-indigo-500' : '' }}"
        >
            <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
            SQL Editor
        </button>
        <h2 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Tables</h2>
        <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
            </div>
            <input 
                wire:model.live="search" 
                type="text" 
                class="block w-full rounded-md border-0 py-1.5 pl-10 pr-3 text-gray-900 dark:text-white dark:bg-gray-700 ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                placeholder="Search tables..."
            >
        </div>
    </div>
    <ul class="flex-1 overflow-y-auto py-2">
        @forelse($tables as $table)
            <li>
                <button 
                    wire:click="selectTable('{{ $table }}')" 
                    class="w-full text-left px-4 py-2 text-sm transition-colors duration-150 {{ $activeView === 'table' && $selectedTable === $table ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 font-medium border-r-4 border-indigo-600' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-white' }}"
                >
                    <div class="flex items-center">
                        <svg class="mr-2 h-4 w-4 {{ $activeView === 'table' && $selectedTable === $table ? 'text-indigo-500' : 'text-gray-400' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <span class="truncate">{{ $table }}</span>
                    </div>
                </button>
            </li>
        @empty
            <li class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 italic text-center">
                No tables found.
            </li>
        @endforelse
    </ul>
</div>
