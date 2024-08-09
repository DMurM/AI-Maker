<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerInsertInitialCredits extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER insert_initial_credits AFTER INSERT ON users
            FOR EACH ROW
            BEGIN
                DECLARE last_inserted_credit_id INT;

                -- Insertar en la tabla credits
                INSERT INTO credits (credits, total_spend, expires_at, created_at, updated_at)
                VALUES (10, 0, CURRENT_TIMESTAMP, NOW(), NOW());

                -- Obtener el ID del último registro insertado en credits
                SET last_inserted_credit_id = LAST_INSERT_ID();

                -- Insertar en la tabla user_credits
                INSERT INTO user_credits (user_id, credit_id, created_at, updated_at)
                VALUES (NEW.id, last_inserted_credit_id, NOW(), NOW());

                -- Actualizar la columna credit en la tabla users
                UPDATE users
                SET credit = 10
                WHERE id = NEW.id;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS insert_initial_credits');
    }
}
