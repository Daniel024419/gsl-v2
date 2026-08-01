<?php

namespace App\Support;

class SimplePaginator
{
    public static function slice(array $items, int $page, int $perPage): array
    {
        $page = max(1, $page);

        return array_values(array_slice($items, ($page - 1) * $perPage, $perPage));
    }

    public static function totalPages(array $items, int $perPage): int
    {
        if (empty($items)) {
            return 1;
        }

        return max(1, (int) ceil(count($items) / $perPage));
    }
}
