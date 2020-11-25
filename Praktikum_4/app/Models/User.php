<?php namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $returnType    = 'App\Entities\User';
    protected $allowedFields = ['username', 'password', 'role'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}