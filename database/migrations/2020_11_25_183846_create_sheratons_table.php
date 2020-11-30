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

class CreateSheratonsTable extends Migration
{
    private string $table_name = 'sheratons';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();
        });
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign(['game_id', 'color_id'], $this->table_name . '_game_id_color_id_foreign')
                ->references(['game_id', 'color_id'])->on('participations');
            $table->primary(['game_id', 'player_id']);
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
            $table->dropForeign($this->table_name . '_player_id_foreign');
            $table->dropForeign($this->table_name . '_game_id_color_id_foreign');
        });
        Schema::dropIfExists($this->table_name);
    }
}
