<?php

namespace LaravelEgypt\DataLens;

use Illuminate\Support\Facades\Config;

class ConnectionResolver
{
    public static function getAvailableConnections(): array
    {
        $connections = Config::get('database.connections', []);
        $default = Config::get('database.default');
        $validDrivers = ['mysql', 'pgsql', 'sqlite', 'sqlsrv'];
        
        $available = [];
        
        foreach ($connections as $key => $config) {
            if (isset($config['driver']) && in_array($config['driver'], $validDrivers)) {
                $available[$key] = [
                    'driver' => $config['driver'],
                    'database' => $config['database'] ?? null,
                    'is_default' => $key === $default,
                ];
            }
        }
        
        return $available;
    }
}
