<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Post;
use App\Tag;
use App\Author;

class TagTest extends TestCase
{   
    use DatabaseMigrations;

    public function testRelationshipWithPosts()
    {   
        $tag = factory(Tag::class)->create();
        $author = factory(Author::class)->create();
        $post = factory(Post::class)->create([
            'author_id' => $author->id
        ]);

        $tag->posts()->save($post);
        $firstPostInTag = $tag->posts()->first();

        $this->assertTrue(($firstPostInTag->id == $post->id));
    }
}
