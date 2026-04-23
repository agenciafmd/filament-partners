<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('partners', static function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')
                ->default(true)
                ->unsigned()
                ->index();
            $table->boolean('star')
                ->default(false)
                ->unsigned()
                ->index();
            $table->string('name');
            $table->text('description')
                ->nullable();
            $table->text('url')
                ->nullable();
            $table->text('image')
                ->nullable();
            $table->string('slug')
                ->unique()
                ->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
