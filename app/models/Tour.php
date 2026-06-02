<?php
class Tour {
    public $id;
    public $title;
    public $location;
    public $price;
    public $description;

    public function __construct($id, $title, $location, $price, $description) {
        $this->id = $id;
        $this->title = $title;
        $this->location = $location;
        $this->price = $price;
        $this->description = $description;
    }

    public static function all() {
        return [
            new Tour(1, 'Tour a la playa', 'Punta Sal', 120, 'Día completo con transporte y almuerzo.'),
            new Tour(2, 'Aventura en la selva', 'Tumbes', 150, 'Excursión guiada con rafting opcional.'),
            new Tour(3, 'City tour cultural', 'Zaruma', 90, 'Visita a sitios históricos y museos.'),
        ];
    }

    public static function find($id) {
        foreach (self::all() as $tour) {
            if ($tour->id === $id) {
                return $tour;
            }
        }
        return null;
    }
}
