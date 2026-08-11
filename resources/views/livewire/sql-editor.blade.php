<div class="flex flex-col h-full bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="h-1/3 flex flex-col border-b border-gray-200 dark:border-gray-700 shrink-0">
        <div class="bg-[#272822] text-gray-300 px-4 py-2 flex justify-between items-center text-sm font-mono shrink-0">
            <span>SQL Editor ({{ $connection }})</span>
            <button wire:click="runQuery" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-1.5 rounded-md text-xs font-semibold transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 focus:ring-offset-[#272822]">Run Query (F5)</button>
        </div>
        <div class="flex-1 relative min-h-0" wire:ignore x-data="{
            query: @entangle('query'),
            init() {
                let editor = CodeMirror.fromTextArea(this.$refs.editor, {
                    mode: 'text/x-sql',
                    theme: 'monokai',
                    lineNumbers: true,
                    indentWithTabs: true,
                    smartIndent: true,
                    autofocus: true
                });
                editor.setSize('100%', '100%');
                editor.on('change', (cm) => {
                    this.query = cm.getValue();
                });
                editor.setOption('extraKeys', {
                    'F5': () => { @this.call('runQuery') },
                    'Cmd-Enter': () => { @this.call('runQuery') },
                    'Ctrl-Enter': () => { @this.call('runQuery') }
                });
                this.$watch('query', (value) => {
                    if (value !== editor.getValue()) {
                        editor.setValue(value);
                    }
                });
            }
        }">
            <textarea x-ref="editor"></textarea>
        </div>
    </div>
    
    <div class="flex-1 overflow-auto bg-gray-50 dark:bg-gray-900 flex flex-col relative min-h-0">
        @if($error)
            <div class="p-4 bg-red-50 dark:bg-red-900/50 text-red-800 dark:text-red-200 font-mono text-sm border-b border-red-200 dark:border-red-800/50">
                {{ $error }}
            </div>
        @endif

        @if($results !== null)
            <div class="px-4 py-2 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-xs text-gray-500 dark:text-gray-400 flex justify-between shrink-0 sticky top-0 z-20">
                <span>{{ count($results) }} rows returned</span>
                <span>Execution time: {{ $executionTime }}ms</span>
            </div>
            
            <div class="overflow-auto flex-1">
                @if(count($results) > 0)
                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300 whitespace-nowrap">
                        <thead class="text-xs text-gray-700 dark:text-gray-400 uppercase bg-gray-100 dark:bg-gray-700 sticky top-0 z-10 shadow-sm">
                            <tr>
                                @foreach(array_keys($results[0]) as $col)
                                    <th scope="col" class="px-4 py-3 border-r border-gray-200 dark:border-gray-600 last:border-r-0">{{ $col }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $row)
                                <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    @foreach($row as $val)
                                        <td class="px-4 py-2 border-r border-gray-100 dark:border-gray-700 last:border-r-0 max-w-sm truncate" title="{{ is_string($val) ? $val : json_encode($val) }}">
                                            {{ is_null($val) ? 'NULL' : (is_string($val) ? \Illuminate\Support\Str::limit($val, 50) : json_encode($val)) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-4 text-gray-500 dark:text-gray-400 text-sm">Query executed successfully. 0 rows returned.</div>
                @endif
            </div>
        @else
            <div class="flex flex-col h-full items-center justify-center text-gray-400 dark:text-gray-500 p-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <p>Run a query to see results</p>
            </div>
        @endif
    </div>
</div>
