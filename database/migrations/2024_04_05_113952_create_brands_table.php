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
Schema::create('brands', function (Blueprint $table)

{

$table->id()->index();
$table->string('nama');
$table->string('description',)->nullable();
$table->timestamps();
});
}
/**
* Reverse the migrations.
*/
public function down(): void
{
Schema::dropIfExists('brands');
}
};