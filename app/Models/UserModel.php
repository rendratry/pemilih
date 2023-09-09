<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['id', 'nama', 'username', 'email', 'password', 'role'];
}