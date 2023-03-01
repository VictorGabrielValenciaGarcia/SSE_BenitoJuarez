php artisan migrate:fresh --path=/database/migrations/2014_10_12_000000_create_users_table.php

php artisan migrate --path=/database/migrations/2014_10_12_100000_create_password_resets_table.php

php artisan migrate --path=/database/migrations/2014_10_12_200000_add_two_factor_columns_to_users_table.php

php artisan migrate --path=/database/migrations/2019_08_19_000000_create_failed_jobs_table.php

php artisan migrate --path=/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php

php artisan migrate --path=/database/migrations/2020_05_21_100000_create_teams_table.php

php artisan migrate --path=/database/migrations/2020_05_21_200000_create_team_user_table.php

php artisan migrate --path=/database/migrations/2020_05_21_300000_create_team_invitations_table.php

php artisan migrate --path=/database/migrations/2023_02_13_135731_create_sessions_table.php


php artisan migrate --path=/database/migrations/2023_02_14_185209_create_grupos_table.php

php artisan migrate --path=/database/migrations/2023_02_14_185233_create_tutores_table.php

php artisan migrate --path=/database/migrations/2023_02_14_185116_create_alumnos_table.php

php artisan migrate --path=/database/migrations/2023_02_15_005330_create_alumnos_tutores_table.php

php artisan migrate --path=/database/migrations/2023_02_14_185149_create_materias_table.php

php artisan migrate --path=/database/migrations/2023_02_14_185135_create_docentes_table.php

php artisan migrate --path=/database/migrations/2023_02_14_185100_create_calificaciones_table.php

php artisan migrate --path=/database/migrations/2023_02_26_203642_create_permission_tables.php

php artisan db:seed --class=MateriasSeeder

php artisan db:seed --class=GruposSeeder

php artisan db:seed --class=DocentesSeeder

php artisan db:seed --class=TutoresSeeder

php artisan db:seed --class=RolSeeder

php artisan db:seed --class=UserSeeder

php artisan db:seed --class=AlmunosSeeder

php artisan db:seed --class=AsignacionSeeder
