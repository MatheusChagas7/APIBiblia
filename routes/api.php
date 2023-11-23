<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\VersiculoController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// /* INICIO ROTAS TESTAMENTO */
// // Retorna todos os testamentos
// Route::get('/testamento', [TestamentoController::class, 'index']);

// // Retorna o testamento conforme o parametro passado
// Route::get('/testamento/{id}', [TestamentoController::class, 'show']);

// // Atualiza um testamento
// Route::put('/testamento/{id}', [TestamentoController::class, 'update']);

// // Adiciona um testamento
// Route::post('/testamento', [TestamentoController::class, 'store']);

// // Deleta um testamento
// Route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);

// /* FIM ROTAS TESTAMENTO */


// /* INICIO ROTAS LIVROS */

// // Retorna todos os livros
// Route::get('/livro', [LivroController::class, 'index']);

// // Retorna o livro conforme o id informado
// Route::get('/livro/{id}', [LivroController::class, 'show']);

// // Adiciona um livro
// Route::post('/livro', [LivroController::class, 'store']);

// // Atualiza um livro
// Route::put('/livro/{id}', [LivroController::class, 'update']);

// // Deleta um livro
// Route::delete('/livro/{id}', [LivroController::class, 'destroy']);

// /* FIM ROTAS LIVROS */


// /* INICIO ROTAS VERSICULOS */

// // Retorna todos os versiculos
// Route::get('/versiculo', [VersiculoController::class, 'index']);

// // Retorna o versiculos conforme o id informado
// Route::get('/versiculo/{id}', [VersiculoController::class, 'show']);

// // Adiciona um versiculos
// Route::post('/versiculo', [VersiculoController::class, 'store']);

// // Atualiza um versiculos
// Route::put('/versiculo/{id}', [VersiculoController::class, 'update']);

// // Deleta um versiculos
// Route::delete('/versiculo/{id}', [VersiculoController::class, 'destroy']);

// /* FIM ROTAS VERSICULOS */



// // Facilitando com apiResource

// Route::apiResource('testamento', TestamentoController::class);

// Route::apiResource('livro', LivroController::class);

// Route::apiResource('versiculo', VersiculoController::class);


// Facilitando mais ainda com apiResources
Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::apiResources([
        'testamento' => TestamentoController::class,
        'livro' => LivroController::class,
        'versiculo' => VersiculoController::class
    ]);

});

Route::post('/authenticate', [AuthController::class, 'authenticate']);

Route::post('/login', [AuthController::class, 'login']);
