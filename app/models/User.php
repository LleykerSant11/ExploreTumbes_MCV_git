<?php
class User {
    public $id;
    public $name;
    public $email;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public static function all() {
        return [
            new User(1, 'María Pérez', 'maria@example.com'),
            new User(2, 'Carlos Díaz', 'carlos@example.com'),
            new User(3, 'Ana Torres', 'ana@example.com'),
        ];
    }
}
