<?php
namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Database\Concerns\HasDatabase;

class Tenant extends BaseTenant
{
    use HasDatabase;
    
    protected $connection = 'tenant'; // Default connection
    
    protected $fillable = ['id','domain', 'data'];
     protected $guarded = []; 
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Ensure the connection is set dynamically
        if (session()->has('tenant_database')) {
            $this->setConnection(session('tenant_database'));
        }
    }
    public function getDatabaseName()
    {
        return $this->id; // Typically the tenant ID is used as the database name
    }
    public function store()
    {
        return $this->hasOne(Store::class, 'tenant_id');
    }
}
