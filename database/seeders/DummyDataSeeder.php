<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // Profile
        Profile::create([
            'about' => 'Local Juice Kios Olahan Buah merupakan salah satu jenis usaha yang bergerak di bidang F&B dan dibentuk pada Maret 2022. Berawal dari keresahan bersama, terkait banyaknya Kios Jus yang disinggahi kala itu, dan jarang sekali terdapat Kios Jus yang memiliki konsep menarik, ada beberapa yang memiliki konsep serta tempat yang menarik tetapi kurang menarik di produk, begitu pula sebaliknya. Maka dari itu, kami hadir dengan berbagai keberagaman macam manfaat kebaikan dari alam, mencoba masuk dengan konsep yang signifikan berbeda dari segi tempat, kebersihan serta produk. Dengan semangat juga kebersamaan seluruh Saker Local Juice, akan memberikan pengalaman yang terbaik bagi seluruh langgan. Kami menyajikan berbagai macam sajian olahan buah-buahan yang diharapkan berkualitas dan pastinya segar sesuai dengan key message kami yakni "Olahan Buah Segar", yang berarti kesegaran yang dapat dinikmati oleh semua kalangan.',
            'vision' => 'Menjadi brand minuman olahan buah terdepan di Indonesia yang dikenal akan kualitas, kebersihan, dan inovasi rasa.',
            'mission' => 'Menyajikan olahan buah segar berkualitas tinggi dengan harga terjangkau. Menjaga konsistensi rasa dan kebersihan di setiap produk. Memberikan pelayanan terbaik kepada seluruh pelanggan.',
            'address' => 'Jl. H.Dulwanih No. 12, Sawangan, Kota Depok, Jawa Barat 16511',
            'phone' => '0851-2353-3853',
            'email' => 'localjuiceid@gmail.com',
        ]);

        // Categories
        $jus = Category::create(['name' => 'Jus Segar', 'slug' => 'jus-segar', 'description' => 'Jus buah segar tanpa tambahan gula buatan.']);
        $smoothies = Category::create(['name' => 'Smoothies', 'slug' => 'smoothies', 'description' => 'Smoothies kental dan creamy dengan campuran buah-buahan.']);
        $mix = Category::create(['name' => 'Mix', 'slug' => 'mix', 'description' => 'Kombinasi buah-buahan pilihan dalam satu sajian.']);

        // Products
        Menu::create(['category_id' => $jus->id, 'name' => 'Jus Lemon', 'description' => 'Perasan lemon segar dengan sentuhan madu alami.', 'price' => 12000, 'image' => 'products/lemon.jpg']);
        Menu::create(['category_id' => $jus->id, 'name' => 'Jus Jeruk', 'description' => 'Jeruk manis pilihan, kaya vitamin C.', 'price' => 10000, 'image' => 'products/jeruk.jpg']);
        Menu::create(['category_id' => $jus->id, 'name' => 'Jus Mangga', 'description' => 'Mangga harum manis dengan tekstur lembut.', 'price' => 15000, 'image' => 'products/mangga.jpg']);

        Menu::create(['category_id' => $smoothies->id, 'name' => 'Smoothies Alpukat', 'description' => 'Alpukat creamy dengan campuran susu coklat.', 'price' => 18000, 'image' => 'products/alpukat.jpg']);
        Menu::create(['category_id' => $smoothies->id, 'name' => 'Smoothies Strawberry', 'description' => 'Strawberry segar dengan yogurt creamy.', 'price' => 20000, 'image' => 'products/strawberry.jpg']);
        Menu::create(['category_id' => $smoothies->id, 'name' => 'Smoothies Pisang', 'description' => 'Pisang ambon matang dengan susu full cream.', 'price' => 16000, 'image' => 'products/pisang.jpg']);

        Menu::create(['category_id' => $mix->id, 'name' => 'Mix Lemon-Jeruk', 'description' => 'Kombinasi lemon dan jeruk, segar maksimal.', 'price' => 14000, 'image' => 'products/mix-lemon-jeruk.jpg']);
        Menu::create(['category_id' => $mix->id, 'name' => 'Mix Mangga-Pisang', 'description' => 'Paduan mangga dan pisang, manis alami.', 'price' => 17000, 'image' => 'products/mix-mangga-pisang.jpg']);
        Menu::create(['category_id' => $mix->id, 'name' => 'Mix Semangka-Melon', 'description' => 'Semangka dan melon, segar dan ringan.', 'price' => 13000, 'image' => 'products/mix-semangka-melon.jpg']);

        // Articles
        Article::create([
            'title' => 'Local Juice Buka Cabang Baru di Depok',
            'content' => 'Kabar gembira bagi pecinta olahan buah! Local Juice resmi membuka cabang baru di kawasan Depok. Dengan konsep yang lebih modern dan nyaman, cabang baru ini hadir untuk memberikan pengalaman berbeda dalam menikmati sajian olahan buah segar. Tersedia area indoor dan outdoor yang Instagramable, cocok untuk nongkrong bersama teman atau keluarga. Tersedia juga menu eksklusif yang hanya bisa ditemukan di cabang ini.',
            'author' => 'Tim Local Juice',
            'status' => 'published',
            'image' => null,
            'created_at' => now()->subDays(5),
        ]);

        Article::create([
            'title' => 'Tips Menjaga Kesehatan dengan Jus Buah Alami',
            'content' => 'Menjaga kesehatan bisa dimulai dari hal sederhana, seperti rutin mengonsumsi jus buah alami. Buah-buahan kaya akan vitamin, mineral, dan antioksidan yang baik untuk tubuh. Di Local Juice, kami selalu menggunakan buah segar tanpa pengawet buatan. Beberapa rekomendasi jus sehat: Jus Jeruk untuk vitamin C, Jus Apel untuk detoksifikasi, dan Jus Semangka untuk hidrasi. Yuk biasakan hidup sehat dengan minum jus buah setiap hari!',
            'author' => 'Tim Local Juice',
            'status' => 'published',
            'image' => null,
            'created_at' => now()->subDays(3),
        ]);

        Article::create([
            'title' => 'Promo Spesial Akhir Bulan: Buy 1 Get 1!',
            'content' => 'Bulan ini Local Juice memberikan promo spesial untuk semua pelanggan setia. Setiap pembelian menu apa saja, kamu akan mendapatkan satu menu gratis dengan harga yang sama atau lebih rendah. Promo berlaku setiap hari Jumat mulai pukul 14.00 - 17.00 WIB. Syarat dan ketentuan berlaku. Kunjungi outlet Local Juice terdekat dan nikmati promo ini sebelum kehabisan!',
            'author' => 'Tim Local Juice',
            'status' => 'published',
            'image' => null,
            'created_at' => now()->subDay(),
        ]);

        // Galleries
        Gallery::create(['title' => 'Outlet Local Juice Depok', 'image' => 'galleries/outlet.jpg', 'description' => 'Tampak depan outlet Local Juice Depok']);
        Gallery::create(['title' => 'Suasana Interior', 'image' => 'galleries/interior.jpg', 'description' => 'Interior cozy dengan sentuhan hijau segar']);
        Gallery::create(['title' => 'Menu Andalan', 'image' => 'galleries/menu.jpg', 'description' => 'Jus Jeruk segar andalan Local Juice']);
        Gallery::create(['title' => 'Tim Local Juice', 'image' => 'galleries/team.jpg', 'description' => 'Tim Local Juice yang ramah dan profesional']);
    }
}
