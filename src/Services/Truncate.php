<?php declare(strict_types=1);

namespace Hyvor\LaravelE2E\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Truncate
{

    /**
     * @param array<null | string> $connections
     */
    public function truncate(array $connections = [null]) : void
    {

        foreach ($connections as $connection) {
            $this->truncateTablesOfConnection($connection);
        }

    }

    private function truncateTablesOfConnection(?string $connection) : void
    {

        $tables = Schema::connection($connection)->getTableListing();
        Schema::disableForeignKeyConstraints();

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        Schema::enableForeignKeyConstraints();

    }

}