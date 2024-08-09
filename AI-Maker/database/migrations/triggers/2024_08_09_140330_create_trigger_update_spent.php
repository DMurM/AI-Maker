<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerUpdateSpent extends Migration
{
    public function up()
    {
        DB::unprepared('
         DELIMITER $$
            CREATE TRIGGER update_spent_trigger AFTER UPDATE ON credits
            FOR EACH ROW
            BEGIN
                IF OLD.total_spend != NEW.total_spend THEN
                    DECLARE user_credit_sum DECIMAL(10, 2);
                    DECLARE total_spend_sum INT;

                    -- Calcular la suma de créditos y total_spend para el usuario
                    SELECT SUM(credits) INTO user_credit_sum
                    FROM credits
                    WHERE id IN (
                        SELECT credit_id FROM user_credits WHERE user_id = (SELECT user_id FROM user_credits WHERE credit_id = NEW.id)
                    );

                    SELECT SUM(total_spend) INTO total_spend_sum
                    FROM credits
                    WHERE id IN (
                        SELECT credit_id FROM user_credits WHERE user_id = (SELECT user_id FROM user_credits WHERE credit_id = NEW.id)
                    );

                    -- Calcular el crédito restante
                    DECLARE remaining_credits DECIMAL(10, 2);
                    SET remaining_credits = user_credit_sum - total_spend_sum;

                    -- Actualizar la columna credit en la tabla users
                    UPDATE users
                    SET credit = remaining_credits
                    WHERE id = (SELECT user_id FROM user_credits WHERE credit_id = NEW.id LIMIT 1);
                END IF;
            END$$

            DELIMITER ;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_spent_trigger');
    }
}
