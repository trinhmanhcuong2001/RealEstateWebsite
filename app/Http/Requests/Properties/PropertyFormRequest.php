<?php

namespace App\Http\Requests\Properties;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'price' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Không được để trống tiêu đề',
            'description.required' => 'Không thể để trống mô tả',
            'address.required' => 'Không thể để trống địa chỉ',
            'price.required' => 'Không thể để trống giá',
            'bedroom.required' => 'Không thể để trống số phòng ngủ',
            'bathroom.required' => 'Không thể để trống số phòng tắm',
            'lat.required' => 'Vui lòng thêm tọa độ',
            'lng.required' => 'Vui lòng thêm tọa độ'
        ];
    }
}
