<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerUpdateUserCredits extends Migration
{
    public function up()
    {
        DB::unprepared('
            DELIMITER $$
            
            CREATE TRIGGER update_user_credits AFTER INSERT ON credits
            FOR EACH ROW
            BEGIN
                DECLARE total_credits DECIMAL(10, 2);
                DECLARE total_spent DECIMAL(10, 2);
                DECLARE remaining_credits DECIMAL(10, 2);
                DECLARE user_id INT;

                -- Obtener el user_id asociado al nuevo crédito
                SELECT user_id INTO user_id
                FROM user_credits
                WHERE credit_id = NEW.id
                LIMIT 1;

                -- Sumar todos los créditos del usuario
                SELECT IFNULL(SUM(c.amount), 0) INTO total_credits
                FROM credits c
                INNER JOIN user_credits uc ON c.id = uc.credit_id
                WHERE uc.user_id = user_id;

                -- Sumar todo el gasto total del usuario
                SELECT IFNULL(SUM(c.total_spend), 0) INTO total_spent
                FROM credits c
                INNER JOIN user_credits uc ON c.id = uc.credit_id
                WHERE uc.user_id = user_id;

                -- Calcular los créditos restantes
                SET remaining_credits = total_credits - total_spent;

                -- Actualizar la columna credit en la tabla users
                UPDATE users
                SET credit = remaining_credits
                WHERE id = user_id;

            END$$

            DELIMITER ;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_user_credits');
    }
}
