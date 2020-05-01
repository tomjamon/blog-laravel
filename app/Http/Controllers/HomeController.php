<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Middleware (une couche de notre oignon) vérifiant que la personne est connecté
     * auth / authentfied / connecté
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tableau de bord une fois connecté
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('home');
    }
}
