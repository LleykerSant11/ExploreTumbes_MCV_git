<?php
require_once __DIR__ . '/../models/Tour.php';

class TourController {
    public function catalog() {
        $tours = Tour::all();
        view('client/catalog.php', ['tours' => $tours]);
    }

    public function detail(int $id) {
        $tour = Tour::find($id);
        if (!$tour) {
            header('Location: ' . route('catalog'));
            exit;
        }
        view('client/tour_detail.php', ['tour' => $tour]);
    }
}
