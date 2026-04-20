<?php
namespace EkaYazilim\core;

use PDO;
use Exception;

abstract class EkaModel {
    protected PDO $db;
    protected string $table = '';

    public function __construct() {
        $this->db = EkaDatabase::getConnection();
    }

    public function find(int $id): ?array {
        try {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result ?: null;
        } catch (Exception $e) {
            EkaLogger::log("Model hatası (find): " . $e->getMessage());
            return null;
        }
    }

    public function where(string $column, string $operator, $value): array {
        try {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} {$operator} :val");
            $stmt->execute(['val' => $value]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            EkaLogger::log("Model hatası (where): " . $e->getMessage());
            return [];
        }
    }

    public function create(array $data): bool {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        } catch (Exception $e) {
            EkaLogger::log("Model hatası (create): " . $e->getMessage());
            return false;
        }
    }

    public function update(int $id, array $data): bool {
        try {
            $set = '';
            foreach ($data as $key => $value) {
                $set .= "{$key} = :{$key}, ";
            }
            $set = rtrim($set, ', ');
            $sql = "UPDATE {$this->table} SET {$set} WHERE id = :id";
            $data['id'] = $id;
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        } catch (Exception $e) {
            EkaLogger::log("Model hatası (update): " . $e->getMessage());
            return false;
        }
    }
}
