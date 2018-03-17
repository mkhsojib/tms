<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1);
            $table->string('wk')->nullable();
            $table->string('jersey_number')->nullable();
            $table->text('a')->nullable();
            $table->text('b')->nullable();
            $table->text('c')->nullable();
            $table->text('d')->nullable();
            $table->text('e')->nullable();
            $table->text('f')->nullable();
            $table->text('g')->nullable();
            $table->text('h')->nullable();
            $table->text('i')->nullable();
            $table->text('j')->nullable();
            $table->text('k')->nullable();
            $table->text('l')->nullable();
            $table->text('m')->nullable();
            $table->text('n')->nullable();
            $table->text('o')->nullable();
            $table->text('p')->nullable();
            $table->text('q')->nullable();
            $table->text('r')->nullable();
            $table->text('s')->nullable();
            $table->text('t')->nullable();
            $table->text('u')->nullable();
            $table->text('v')->nullable();
            $table->text('w')->nullable();
            $table->text('x')->nullable();
            $table->text('y')->nullable();
            $table->text('z')->nullable();
            $table->text('aa')->nullable();
            $table->text('ab')->nullable();
            $table->text('ac')->nullable();
            $table->text('ad')->nullable();
            $table->text('ae')->nullable();
            $table->text('af')->nullable();
            $table->text('ag')->nullable();
            $table->text('ah')->nullable();
            $table->text('ai')->nullable();
            $table->text('aj')->nullable();
            $table->text('ak')->nullable();
            $table->text('al')->nullable();
            $table->text('am')->nullable();
            $table->text('an')->nullable();
            $table->text('ao')->nullable();
            $table->text('ap')->nullable();
            $table->text('aq')->nullable();
            $table->text('ar')->nullable();
            $table->text('as')->nullable();
            $table->text('at')->nullable();
            $table->text('au')->nullable();
            $table->text('av')->nullable();
            $table->text('aw')->nullable();
            $table->text('ax')->nullable();
            $table->text('ay')->nullable();
            $table->text('az')->nullable();
            $table->text('ba')->nullable();
            $table->text('bb')->nullable();
            $table->text('bc')->nullable();
            $table->text('bd')->nullable();
            $table->text('be')->nullable();
            $table->text('bf')->nullable();
            $table->text('bg')->nullable();
            $table->text('bh')->nullable();
            $table->text('bi')->nullable();
            $table->text('bj')->nullable();
            $table->text('bk')->nullable();
            $table->text('bl')->nullable();
            $table->text('bm')->nullable();
            $table->text('bn')->nullable();
            $table->text('bo')->nullable();
            $table->text('bp')->nullable();
            $table->text('bq')->nullable();
            $table->text('br')->nullable();
            $table->text('bs')->nullable();
            $table->text('bt')->nullable();
            $table->text('bu')->nullable();
            $table->text('bv')->nullable();
            $table->text('bw')->nullable();
            $table->text('bx')->nullable();
            $table->text('by')->nullable();
            $table->text('bz')->nullable();
            $table->text('ca')->nullable();
            $table->text('cb')->nullable();
            $table->text('cc')->nullable();
            $table->text('cd')->nullable();
            $table->text('ce')->nullable();
            $table->text('cf')->nullable();
            $table->text('cg')->nullable();
            $table->text('ch')->nullable();
            $table->text('ci')->nullable();
            $table->text('cj')->nullable();
            $table->text('ck')->nullable();
            $table->text('cl')->nullable();
            $table->text('cm')->nullable();
            $table->text('cn')->nullable();
            $table->text('co')->nullable();
            $table->text('cp')->nullable();
            $table->text('cq')->nullable();
            $table->text('cr')->nullable();
            $table->text('cs')->nullable();
            $table->text('ct')->nullable();
            $table->text('cu')->nullable();
            $table->text('cv')->nullable();
            $table->text('cw')->nullable();
            $table->text('cx')->nullable();
            $table->text('cy')->nullable();
            $table->text('cz')->nullable();

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
        Schema::dropIfExists('players');
    }
}
