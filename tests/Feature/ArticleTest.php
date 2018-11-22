<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\Article;

class ArticleTest extends TestCase
{

    private $article ;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $response = $this->get('/articles');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_an_article()
    {    
        $data = [
            'title' => "Harry Potter and the Prisoner of Azkaban",
            'body' => "J. K. Rowling",
        ];
      
        $article = Article::create($data);

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals($data['title'], $article->title);
        $this->assertEquals($data['body'], $article->body);
    }
       /** @test */
    public function it_can_update_the_article()
    {
        $article = factory(Article::class)->create();
        
        $data = [
            'title' => "Harry Potter and the Prisoner of Azkaban",
            'body' => "J. K. Rowling",
        ];
        
        $article = Article::find($article->id);
        $update = $article->update($data);
        $article = Article::find($article->id);
 
        
        $this->assertTrue($update);
        $this->assertEquals($data['title'], $article->title);
        $this->assertEquals($data['body'], $article->body);
    }
    /** @test */
    public function it_can_show_the_article()
    {
        $article = factory(Article::class)->create();

        $found = Article::find($article->id);
        
        $this->assertInstanceOf(Article::class, $found);
        $this->assertEquals($found->title, $article->title);
        $this->assertEquals($found->body, $article->body);
    }
   
}
