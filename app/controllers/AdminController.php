<?php
require_once __DIR__ . '/../models/Tour.php';
require_once __DIR__ . '/../models/Booking.php';
require_once __DIR__ . '/../models/User.php';

class AdminController {
    public function index() {
        $stats = [
            'tours' => count(Tour::all()),
            'bookings' => count(Booking::all()),
            'clients' => count(User::all()),
        ];
        view('admin/dashboard.php', ['stats' => $stats]);
    }

    public function clients() {
        $clients = User::all();
        view('admin/clients.php', ['clients' => $clients]);
    }

    public function tours() {
        $tours = Tour::all();
        view('admin/tours.php', ['tours' => $tours]);
    }

    public function bookings() {
        $bookings = Booking::all();
        view('admin/bookings.php', ['bookings' => $bookings]);
    }

    public function settings() {
        view('admin/settings.php');
    }
}
