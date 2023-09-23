<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInvoiceLayoutsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_layouts', function (Blueprint $table) {
           
            $table->string('footercompany_text')->after('footer_text')->default('<p style="text-align: center;">Software Powered by <b> www.crossdevlogix.com </b><br />0326-9498569</p>');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
