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
Router::post('/carteiras/criar', [CarteiraController::class,'createModel']);

Router::get('/transacoes', [TransacaoController::class,'indexPage']);
Router::get('/transacoes/criar', [TransacaoController::class,'createPage']);
Router::post('/transacoes/criar', [TransacaoController::class,'createModel']);

Router::get('/orcamentos', [OrcamentoController::class,'indexPage']);
Router::get('/orcamentos/criar', [OrcamentoController::class,'createPage']);
Router::post('/orcamentos/criar', [OrcamentoController::class,'createModel']);

Router::get('/database/up', [DatabaseController::class,'up']);

Router::start();
