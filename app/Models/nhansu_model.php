<?php

namespace App\Models;

use CodeIgniter\Model;

class NhanSu_Model extends Model
{
    // ...
    protected $table = 'nhan_vien';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ten', 'tuoi','sdt','anhavartar','linkfb','sodonhang'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function GetAllRecords()
    {
    
    }
}