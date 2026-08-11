<?php

namespace LaravelEgypt\DataLens\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use LaravelEgypt\DataLens\ConnectionResolver;
use Illuminate\Support\Facades\Config;

class DatalensIndex extends Component
{
    public $selectedConnection = null;
    public $selectedTable = null;
    public $activeView = null;
    
    public function mount()
    {
        $this->selectedConnection = Config::get('database.default');
    }

    public function updatedSelectedConnection()
    {
        $this->selectedTable = null;
        $this->activeView = null;
        $this->dispatch('connection-changed', connection: $this->selectedConnection);
    }

    #[On('table-selected')]
    public function selectTable($table)
    {
        $this->selectedTable = $table;
        $this->activeView = 'table';
    }

    #[On('sql-editor-selected')]
    public function openSqlEditor()
    {
        $this->selectedTable = null;
        $this->activeView = 'sql';
    }

    public function openSettings()
    {
        $this->selectedTable = null;
        $this->activeView = 'settings';
    }

    public function render()
    {
        $connections = ConnectionResolver::getAvailableConnections();
        
        return view('datalens::livewire.datalens-index', [
            'connections' => $connections,
        ])->layout('datalens::layouts.app');
    }
}
