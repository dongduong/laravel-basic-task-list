<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1564591023754CrmDocumentsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('crm_documents');
    }
}
