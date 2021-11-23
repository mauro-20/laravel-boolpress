<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["frontend", "backend", "ux", "design pattern"];
        foreach ($tags as $tag) {
            $newTag = new Tag;
            $newTag->name = $tag;
            $newTag->slug = Str::slug($newTag->name, '-');
            $newTag->save();
        }
    }
}
