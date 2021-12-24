<?php

namespace App\Http\Requests;

use App\DTO\RideDto;
use Illuminate\Foundation\Http\FormRequest;

class RideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['nullable', 'numeric'],
            'hourly_rate' => ['required', 'numeric', 'gt:0'],
            'day_rate' => ['required', 'numeric', 'gt:0'],
            'no_of_doors' => ['required', 'numeric', 'gte:0'],
            'picture' => ['nullable', 'image', 'max:2048', 'mimes:jpg,png'],
            'is_active' => ['required', 'boolean'],
        ];
    }

    public function getData(): RideDto
    {
        return new RideDto(
            null,
            $this->get('hourly_rate'),
            $this->get('day_rate'),
            $this->get('no_of_doors'),
            $this->get('is_active'),
            $this->file('picture'),
        );
    }
}
