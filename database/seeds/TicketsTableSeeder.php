<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tickets')->delete();
        
        \DB::table('tickets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'CSS - Cascading Style Sheets',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue velit risus, eget scelerisque ipsum egestas sed. Nunc in libero rhoncus erat accumsan tincidunt at id enim. Curabitur at lacus elit. Maecenas viverra volutpat magna, vel euismod mauris cursus in. Nullam cursus nisi sed lacus ultricies efficitur. Pellentesque at nulla a dui viverra vulputate id sit amet massa. Mauris enim lacus, porta eget massa vel, posuere commodo sapien. Morbi neque metus, maximus scelerisque mi eu, malesuada mollis enim. Fusce gravida tellus et accumsan feugiat. Mauris blandit egestas scelerisque. In ac vestibulum ligula.',
                'deadline' => '2020-01-21',
                'status' => 'open',
                'assigned_to' => 'Mohamed',
                'user_id' => 1,
                'created_at' => '2020-01-09 06:35:06',
                'updated_at' => '2020-01-09 06:35:06',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Universal Rendering in Laravel using Vue.js',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue velit risus, eget scelerisque ipsum egestas sed. Nunc in libero rhoncus erat accumsan tincidunt at id enim. Curabitur at lacus elit. Maecenas viverra volutpat magna, vel euismod mauris cursus in. Nullam cursus nisi sed lacus ultricies efficitur. Pellentesque at nulla a dui viverra vulputate id sit amet massa. Mauris enim lacus, porta eget massa vel, posuere commodo sapien. Morbi neque metus, maximus scelerisque mi eu, malesuada mollis enim. Fusce gravida tellus et accumsan feugiat. Mauris blandit egestas scelerisque. In ac vestibulum ligula.',
                'deadline' => '2020-01-24',
                'status' => 'open',
                'assigned_to' => 'Lamar',
                'user_id' => 1,
                'created_at' => '2020-01-09 06:35:20',
                'updated_at' => '2020-01-09 06:35:20',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'GraphQL',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue velit risus, eget scelerisque ipsum egestas sed. Nunc in libero rhoncus erat accumsan tincidunt at id enim. Curabitur at lacus elit. Maecenas viverra volutpat magna, vel euismod mauris cursus in. Nullam cursus nisi sed lacus ultricies efficitur. Pellentesque at nulla a dui viverra vulputate id sit amet massa. Mauris enim lacus, porta eget massa vel, posuere commodo sapien. Morbi neque metus, maximus scelerisque mi eu, malesuada mollis enim. Fusce gravida tellus et accumsan feugiat. Mauris blandit egestas scelerisque. In ac vestibulum ligula.',
                'deadline' => '2020-01-27',
                'status' => 'open',
                'assigned_to' => 'Mohamed',
                'user_id' => 1,
                'created_at' => '2020-01-09 06:35:34',
                'updated_at' => '2020-01-09 06:35:34',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'HTML - Hypertext Markup Language',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue velit risus, eget scelerisque ipsum egestas sed. Nunc in libero rhoncus erat accumsan tincidunt at id enim. Curabitur at lacus elit. Maecenas viverra volutpat magna, vel euismod mauris cursus in. Nullam cursus nisi sed lacus ultricies efficitur. Pellentesque at nulla a dui viverra vulputate id sit amet massa. Mauris enim lacus, porta eget massa vel, posuere commodo sapien. Morbi neque metus, maximus scelerisque mi eu, malesuada mollis enim. Fusce gravida tellus et accumsan feugiat. Mauris blandit egestas scelerisque. In ac vestibulum ligula.',
                'deadline' => '2020-02-08',
                'status' => 'open',
                'assigned_to' => 'Lamar',
                'user_id' => 1,
                'created_at' => '2020-01-09 06:35:54',
                'updated_at' => '2020-01-09 06:35:54',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Laravel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue velit risus, eget scelerisque ipsum egestas sed. Nunc in libero rhoncus erat accumsan tincidunt at id enim. Curabitur at lacus elit. Maecenas viverra volutpat magna, vel euismod mauris cursus in. Nullam cursus nisi sed lacus ultricies efficitur. Pellentesque at nulla a dui viverra vulputate id sit amet massa. Mauris enim lacus, porta eget massa vel, posuere commodo sapien. Morbi neque metus, maximus scelerisque mi eu, malesuada mollis enim. Fusce gravida tellus et accumsan feugiat. Mauris blandit egestas scelerisque. In ac vestibulum ligula.',
                'deadline' => '2020-01-20',
                'status' => 'open',
                'assigned_to' => 'Ahmed',
                'user_id' => 2,
                'created_at' => '2020-01-09 06:42:59',
                'updated_at' => '2020-01-09 06:42:59',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'PHP Class',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue velit risus, eget scelerisque ipsum egestas sed. Nunc in libero rhoncus erat accumsan tincidunt at id enim. Curabitur at lacus elit. Maecenas viverra volutpat magna, vel euismod mauris cursus in. Nullam cursus nisi sed lacus ultricies efficitur. Pellentesque at nulla a dui viverra vulputate id sit amet massa. Mauris enim lacus, porta eget massa vel, posuere commodo sapien. Morbi neque metus, maximus scelerisque mi eu, malesuada mollis enim. Fusce gravida tellus et accumsan feugiat. Mauris blandit egestas scelerisque. In ac vestibulum ligula.',
                'deadline' => '2020-01-24',
                'status' => 'pending',
                'assigned_to' => 'Lamar',
                'user_id' => 2,
                'created_at' => '2020-01-09 06:43:21',
                'updated_at' => '2020-01-09 06:43:21',
            ),
        ));
        
        
    }
}