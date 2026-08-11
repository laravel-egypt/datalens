<?php

namespace LaravelEgypt\DataLens\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SqlEditor extends Component
{
    public $connection;
    public $query = '';
    public $results = null;
    public $error = null;
    public $executionTime = 0;

    public function mount($connection)
    {
        $this->connection = $connection;
    }

    public function runQuery()
    {
        $this->error = null;
        $this->results = null;
        $start = microtime(true);
        
        if (empty(trim($this->query))) {
            $this->error = "Query cannot be empty.";
            return;
        }

        try {
            $this->results = DB::connection($this->connection)->select($this->query);
            $this->results = json_decode(json_encode($this->results), true);
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }
        
        $this->executionTime = round((microtime(true) - $start) * 1000, 2);
    }

    public function render()
    {
        return view('datalens::livewire.sql-editor');
    }
}
