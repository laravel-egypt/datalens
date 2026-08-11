<div class="flex flex-col h-full overflow-hidden">
    <!-- Top Header -->
    <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-3 flex items-center justify-between shadow-sm z-10 shrink-0">
        <div class="flex items-center gap-2 text-indigo-600 dark:text-indigo-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
            </svg>
            <h1 class="text-xl font-bold tracking-tight text-gray-800 dark:text-white">DataLens</h1>
        </div>
        
        <div class="flex items-center gap-4">
            <button wire:click="openSettings" class="p-1 rounded-full text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" title="Settings">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
            <div class="h-6 border-l border-gray-300 dark:border-gray-600"></div>
            <label for="connection-selector" class="text-sm font-medium text-gray-600 dark:text-gray-300">Connection:</label>
            <select 
                id="connection-selector" 
                wire:model.live="selectedConnection" 
                class="block w-64 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 dark:text-white dark:bg-gray-700 ring-1 ring-inset ring-gray-300 dark:ring-gray-600 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
            >
                @foreach($connections as $key => $details)
                    <option value="{{ $key }}">
                        {{ $key }} ({{ $details['driver'] }}) @if($details['is_default']) [Default] @endif
                    </option>
                @endforeach
            </select>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <div class="w-72 flex-shrink-0 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 overflow-y-auto">
            <livewire:datalens::sidebar :connection="$selectedConnection" :selected-table="$selectedTable" :active-view="$activeView" wire:key="sidebar-{{ $selectedConnection }}" />
        </div>

        <!-- Main Content Area -->
        <main class="flex-1 bg-gray-50 dark:bg-gray-900 p-6 flex flex-col overflow-y-auto min-h-0">
            @if($activeView === 'table' && $selectedTable)
                <livewire:datalens::table-viewer 
                    :connection="$selectedConnection" 
                    :table="$selectedTable" 
                    wire:key="table-{{ $selectedConnection }}-{{ $selectedTable }}" 
                />
            @elseif($activeView === 'sql')
                <livewire:datalens::sql-editor 
                    :connection="$selectedConnection" 
                    wire:key="sql-{{ $selectedConnection }}" 
                />
            @elseif($activeView === 'settings')
                <livewire:datalens::settings />
            @else
                <div class="flex h-full flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <p class="text-lg font-medium">Select a table to view its data</p>
                    <p class="text-sm mt-1">Choose a table from the sidebar on the left</p>
                </div>
            @endif
        </main>
    </div>
</div>
