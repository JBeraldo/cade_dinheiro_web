<?php

require_once "./bootstrap.php";

use App\ClassLoader;
use App\Http\Controllers\CarteiraController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\TransacaoController;
use App\Http\Middlewares\Auth;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::setCustomClassLoader(new ClassLoader());

Router::get('/', [IndexController::class, 'indexPage']);
Router::get('/login', [LoginController::class, 'loginPage'])->name('login');
Router::post('/login', [LoginController::class, 'login']);
Router::get('/logout', [LoginController::class, 'logout']);

Router::group(['middleware' => Auth::class], function () {

    Router::get('/carteiras', [CarteiraController::class, 'indexPage']);
    Router::get('/carteiras/criar', [CarteiraController::class, 'createPage']);
    Router::get('/carteiras/editar/{id}', [CarteiraController::class, 'updatePage']);
    Router::post('/carteiras/criar', [CarteiraController::class, 'createModel']);
    Router::post('/carteiras/editar', [CarteiraController::class, 'updateModel']);
    Router::post('/carteiras/excluir', [CarteiraController::class, 'deleteModel']);

    Router::get('/transacoes', [TransacaoController::class, 'indexPage']);
    Router::get('/transacoes/criar', [TransacaoController::class, 'createPage']);
    Router::get('/transacoes/editar/{id}', [TransacaoController::class, 'updatePage']);
    Router::post('/transacoes/criar', [TransacaoController::class, 'createModel']);
    Router::post('/transacoes/editar', [TransacaoController::class, 'updateModel']);
    Router::post('/transacoes/excluir', [TransacaoController::class, 'deleteModel']);

    Router::get('/orcamentos', [OrcamentoController::class, 'indexPage']);
    Router::get('/orcamentos/criar', [OrcamentoController::class, 'createPage']);
    Router::get('/orcamentos/editar/{id}', [OrcamentoController::class, 'updatePage']);
    Router::post('/orcamentos/criar', [OrcamentoController::class, 'createModel']);
    Router::post('/orcamentos/editar', [OrcamentoController::class, 'updateModel']);
    Router::post('/orcamentos/excluir', [OrcamentoController::class, 'deleteModel']);

    Router::get('/database/up', [DatabaseController::class, 'up']);
});

Router::start();
