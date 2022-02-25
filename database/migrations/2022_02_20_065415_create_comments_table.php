<?php

use App\Models\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                ->constrained('posts')
                ->onDelete('cascade');
            $table->string('comment');
            $table->softDeletes();
            $table->timestamps();
        });

        // create default
        $comment = new Comment();
        $comment->post_id = 1;
        $comment->comment = 'comment here';
        $comment->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
