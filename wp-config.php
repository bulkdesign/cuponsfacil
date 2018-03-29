<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'cupon531_novo');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'cupon531_cupons');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'CuponsSaopaulo123');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zso0s%Yj^$N|WzxlmFiS!#0L1}3D/FzyK+Q-WtQ~0^@;p;xq 8Cnfd<1 8H#[}Q?');
define('SECURE_AUTH_KEY',  '#BO%I/FhZJa=m`&u.,YCmyzC4DH)7^so|@=XQh`UnY;dL!zS{|9nxL]rh=zKW@-J');
define('LOGGED_IN_KEY',    'WkM*z(C/&+Vl^BH,f_U7|Nng|MQ5EJ0*6+y:H%gsvgNp-7v7|!M$fF(c|0p+.$5F');
define('NONCE_KEY',        'F<Q>%C})+1?yMj(KjLV^jdmiz;@e(&XpjC~kL}:,I&:6B!.34uukz4/q|nQ*I`K8');
define('AUTH_SALT',        'z,g9lo/_TKA6b-:qSx_6)1g95>2=8.MR++Vgq{/R6; ^3[oF[ZtSU)J%7#}f1Gib');
define('SECURE_AUTH_SALT', '+NPB|w5{uai#6y|!Hmq7V^AHlgf@WEz<s9{fG`Xhgjqu(a@yV0&JMIX8XB+cMj}~');
define('LOGGED_IN_SALT',   '<N[B(Rh2|]J<hy{mGw~Twl(2B<l^KKiIn7rR3u2fhC$nb{ M6rTyU*Gu^YQy;SP<');
define('NONCE_SALT',       'kN~u0;$&B*,6Qkk=Q.fRXdyR:9PU}rd*WN8sA_:yRsxfQYZcnl=R#:lacuoY^Vc7');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
