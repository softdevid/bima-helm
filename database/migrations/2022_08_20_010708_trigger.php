<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Trigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER `tr_lg` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE sizes set lg = lg - NEW.qty where id = NEW.size_id AND NEW.size_name_id = 4;
            END'
        );

        DB::unprepared(
            'CREATE TRIGGER `tr_m` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE sizes set m = m - NEW.qty where id = NEW.size_id AND NEW.size_name_id = 3;
            END'
        );

        DB::unprepared('
            CREATE TRIGGER `tr_s` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE sizes set s = s - NEW.qty where id = NEW.size_id AND NEW.size_name_id = 2;
            END
        ');

        DB::unprepared(
            'CREATE TRIGGER `tr_xl` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE sizes set xl = xl - NEW.qty where id = NEW.size_id AND NEW.size_name_id = 5;
            END'
        );

        DB::unprepared(
            'CREATE TRIGGER `tr_xs` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE sizes set xs = xs - NEW.qty where id = NEW.size_id AND NEW.size_name_id = 1;
            END'
        );

        DB::unprepared(
            'CREATE TRIGGER `tr_xxl` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE sizes set xxl = xxl - NEW.qty where id = NEW.size_id AND NEW.size_name_id = 6;
            END'
        );

        // trigger update
        DB::unprepared(
            'CREATE TRIGGER `update_xs` AFTER UPDATE ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE sizes set xs = xs - NEW.qty where id = size_id AND size_name_id = 1;
            END'
        );

        DB::unprepared(
            'CREATE TRIGGER `tr_updateStokTotal` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE products set stock = stock - NEW.qty where id = NEW.product_id;
            END'
        );

        DB::unprepared(
            'CREATE TRIGGER `tr_updateSoldTotal` AFTER INSERT ON `laporans`
             FOR EACH ROW BEGIN
                UPDATE products set sold = sold + NEW.qty where id = NEW.product_id;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER trigger');
    }
}
