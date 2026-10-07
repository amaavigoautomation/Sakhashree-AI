<?php

namespace App\Support;

use Illuminate\Validation\Rule;

class ValidationRules
{
    public static function title(
        string $table,
        ?int $ignoreId = null
    ): array {
        return [
            'required',
            'string',
            'max:255',
            'regex:/\S/',
            Rule::unique($table, 'title')->ignore($ignoreId),
        ];
    }
}
