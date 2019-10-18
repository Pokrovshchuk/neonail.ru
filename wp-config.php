<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'new_neonail' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ERb#h)}rn@*^^c|k[*%vV(L{.byFZq&OBMJ$q6K4sm $I+IC]S$L>,:VS2nFybeb' );
define( 'SECURE_AUTH_KEY',  '}uv+?eMq8xoh7D5 /hv%d]jth*za U$ye,mRxR=O|SVR*[^%4/@F%ievS$9[nZQJ' );
define( 'LOGGED_IN_KEY',    '@x4sbs(x4^+T=iMBtlP~J7W2P+  UOb]_$tCc*,gTOiI3{a.&O{[w?iiD3e-.sb*' );
define( 'NONCE_KEY',        'As2OJ_3|nxA4*C[v5<Y|Tn$xt$]%_0DLn~~p}1;kux|zwr<B7=Ct{<oLDK8K2TPv' );
define( 'AUTH_SALT',        'su+ndV>Y^>Y_)+*/VXzrI=>0_{uOm$lEpu6)SyTI{C&x*4:RlV6HR&n6$;3xq@~6' );
define( 'SECURE_AUTH_SALT', 'Xs.1f;M6W@m}8=;Z,RvcR>dV)J=RZNPy]m+*GZ2iF)He58{4vWOT6=9uLKJMwxp7' );
define( 'LOGGED_IN_SALT',   'R4iYQR%iR*A4QBrMQ@,<eT,.jytjQpAA]cwnEu=aX/4b%lmT~3C3QiRhrKVC:;0/' );
define( 'NONCE_SALT',       '*~T[t6M_?9xY9Xk%P3S!}`(mnQvvSK---:UWZs!,;yL75q%nP<nDy1NHT>d!MeXH' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

define (‘ALLOW_UNFILTERED_UPLOADS’, true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
