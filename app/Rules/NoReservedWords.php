<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoReservedWords implements ValidationRule
{
    /**
     * Words that are not allowed in the title (e.g. reserved or placeholder).
     *
     * @var array<int, string>
     */
    protected array $reservedWords = [
        'spam',
        'test',
        'admin',
        'draft',
        'undefined',
        'pmx'
    ];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value)) {
            return;
        }

        $lower = strtolower($value);

        foreach ($this->reservedWords as $word) {
            // Match whole word only (word boundary)
            if (preg_match('/\b' . preg_quote($word, '/') . '\b/i', $lower)) {
                $fail(__('validation.no_reserved_words', ['attribute' => $attribute, 'word' => $word]));
                return;
            }
        }
    }

    /**
     * Set custom reserved words (optional, for flexibility).
     *
     * @param  array<int, string>  $words
     * @return $this
     */
    public function reservedWords(array $words): static
    {
        $this->reservedWords = $words;
        return $this;
    }
}
