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
        Schema::create('subscribers_details', function (Blueprint $table) {
            Schema::create('subscribers_details', function (Blueprint $table) {
                $table->id();
                $table->string('subscriber_username', 255)->nullable(false);
                $table->string('subscriber_password', 255)->nullable(false);
                $table->string('subscriber_type', 55)->nullable(false);
                $table->string('connection_type', 55)->nullable(false);
                $table->string('first_name', 55)->nullable();
                $table->string('middle_name', 55)->nullable();
                $table->string('last_name', 55)->nullable();
                $table->string('gender', 11)->nullable();
                $table->string('occupation', 11)->nullable();
                $table->string('pan', 50)->nullable(false);
                $table->string('father_full_name', 255)->nullable();
                $table->string('mother_full_name', 255)->nullable();
                $table->string('grand_father_full_name', 255)->nullable();
                $table->string('spouse_full_name', 255)->nullable();
                $table->string('identity_proof_type', 55)->nullable(false);
                $table->string('identity_proof_photo', 255)->nullable(false);
                $table->boolean('portal_enabled')->default(false);
                $table->string('portal_username', 55)->nullable(false);
                $table->string('portal_password', 255)->nullable(false);
                $table->boolean('account_enabled')->default(false);
                $table->string('email', 255)->nullable(false);
                $table->string('cpe_serial_number', 255)->nullable(false);
                $table->string('cpe_model_name', 55)->nullable(false);
                $table->string('refered_by', 55)->nullable(false);
                $table->string('organization_name', 255)->nullable();
                $table->string('organization_pan', 255)->nullable();
                $table->string('organization_registration_number', 55)->nullable();
                $table->string('phone_number', 55)->nullable(false);
                $table->string('cellphone_number', 55)->nullable(false);
                $table->string('permanent_state', 55)->nullable(false);
                $table->string('permanent_district', 55)->nullable(false);
                $table->string('permanent_vdc/mun', 55)->nullable(false);
                $table->string('permanent_ward_number', 11)->nullable(false);
                $table->string('permanent_street', 55)->nullable(false);
                $table->string('permanent_house_number', 55)->nullable(false);
                $table->string('current_state', 55)->nullable(false);
                $table->string('current_district', 55)->nullable(false);
                $table->string('current_vdc/mun', 55)->nullable(false);
                $table->integer('current_ward_number')->nullable(false);
                $table->string('current_street', 55)->nullable(false);
                $table->string('current_house_number', 55)->nullable(false);
                $table->string('current_latitude', 55)->nullable(false);
                $table->string('current_longitude', 55)->nullable(false);
                $table->string('installed_by', 255)->nullable(false);
                $table->string('access_point', 255)->nullable(false);
                $table->string('drop_wire_used_serial_number', 55)->nullable(false);
                $table->string('ip_type', 55)->nullable(false);
                $table->string('ip_address', 255)->nullable(false);
                $table->integer('vlan_id')->nullable(false);
                $table->string('cpe_mac_address', 255)->nullable(false);
                $table->integer('lead_id')->nullable(false);
                $table->string('lead_organization', 55)->nullable(false);
                $table->timestamp('email_varified_at')->nullable();
                $table->string('remember_token', 255)->nullable();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
                $table->string('created_by', 55)->nullable(false);
                $table->string('updated_by', 11)->nullable(false);
        
                $table->unique('drop_wire_used_serial_number');
                $table->unique('cpe_serial_number');
                $table->unique('email');
                $table->unique('portal_username');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers_details');
    }
};
