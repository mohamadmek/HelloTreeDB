<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'hellotree',
            'email' => 'hellotree@gmail.com',
            'password' => Hash::make('hellotree'),
        ]);

        DB::table('abouttexts')->insert([
            'title' => 'We do care!',
            'textfirst' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'titlesecond' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ],
        [
            'title' => 'We do care!',
            'textfirst' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'titlesecond' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        DB::table('brochures')->insert([
            'title' => 'hellotree',
            'text' => 'Ut wisi enim ad minim veniam,ea commodo consequat.',
        ],[
            'title' => 'Brochure',
            'text' => 'Ut wisi enim ad minim veniam,ea commodo consequat.',
        ]);

        DB::table('slides')->insert(
            [
            'image' => 'storage/images/safety_1589712066.png',
            'title' => 'Personal Protective Equipment',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam',
            ],
            [
            'image' => 'storage/images/safety_1589712170.png',
            'title' => 'Personal Protective Equipment',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam',
            ],
            [
            'image' => 'storage/images/safety_1589712235.png',
            'title' => 'Mohamad Protective Equipment',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam',
        ]);
        
        DB::table('testimonials')->insert(
            [
            'quote' => '"We are all constructed out of our self dialogue."',
            'name' => 'mohammad meksasi',
            'text' => 'Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium 
            lectorum.Mirum est notare quam littera gothica, quam nunc putamus parum 
            claram, anteposuerit litterarumformas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobisvidentur parum clari, fant 
            sollemnes in futurum.',
            'image' => 'storage/images/mohamad_1589718214.png',
            ],
            [
            'quote' => '"We are all constructed out of our self dialogue."',
            'name' => 'React Developer',
            'text' => 'Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarumformas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobisvidentur parum clari, fant 
            sollemnes in futurum.',
            'image' => 'storage/images/WhatsApp Image 2019-11-26 at 11.32.00 PM_1589720323.jpeg',
            ],
            [
            'quote' => '"We are all constructed out of our self dialogue."',
            'name' => 'hello tree',
            'text' => 'Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarumformas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobisvidentur parum clari, fant sollemnes in futurum.',
            'image' => 'storage/images/WhatsApp Image 2020-05-08 at 2.12.04 PM_1589720438.jpeg',
        ]);

    }
}
