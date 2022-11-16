<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ['hardstyle', 'hardcore', 'frenchcore', 'freestyle', 'techno', 'oldschool', 'trance'];

        foreach($tags as $model) {
            $tag = new Tag();
            $tag->name = $model;
            $tag->slug = Str::slug($tag->name);
            $tag->save();
        }
    }
}
