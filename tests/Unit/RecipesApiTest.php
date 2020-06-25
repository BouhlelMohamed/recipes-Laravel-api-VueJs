<?php

use App\Recipes;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RecipesApiTest extends TestCase{

    public function setUp(): void{
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testGetRecipes(){
        $recipe = factory(Recipes::class)->create(['name'=>'n','description'=>'3 kilos de pattes']);
        $response = $this->call('GET','/recipes',['type'=>'Recipes','id'=>$recipe->id]);
        $recipes = json_decode($response->getName());
        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals(3,count($recipes));
    }
}