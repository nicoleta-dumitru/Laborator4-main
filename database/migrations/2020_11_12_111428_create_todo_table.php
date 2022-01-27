<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTodoTable extends Migration
{
public function up()
{
Schema::create('todo',function(Blueprint $table)
{
$table->increments('id');
$table->string('title');
$table->text('description');
$table->timestamps();
});
}
public function down()
{
Schema::dropIfExists('todo');
}
}
