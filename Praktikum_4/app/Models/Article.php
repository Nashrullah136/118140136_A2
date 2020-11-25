<?php namespace App\Models;

use CodeIgniter\Model;

class Article extends Model
{
    protected $table      = 'article';
    protected $primaryKey = 'id';
    protected $returnType    = 'App\Entities\Article';
    protected $allowedFields = ['title', 'body', 'uid'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}