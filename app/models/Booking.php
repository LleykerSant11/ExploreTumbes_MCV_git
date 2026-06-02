<?php
class Booking {
    public $id;
    public $tourName;
    public $clientName;
    public $date;

    public function __construct($id, $tourName, $clientName, $date) {
        $this->id = $id;
        $this->tourName = $tourName;
        $this->clientName = $clientName;
        $this->date = $date;
    }

    public static function all() {
        return [
            new Booking(1, 'Tour a la playa', 'María Pérez', '2026-06-18'),
            new Booking(2, 'Aventura en la selva', 'Juan López', '2026-06-20'),
        ];
    }
}
