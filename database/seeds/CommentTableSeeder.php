<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::find(1);
        $user = User::find(1);
        $content = 'Excelente receta, estuvieron riquísimas';        
        $user->comments()->attach($post->id, ['content' => $content]);

        $post = Post::find(1);
        $user = User::find(2);
        $content = '¡Una receta simple y deliciosa!';        
        $user->comments()->attach($post->id, ['content' => $content]);
    }
}
