<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id_product' => 'PRD-001',
                'nama_product' => 'Nasi Liwet Sunda',
                'kategori' => 'Makanan Berat',
                'image' => 'nasi_liwet.png',
                'harga' => 25000,
                'stok' => 40,
                'deskripsi' => 'Nasi liwet khas Sunda yang dimasak dengan santan dan rempah pilihan, disajikan hangat dengan cita rasa gurih autentik.',
            ],
            [
                'id_product' => 'PRD-002',
                'nama_product' => 'Ayam Bakar Sunda',
                'kategori' => 'Makanan Berat',
                'image' => 'ayam_bakar_sunda.png',
                'harga' => 28000,
                'stok' => 35,
                'deskripsi' => 'Ayam bakar bumbu khas Sunda dengan olesan kecap manis dan rempah, dipanggang hingga matang sempurna dan beraroma harum.',
            ],
            [
                'id_product' => 'PRD-003',
                'nama_product' => 'Gurame Goreng',
                'kategori' => 'Makanan Berat',
                'image' => 'gurame_goreng.png',
                'harga' => 45000,
                'stok' => 20,
                'deskripsi' => 'Ikan gurame segar yang digoreng kering renyah, disajikan dengan sambal dan lalapan khas Saung Rasa.',
            ],
            [
                'id_product' => 'PRD-004',
                'nama_product' => 'Karedok',
                'kategori' => 'Lalapan & Sayur',
                'image' => 'karedok.png',
                'harga' => 15000,
                'stok' => 30,
                'deskripsi' => 'Sayuran segar khas Sunda yang disiram bumbu kacang pedas manis, cocok sebagai pendamping makan yang menyegarkan.',
            ],
            [
                'id_product' => 'PRD-005',
                'nama_product' => 'Soto Bandung',
                'kategori' => 'Makanan Berat',
                'image' => 'soto_bandung.png',
                'harga' => 22000,
                'stok' => 25,
                'deskripsi' => 'Soto khas Bandung berkuah bening dengan irisan daging sapi, lobak, dan taburan kacang kedelai goreng.',
            ],
            [
                'id_product' => 'PRD-006',
                'nama_product' => 'Lotek',
                'kategori' => 'Lalapan & Sayur',
                'image' => 'lotek.png',
                'harga' => 15000,
                'stok' => 30,
                'deskripsi' => 'Sayuran rebus segar yang dipadukan dengan bumbu kacang khas Sunda, disajikan dengan lontong hangat.',
            ],
            [
                'id_product' => 'PRD-007',
                'nama_product' => 'Pepes Ikan',
                'kategori' => 'Makanan Berat',
                'image' => 'pepes_ikan.png',
                'harga' => 20000,
                'stok' => 28,
                'deskripsi' => 'Ikan segar yang dibumbui rempah khas dan dikukus dalam balutan daun pisang, menghasilkan aroma dan rasa yang khas.',
            ],
            [
                'id_product' => 'PRD-008',
                'nama_product' => 'Kangkung',
                'kategori' => 'Lalapan & Sayur',
                'image' => 'kangkung.png',
                'harga' => 12000,
                'stok' => 45,
                'deskripsi' => 'Tumis kangkung segar dengan bumbu terasi pedas khas Sunda, cocok dinikmati sebagai pelengkap hidangan utama.',
            ],
            [
                'id_product' => 'PRD-009',
                'nama_product' => 'Es Cendol',
                'kategori' => 'Minuman',
                'image' => 'cendol.png',
                'harga' => 10000,
                'stok' => 50,
                'deskripsi' => 'Minuman segar khas Sunda berisi cendol, santan, dan gula merah cair yang manis dan menyegarkan.',
            ],
            [
                'id_product' => 'PRD-010',
                'nama_product' => 'Es Kelapa',
                'kategori' => 'Minuman',
                'image' => 'es_kelapa.png',
                'harga' => 10000,
                'stok' => 50,
                'deskripsi' => 'Es kelapa muda segar dengan tambahan sirup dan es serut, minuman pelepas dahaga favorit di Saung Rasa.',
            ],
        ];

        foreach ($products as $data) {
            $sourcePath = public_path('assets/product/' . $data['image']);
            $storedPath = 'products/' . $data['image'];

            if (file_exists($sourcePath) && ! Storage::disk('public')->exists($storedPath)) {
                Storage::disk('public')->put($storedPath, file_get_contents($sourcePath));
            }

            Product::create([
                'id_product' => $data['id_product'],
                'gambar' => $storedPath,
                'nama_product' => $data['nama_product'],
                'kategori' => $data['kategori'],
                'harga' => $data['harga'],
                'stok' => $data['stok'],
                'deskripsi' => $data['deskripsi'],
            ]);
        }
    }
}
