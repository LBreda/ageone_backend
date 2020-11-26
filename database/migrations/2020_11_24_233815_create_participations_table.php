<?php

/** ACLink
 *
 *  Copyright (C) 2020 Lorenzo Breda <lorenzo@lbreda.com>
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationsTable extends Migration
{
    private string $table_name = 'participations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('gamer_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('civilization_id');
            $table->timestamps();
        });
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('gamer_id')->references('id')->on('gamers');
            $table->foreign('civilization_id')->references('id')->on('civilizations');
            $table->primary(['game_id', 'gamer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->dropForeign($this->table_name.'_game_id_foreign');
            $table->dropForeign($this->table_name.'_gamer_id_foreign');
            $table->dropForeign($this->table_name.'_civilization_id_foreign');
        });
        Schema::drop($this->table_name);
    }
}
