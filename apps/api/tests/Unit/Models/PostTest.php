<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Post;
use App\Tag;
use App\Author;

class PostTest extends TestCase
{   
    use DatabaseMigrations;

    public function testRelationshipWithTags()
    {   
        $tag = factory(Tag::class)->create();
        $author = factory(Author::class)->create();

        $post = factory(Post::class)->create([
            'author_id' => $author->id
        ]);

        $post->tags()->save($tag);

        $tagIdInPost = $post->tags->first()->id;

        $this->assertTrue(($tagIdInPost == $tag->id));
    }

    public function testRelationshipWithAuthor()
    {   
        $author = factory(Author::class)->create();
        $post = factory(Post::class)->create([
            'author_id' => $author->id
        ]);

        $this->assertTrue(($post->author->id == $author->id));
    }
}
