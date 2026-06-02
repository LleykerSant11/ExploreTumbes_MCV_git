<?php
require_once __DIR__ . '/../models/Tour.php';

class HomeController {
    public function index() {
        $tours = Tour::all();
        view('client/home.php', ['tours' => $tours]);
    }
}
