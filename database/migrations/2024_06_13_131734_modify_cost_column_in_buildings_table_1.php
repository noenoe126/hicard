
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCostColumnInBuildingsTable extends Migration
{
    public function up()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->decimal('cost', 15, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->decimal('cost')->change(); // Adjust as needed for rollback
        });
    }
}
