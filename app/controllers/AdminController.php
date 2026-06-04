<?php
require_once __DIR__ . '/../models/Tour.php';
require_once __DIR__ . '/../models/Booking.php';
require_once __DIR__ . '/../models/User.php';

class AdminController {
    public function index() {
        require_auth('usuario');

        $bookings = Booking::all();
        $stats = [
            'tours' => count(Tour::all()),
            'bookings' => count($bookings),
            'clients' => count(User::allClients()),
        ];
        $recentBookings = array_slice($bookings, 0, 5);

        view('admin/dashboard.php', [
            'stats' => $stats,
            'recentBookings' => $recentBookings,
        ]);
    }

    public function clients() {
        require_auth('usuario');

        $clients = User::allClients();
        view('admin/clients.php', ['clients' => $clients]);
    }

    public function destinos() {
        require_auth('usuario');

        $tours = Tour::all();
        $destinations = [];
        foreach ($tours as $tour) {
            if (!isset($destinations[$tour->location])) {
                $destinations[$tour->location] = [
                    'name' => $tour->location,
                    'tours' => 0,
                ];
            }
            $destinations[$tour->location]['tours']++;
        }
        view('admin/destinos.php', ['destinations' => array_values($destinations)]);
    }

    public function tours() {
        require_auth('usuario');

        $tours = Tour::all();
        view('admin/tours.php', ['tours' => $tours]);
    }

    public function users() {
        require_auth('usuario');

        $users = User::all();
        view('admin/users.php', ['users' => $users]);
    }

    public function bookings() {
        require_auth('usuario');

        $bookings = Booking::all();
        view('admin/bookings.php', ['bookings' => $bookings]);
    }

    public function settings() {
        require_auth('usuario');

        view('admin/settings.php');
    }
}
