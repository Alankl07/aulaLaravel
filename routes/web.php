<?php
use App\Categoria;
use App\produto;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|php
*/

Route::get('/', function () {
    return viewphp('welcome');
});
//Nomeando rotaphps

Route::get('/oiphp', function(){
    return "Helphplo";
})->name("iniciphpal");

//Rota com linkphp

Route::get('linphpk', function(){
    $url = routphpe("inicial");
    echo "<a hrphpef=$url>Clique em mim!</a>";
});
//Rota com paraphpmetros obrigatórios e opcionais 

Route::get('/hello/{name}/{age?}', function($n, $a=null){
    if(isset($a)){
        return "Hello, $n, você tem $a anos";
    }
    else{
        return "Hello, $n";
    }
})->where('age', '[0-9]{1,2}')->where('name', '[A-Za-z]+');

//Rota com views

Route::view('/helloview', 'hello');
Route::view('/helloviewparametro', 'hello_parametro', ['name' => 'Mayara']);

Route::get('/view_parametro/{name}/{surname}', function($n, $s){
    return view('hello_parametro_url', ['name'=>$n, 'surname'=>$s]);
});

Route::get('/listar', function(){
    $produtos = [
        ['id'=>0, 'nome'=>"Notebook"],
        ['id'=>1, 'nome'=>"Mouse"],
        ['id'=>2, 'nome'=>"Teclado"],
        ['id'=>3, 'nome'=>"Passador de Slides"],
        ['id'=>4, 'nome'=>"Fone de Ouvido"]
    ];
    //return view('produtos',['produtos'=>$produtos]);
    return view('produtos',compact('produtos'));
});

//Rotas agrupadas por prefixo

Route::prefix('produto')->group(function(){
    Route::get('/criar', function(){
        return "Criar produtos";
    });
    Route::get('/editar', function(){
        return "Editar produtos";
    });
});

Route::get('/soma/{n1}/{n2}', 'ClienteController@soma');
Route::get('/cliente/{id}', 'ClienteController@getNome');
Route::resource('/produto', 'ProdutoController');

Route::view('/layout', 'layout_filho');

Route::get('/navbar', 'ProdutoController@index');

Route::get('/categorias', function(){
    $categorias = Categoria::all();
    foreach($categorias as $categoria){
        echo "ID: " . $categoria->id . "<br>";
        echo "Nome: " . $categoria->nome . "<br>";
    }
});

Route::get('/categoria/buscar/{id}', function($id) {
    $cat = Categoria::find($id);
    if(isset($cat)){
        echo "ID: " .$cat->id . "<br>";
        echo "Nome: " . $cat->nome . "<br>";
    }else{
        echo "Não existe dados com esse ID";
    }
});

Route::get('/categorias/excluir/{id}', function($id){
    $cat = Categoria::find($id);
    $cat->delete();
    return redirect('/categorias');
});

Route::get('/categoria/inserir/{nome}', function($nome){
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/categorias');
});

Route::get('/produto/inserir/{nome}', function($nome){
    $pro = new produto();
    $pro->nome = $nome;
    $pro->descricao = "uso";
    $pro->preco = 1.95;
    $pro->foto = "foto";
    $pro->categoria_id= 1;
    $pro->save();
    return redirect('/produtos');
});

Route::get('/produtos', function(){
    $produtos = produto::all();
    foreach($produtos as $produto){
        echo "ID: " . $produto->id . "<br>";
        echo "Nome: " . $produto->nome . "<br>";
        echo "Descrição" . $produto->descricao ."<br>";
        echo "Preço" . $produto->preco . "<br>";
        echo "Foto" . $produto->foto . "<br>";
        echo "ID Categoria" . $produto->categoria_id ."<br>";
    }
});

