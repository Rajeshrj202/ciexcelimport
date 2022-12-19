<?php

namespace App\Models;

use CodeIgniter\Model;

class InstallationDetailModel extends Model
{
    protected $db;
    protected $table      = 'installation_details';
    protected $primaryKey = 'installation_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'installation_id',
        'date',
        'seal',
        'installed_at',
        'type',
        'use',
        'client',
        'unique_id'
    ];
    protected $useTimestamps = false;
    protected $skipValidation     = false;


    public static function search($searchValue,$columnName,$columnSortOrder,$start,$rowperpage)
    {
        $InstallationDetailModel=new InstallationDetailModel();
        return $records = $InstallationDetailModel->select('*')
            ->orLike('seal', $searchValue)
            ->orLike('installed_at', $searchValue)
            ->orLike('type', $searchValue)
            ->orLike('client', $searchValue)
            ->orLike('use', $searchValue)
            ->orLike('date', $searchValue)
            ->orderBy($columnName,$columnSortOrder)
            ->findAll($rowperpage, $start);
    }
}