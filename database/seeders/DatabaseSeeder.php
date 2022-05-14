<?php

namespace Database\Seeders;


use App\Models\Tag;
use App\Models\Role;
use App\Models\User;
use App\Models\Address;
use App\Models\Article;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Permission;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\EmployerAddress;
use App\Models\Page;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // // user
        // User::insert(
        //     [
        //         'email' => 'creativedevelopment.id@gmail.com',
        //         'password' => bcrypt('password'),
        //         'userable_type' => 'App\Models\Employer',
        //         'userable_id' => 2,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ],
        //     [
        //         'email' => 'evan@gmail.com',
        //         'password' => bcrypt('12345678'),
        //         'userable_type' => 'App\Models\Employer',
        //         'userable_id' => 1,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ]

        // );

        $path = public_path('eplusgo_wilayah.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $role = new Role;
        $role->name = 'admin';
        $role->display_name = 'Superadmin';
        $role->description = 'is to manage everything on the system';
        $role->save();
        $role = new Role;
        $role->name = 'employer';
        $role->display_name = 'Company';
        $role->description = 'is to manage everything on the system';
        $role->save();
        $role = new Role;
        $role->name = 'seeker';
        $role->display_name = 'User Public';
        $role->description = 'is to manage everything on the system';
        $role->save();


        $category = new Category;
        $category->name = 'Pendidikan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();


        $employer = new Employer();
        $employer->company_name = 'Pusat Karir Unmer Malang';
        $employer->since = '1964';
        $employer->telp = '0853453444546';
        $employer->tin = '345345344534';
        $employer->business_scale = 'Big';
        $employer->category_id = $category->id;
        $employer->number_of_employee = '>500';
        $employer->status = 'Verified';
        $employer->logo = 'puskar-logo.png';
        $employer->website = 'pusatkarir.unmer.ac.id';

        $address = new Address();
        $address->province_id = 15;
        $address->city_id = 232;
        $address->street = 'Jalan Terusan Dieng No. 62-64';
        $address->zip_code = '65146';


        $user = new User;
        $user->email = 'pusatkarir@unmer.ac.id';
        $user->username = 'pusatkair-unmermalang';
        $user->password = Hash::make(12345678);

        $employer->save();
        $employer->address()->save($address);
        $employer->user()->save($user);
        $user->attachRole(1);
        // event(new Registered($user));






        $category = new Category;
        $category->name = 'Akuntan / Auditor';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Asuransi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Bioteknologi & Biologi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Biro Perjalanan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Bubur Kertas / Kertas';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Desain Interior';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'E-Commerce';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Ekspedisi / Agen Kargo';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Elektronika / Semikonduktor';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Energi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Event Organizer';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Farmasi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Furnitur';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Garmen / Tekstil';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Hiburan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Hotel';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Hukum';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Internet';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Jasa Ground handling';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Jasa Pemindahan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Jasa Pengamanan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Jasa Pengendalian Hama';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Kecantikan / Fitness';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Kehutanan / Perkayuan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Kelautan / Aquakultur';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Keramik & Alat Kebersihan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Keuangan / Bank';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Kimia';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Komputer / IT-Hardware';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Komputer / TI';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Konglomerasi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Konstruksi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Konsultan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Konsultan (Bisnis & Manajemen)';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Konsultan (IT; IPTEK)';

        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Kosmetik';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Kulit';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Kurir';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Logam';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Logistik / Transportasi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Mainan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Makanan dan Minuman';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Manajemen Fasilitas';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Manajemen Lingkungan / Limbah';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Manufactur & Retail Building Material';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Manufaktur';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Manufaktur Elektronik';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Media';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Mekanik / Listrik';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Mesin / Peralatan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Minyak dan Gas';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Otomotif';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pemerintahan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pemrosesan Makanan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();


        $category = new Category;
        $category->name = 'Penerbangan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pengapalan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pengolahan Sumber Daya Alam';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Perawatan Kesehatan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Percetakan dan Kemasan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Perdagangan Komoditas';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Perdagangan Umum';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pergudangan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Perikanan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Periklanan / Penerbitan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Permata & Perhiasan';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Permen / Biskuit';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pertambangan / Mineral';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Polimer / Plastik / Karet';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Produk Konsumen';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Produk Konsumen Elektronik';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Properti';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pupuk & Pestisida';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Rancang Bangun Pesawat';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Rekayasa & Konstruksi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Rekrutmen / KPO';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Restoran';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Ritel';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Sektor Nirlaba';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Semen';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Seni / Desain / Fashion';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Servis';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Sistem Pemadam Kebakaran';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Startup dan Fintech';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Sumber Daya Alam Lainnya';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Teknologi Finansial';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Telekomunikasi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Business Field';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();



        $category = new Category;
        $category->name = 'Akuntasi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Major';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Sistem Informasi';
        $category->slug = Str::slug($category->name);
        $category->type = 'Major';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Hukum';
        $category->slug = Str::slug($category->name);
        $category->type = 'Major';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $category = new Category;
        $category->name = 'Pariwisata';
        $category->slug = Str::slug($category->name);
        $category->type = 'Major';
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();



        $name = 'About';
        $page = new Page;
        $page->name = $name;
        $page->title = 'Selamat datang diwebsite resmi Puskar Unmer Malang';
        $page->slug = Str::slug($name);
        $page->content = 'Habitasse curabitur mi massa dictum proin per lobortis orci ac laoreet leo velit sodales molestie est primis eros senectus amet ad duis consectetuer mus egestas posuere rutrum parturient mauris libero pellentesque donec aenean aliquam vel ultrices si risus integer ligula condimentum platea et sem fermentum erat hac morbi non quisque placerat cubilia vehicula elit at ultricies ut dignissim ex iaculis porta malesuada semper lorem accumsan imperdiet tellus convallis tempus aptent efficitur suscipit eu etiam';
        $page->image = 'slide.jpg';
        $page->carousel = 1;
        $page->status = 'active';
        $page->created_at = date('Y-m-d H:i:s');
        $page->updated_at = date('Y-m-d H:i:s');
        $page->save();


        $category = Category::factory(20)->create();
        $article =  Article::factory(20)->create();
        $vacancy =  Vacancy::factory(20)->create();
        $tag =  Tag::factory(20)->create();

        Article::All()->each(function ($article) use ($tag) {
            $article->tags()->attach(
                $tag->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        Vacancy::All()->each(function ($vacancy) use ($category) {
            $vacancy->categories()->attach(
                $category->where('type', 'Major')->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        Address::factory(20)->create();
        Page::factory(5)->create();
    }
}