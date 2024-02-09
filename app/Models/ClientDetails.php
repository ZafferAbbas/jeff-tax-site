<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'client_details';

    protected $fillable = [
        'user_id',
        'full_name',
        'date_of_birth',
        'home_address',
        'contact_number',
        'email',
        'tax_file_number',
        'occupation',
        'partner_taxable_income',
        'has_private_health_insurance',
        'permission_for_tax_agent_portal',
        'income_details',
        'investment_details',
        'abn_business_income',
        'work_deduction_details',
        'travel_for_work_details',
        'work_uniform_expenses',
        'self_education_expenses',
        'work_from_home_details',
        'internet_usage_details',
        'phone_usage_details',
        'large_purchases_details',
        'other_work_related_expenses',
        'charitable_donations',
        'tax_agent_fees',
        'additional_notes',
    ];

    protected $casts = [
        'income_details' => 'array',
        'investment_details' => 'array',
        'abn_business_income' => 'array',
        'work_deduction_details' => 'array',
        'travel_for_work_details' => 'array',
        'work_uniform_expenses' => 'array',
        'self_education_expenses' => 'array',
        'work_from_home_details' => 'array',
        'internet_usage_details' => 'array',
        'phone_usage_details' => 'array',
        'large_purchases_details' => 'array',
        'other_work_related_expenses' => 'array',
        'charitable_donations' => 'array',
    ];

    /**
     * Get the user that owns the client details.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
