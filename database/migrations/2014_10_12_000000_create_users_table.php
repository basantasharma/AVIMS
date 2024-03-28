<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('occupation');
            $table->string('pan');
            $table->string('father_full_name');
            $table->string('mother_full_name');
            $table->string('grand_father_full_name');
            $table->string('spouse_full_name');
            $table->string('identity_proof_type');
            $table->string('identity_proof_photo');
            $table->boolean('portal_enabled')->nullable()->default(false);
            $table->string('portal_username');
            $table->string('subscriber_email')->unique();
            $table->string('portal_password');
            $table->string('router_serial_no')->unique();
            $table->string('router_model_name');
            $table->string('refered_by');

            $table->string('organization_name');
            $table->string('organization_pan')->unique();
            $table->string('organization_phone');
            $table->string('organization_cellphone_number');
            $table->string('organization_email');
            $table->string('organization_reg_number');

            $table->string('Phone_number');
            $table->string('cellphone_number');
            $table->string('permanent_state');
            $table->string('permanent_district');
            $table->string('permanent_vdc/mun');
            $table->string('permanent_ward_number');
            $table->string('permanent_street');
            $table->string('permanent_house_number');
            $table->string('current_state');
            $table->string('current_district');
            $table->string('current_vdc/mun');
            $table->string('current_ward_number');
            $table->string('current_street');
            $table->string('current_house_number');
            $table->string('latitude');
            $table->string('longitude');
            
            $table->string('installed_by');
            $table->string('access_point');
            $table->string('drop_wire_used_serial_number');
            $table->string('ip_type');
            $table->string('ip_address');
            $table->string('vlan_id');
            $table->string('cpe_model');
            $table->string('cpe_serial_number');
            $table->string('cpe_mac');
            $table->string('plan_id');
            
            $table->id();
            // $table->string('name')->nullable();
            // $table->string('username')->unique();
            // $table->string('email')->unique();
            // $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('router_serial_number')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
