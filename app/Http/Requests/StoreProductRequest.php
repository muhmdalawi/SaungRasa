<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'gambar' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'nama_product' => ['required', 'string', 'max:150'],
            'kategori' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['required', 'string'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'gambar.required' => 'Gambar product wajib diunggah.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpg, jpeg, atau png.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
            'nama_product.required' => 'Nama product wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.integer' => 'Stok harus berupa angka.',
            'stok.min' => 'Stok tidak boleh kurang dari 0.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ];
    }
}
