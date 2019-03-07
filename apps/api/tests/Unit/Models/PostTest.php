<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Post;
use App\Tag;

class PostTest extends TestCase
{   
    use DatabaseMigrations;

    public function testRelationshipWithTags()
    {   
        $tag = factory(Tag::class)->make();

        $post = factory(Post::class)->create();
        $post->tags()->save($tag);
        
        $p = $post->tags->toArray();
        $t = $tag->toArray();

        $this->assertEquals($tag->toArray(), $post->tags->toArray());
    }
}
