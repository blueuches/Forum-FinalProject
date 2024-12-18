<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoProfanity implements ValidationRule
{
    protected $badWords = [
        'yawa','yw', 'bwesit', 'piste','pisti', 'animal','animala', 'gagu', 
        'gago', 'puta', 'putangina','tangina', 'kolera', 'bobo','klr', 'buang','boang','bulok',
        'kayasa','ataya','giatay','gi-atay','shit','fuck','boyshet','bullshit','pisteng','burikat',
        'borikat','bogo','motherfucker','bitch','dick','cunt','ass','asshole','damn',
    ];

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($this->badWords as $badWord) {
            if (stripos($value, $badWord) !== false) {
                $fail('The ' . $attribute . ' contains inappropriate language.');
            }
        }
    }
}
