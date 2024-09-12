<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePredictionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'predictor_game_id' => 'exists:predictor_games,id',
            'score_home' => 'integer',
            'score_away' => 'integer',
            'selection' => 'in:1,X,2',
        ];
    }
}
