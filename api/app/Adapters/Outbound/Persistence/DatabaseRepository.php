<?php

namespace App\Adapters\Outbound\Persistence;

use Illuminate\Support\Facades\DB;

abstract class DatabaseRepository
{
    protected function table(string $tableName)
    {
        $driver = DB::connection()->getDriverName();
        $schema = config('database.connections.pgsql.schema', 'library');
        $fullTable = ($driver === 'pgsql') ? "{$schema}.{$tableName}" : $tableName;

        return DB::table($fullTable);
    }
}
