<?php

namespace Tests\Feature;

use App\Article;
use App\User;
use InvalidArgumentException;
use Tests\TestCase;

class ArticleRatingTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->article = factory(Article::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function test_it_can_be_rated()
    {
        $this->article->rate(5, $this->user);

        $this->assertCount(1, $this->article->ratings);
    }
}
