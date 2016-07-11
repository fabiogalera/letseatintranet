    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MudancaTabelaFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function ($table) {
            $table->string('tel_contato');
            $table->string('comp');
            $table->string('meio');
            $table->string('sobrenome');
            $table->string('sexo');
            $table->string('tipo');
            $table->dropColumn('celular');
            $table->dropColumn('bairro');
            $table->renameColumn('endereco','rua');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function ($table) {
            $table->dropColumn('tel_contato');
            $table->dropColumn('comp');
            $table->dropColumn('meio');
            $table->dropColumn('sobrenome');
            $table->dropColumn('sexo');
            $table->dropColumn('tipo');
            $table->string('celular');
            $table->string('bairro');
            $table->renameColumn('rua','endereco');
        });
    }
}
