<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->softDeletes();

            //note
            //--firstname and lastname instend of only name
            $table->string('name');

//            $table->string('lastname');
            $table->string('avatar')->default('default.png');
            //Username removed we consider as email as username on now
//            $table->string('username')->unique()->nullable()->index();
            $table->string('email')->unique()->index();
            $table->string('password', 60)->index();


            $table->enum('gender',['male','female'])->nullable()->default(null)->index();

            $table->date('birthday')->nullable()->index();



            $table->rememberToken();

            $table->enum('status',['active','banned','pendingActivation','pendingApproval']);

            $table->string('activation_token')->nullable();

            $table->integer('resent')->nullable()->index();
//            $table->integer('active')->default(0);

            //Account Type opt={publisher,advertiser}
//            $table->enum('account_type', ['publisher', 'advertiser'])->default('publisher');;

            //Address
//            $table->string('address_1')->nullable();
//            $table->string('address_2')->nullable();


//            @removed as per suggestion virang sir

//            $table->string('city')->nullable();
//            $table->integer('city')->nullable();
//            $table->string('state')->nullable();
//            $table->integer('state')->nullable();
            // end           @removed as per suggestion virang sir


            $table->string('country',2)->nullable()->index();

//            $table->string('zipcode')->nullable();
//
            //contact
//            $table->string('telephone')->nullable();

            //account privacy or account type opt={personal,business}
//            $table->enum('account_privacy', ['personal', 'business'])->default('personal');

            //account
//            $table->enum('mobile_ad',[1,0])->default(1);

            //skip button advert opt={true,false}
//            $table->enum('skip_button',[1,0])->default(1);

            //language
            $table->string('language',2)->default('EN')->index();


            //Payment Option
//            $table->string('payment_processor')->nullable();
//            $table->string('withdrawal_acc')->nullable();

            //refcode is option
            //opt {we can use user id for refereel program , we can generate random code for that}
            $table->string('ref_code')->nullable()->unique()->default(null)->index();
            //assign role to the user
            $table->string('ref_user_id')->nullable()->index();

//            $table->string('role_id');

            $table->string('register_ip',20)->nullable();

            $table->string('email_activation_ip',20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
