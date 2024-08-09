<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerUpdateUserCredits extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER update_user_credits AFTER INSERT ON credits
            FOR EACH ROW
            BEGIN
                DECLARE total_credits DECIMAL(10, 2);
                DECLARE total_spent INT;
                DECLARE remaining_credits DECIMAL(10, 2);

                -- Sumar todos los créditos del usuario
                SELECT SUM(credits) INTO total_credits
                FROM credits
                WHERE id IN (SELECT credit_id FROM user_credits WHERE user_id = (SELECT user_id FROM user_credits WHERE credit_id = NEW.id LIMIT 1));

                -- Sumar todo el gasto total del usuario
                SELECT SUM(total_spend) INTO total_spent
                FROM credits
                WHERE id IN (SELECT credit_id FROM user_credits WHERE user_id = (SELECT user_id FROM user_credits WHERE credit_id = NEW.id LIMIT 1));

                -- Calcular los créditos restantes
                SET remaining_credits = total_credits - total_spent;

                -- Actualizar la columna credit en la tabla users
                UPDATE users
                SET credit = remaining_credits
                WHERE id = (SELECT user_id FROM user_credits WHERE credit_id = NEW.id LIMIT 1);
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_user_credits');
    }
}

