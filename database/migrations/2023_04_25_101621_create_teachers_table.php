    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('teachers', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name')->nullable();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('status', ['active','inactive'])->default('inactive');
                $table->string('profile_image')->nullable();
                $table->bigInteger('phone')->length(20)->unsigned()->nullable();
                $table->string('street')->nullable();
                $table->unsignedBigInteger('country_id')->nullable();
                $table->unsignedBigInteger('state_id')->nullable();
                $table->unsignedBigInteger('city_id')->nullable();
                $table->string('zip_code')->nullable();
                $table->date('dob')->nullable();
                $table->decimal('gift_balance', 10, 2)->nullable()->default(0.00);
                $table->decimal('classroom_balance', 10, 2)->nullable()->default(0.00);
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('teachers');
        }
    };
