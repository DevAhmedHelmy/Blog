<?php

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use App\Like;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Category::class, 10)->create();
        factory(Post::class, 10)->create();
        factory(Comment::class, 10)->create();
        $tag = factory(Tag::class, 10)->create();
        

        Post::All()->each(function ($post) use ($tag){
            $post->tags()->saveMany($tag);
        });
        factory(Like::class, 10)->create();

        
    }
}
