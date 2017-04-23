<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post([
            'title' => 'Portobellos rellenos de Caprese',
            'ingredients' => '2 cucharadas de mantequilla, 4 piezas de hongo portobello, 1 paquete de queso mozzarella, 1 taza de jitomate',
            'description' => 'Un rico hongo portobello relleno de ensalada caprese horneado súper jugoso, acompañado de una reducción de vinagre balsámico',
            'method' => '1.- Precalentar el horno a 180°C, En una ollita a fuego bajo, funde la mantequilla y cocina el ajo por 1 minuto hasta que suelte su aroma.' .
                        '2.- Barniza la base da cada hongo con esta mezcla y reserva. Rellena los hongos con el queso y los jitomates. Agrega un poco de aceite de oliva, sal y pimienta a cada hongo y hornea por 15 minutos o hasta que estén suaves y los jitomates rostizados.' .
                        '3.- Saca los portobellos del horno y barniza con la reducción de balsámico, decora con albahaca.',
            'category_id' => '1',
            'user_id' => '1',
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Vasito de Frutas Tropicales con Yoghurt',
            'ingredients' => '4 piezas de Yoghurt Natural Oikos, 4 cucharadas de miel de abeja, 4 cucharadas de nuez de la india tostadas, 1 taza de piña en cubos, 1 taza de kiwi en cubos, 4 piezas de nuez de la india tostadas, para decorar',
            'description' => 'Este vasito de frutas tropicales con yoghurt, además de ser muy colorido es delicioso y fácil de preparar',
            'method' => '1.- En un bowl, mezcla el yoghurt natural Oikos® con la miel de abeja y las nueces.' .
                        '2.- Coloca un poco de yoghurt, seguido de piña y kiwi y cubre con más yoghurt.' .
                        '3.- Termina con más fruta y decora con mitades de nueces.',
            'category_id' => '2',
            'user_id' => '2',
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Vasito de Colores y Fruta',
            'ingredients' => '3 litros de agua dividido en 1 litro por sabor, 1 paquete de Gelatina D´Gari® sabor grosella; sabor mora silvestre; sabor mango, 2 paquetes de queso crema 190 g c/u, 1/2 taza de azúcar glass',
            'description' => 'Prepara esos vasitos de gelatina de colores, su sabor ácido combina perfectamente con la salsa de queso crema.',
            'method' => '1.- Calienta un litro de agua en una olla y deja que rompa el hervor, reduce el fuego y agrega poco a poco la gelatina D ´Gari® sabor grosella y mezcla muy bien. Vierte en un recipiente extendido y mete al refrigerador por 30 minutos o hasta que cuaje. Repite con cada sabor.' .
                        '2.- Licúa el queso, la leche, la vainilla y el azúcar glass hasta obtener una mezcla tersa.' .
                        '3.- Colócalos en un vasito o recipiente de vidrio y baña con la salsa de queso.' .
                        '4.- Incorpora el durazno, la piña, la nuez y mezcla.',
            'category_id' => '2',
            'user_id' => '1',
        ]);
        $post->save();
    }
}
