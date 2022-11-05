<?php

require_once "./bootstrap.php";

use App\ClassLoader;
use App\Controllers\CarteiraController;
use App\Controllers\DatabaseController;
use App\Controllers\IndexController;
use App\Controllers\OrcamentoController;
use App\Controllers\TransacaoController;

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::setCustomClassLoader(new ClassLoader());

Router::get('/', [IndexController::class,'indexPage']);

Router::get('/carteiras', [CarteiraController::class,'indexPage']);
Router::get('/carteiras/criar', [CarteiraController::class,'createPage']);
Router::get('/carteiras/editar/{id}', [CarteiraController::class,'updatePage']);
Router::post('/carteiras/criar', [CarteiraController::class,'createModel']);
Router::post('/carteiras/editar', [CarteiraController::class,'updateModel']);
Router::post('/carteiras/excluir', [CarteiraController::class,'deleteModel']);

Router::get('/transacoes', [TransacaoController::class,'indexPage']);
Router::get('/transacoes/criar', [TransacaoController::class,'createPage']);
Router::get('/transacoes/editar/{id}', [TransacaoController::class,'updatePage']);
Router::post('/transacoes/criar', [TransacaoController::class,'createModel']);
Router::post('/transacoes/editar', [TransacaoController::class,'updateModel']);
Router::post('/transacoes/excluir', [TransacaoController::class,'deleteModel']);

Router::get('/orcamentos', [OrcamentoController::class,'indexPage']);
Router::get('/orcamentos/criar', [OrcamentoController::class,'createPage']);
Router::get('/orcamentos/editar/{id}', [OrcamentoController::class,'updatePage']);
Router::post('/orcamentos/criar', [OrcamentoController::class,'createModel']);
Router::post('/orcamentos/editar', [OrcamentoController::class,'updateModel']);
Router::post('/orcamentos/excluir', [OrcamentoController::class,'deleteModel']);

Router::get('/database/up', [DatabaseController::class,'up']);

Router::start();
