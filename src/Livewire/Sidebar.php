<?php

namespace LaravelEgypt\DataLens\Livewire;

use Livewire\Component;
use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class Sidebar extends Component
{
    public $connection;
    public $search = '';
    
    #[Reactive]
    public $selectedTable;

    #[Reactive]
    public $activeView;

    public function selectTable($table)
    {
        $this->dispatch('table-selected', table: $table);
    }

    public function openSqlEditor()
    {
        $this->dispatch('sql-editor-selected');
    }

    public function render()
    {
        $tables = [];
        
        try {
            $schemaTables = Schema::connection($this->connection)->getTableListing();
            
            foreach ($schemaTables as $table) {
                if (empty($this->search) || stripos($table, $this->search) !== false) {
                    $tables[] = $table;
                }
            }
        } catch (\Exception $e) {
            Log::error('DataLens Sidebar Error: ' . $e->getMessage());
        }

        return view('datalens::livewire.sidebar', [
            'tables' => $tables,
        ]);
    }
}
