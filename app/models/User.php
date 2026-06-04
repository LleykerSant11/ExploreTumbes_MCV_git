<?php
class User {
    public $id;
    public $nombre;
    public $apellidos;
    public $name;
    public $email;
    public $passwordHash;
    public $typeId;

    public function __construct(array $data) {
        $this->id = $data['UsuarioID'] ?? null;
        $this->nombre = $data['Nombre'] ?? null;
        $this->apellidos = $data['Apellidos'] ?? null;
        $this->name = trim(($data['Nombre'] ?? '') . ' ' . ($data['Apellidos'] ?? ''));
        $this->email = $data['Email'] ?? null;
        $this->passwordHash = $data['Contraseña'] ?? null;
        $this->typeId = isset($data['TipUsuID']) ? (int) $data['TipUsuID'] : null;
    }

    public function getName() {
        return trim($this->nombre . ' ' . $this->apellidos);
    }

    public static function fromRow(array $row) {
        return new self($row);
    }

    public static function findByEmail(string $email) {
        $stmt = db()->prepare('SELECT * FROM usuario WHERE Email = ? LIMIT 1');
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ? self::fromRow($row) : null;
    }

    public static function all() {
        $stmt = db()->query('SELECT * FROM usuario');
        $rows = $stmt->fetchAll();
        return array_map(fn($row) => self::fromRow($row), $rows);
    }

    public static function allClients() {
        $stmt = db()->query('SELECT * FROM usuario WHERE TipUsuID = 4');
        $rows = $stmt->fetchAll();
        return array_map(fn($row) => self::fromRow($row), $rows);
    }

    public static function createClient(array $data) {
        $sql = "INSERT INTO usuario (Nombre, Apellidos, Email, `Contrase\u{00F1}a`, TipDoc, NroDocumento, TipUsuID) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = db()->prepare($sql);
        $stmt->execute([
            $data['Nombre'],
            $data['Apellidos'],
            $data['Email'],
            $data['Contraseña'],
            $data['TipDoc'] ?? 'DNI',
            $data['NroDocumento'] ?? '00000000',
            4,
        ]);
        $id = (int) db()->lastInsertId();
        return self::findById($id);
    }

    public static function findById(int $id) {
        $stmt = db()->prepare('SELECT * FROM usuario WHERE UsuarioID = ? LIMIT 1');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? self::fromRow($row) : null;
    }

    public static function updatePasswordHash(int $id, string $newHash) {
        $sql = "UPDATE usuario SET `Contrase\u{00F1}a` = ? WHERE UsuarioID = ?";
        $stmt = db()->prepare($sql);
        $stmt->execute([$newHash, $id]);
    }

    public static function verifyPassword(string $password, string $hash, int $id = null) {
        if (password_verify($password, $hash)) {
            return true;
        }

        if ($password === $hash && $id !== null) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            self::updatePasswordHash($id, $newHash);
            return true;
        }

        return false;
    }
}
