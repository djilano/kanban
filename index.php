<?php

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('Core\\', __DIR__ . '/core/');

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__ . '/views',
));

$app->get('/', function () use ($app) {
  return $app['twig']->render('index.twig');
});

$app->mount('/api', include 'server/api.php');

$app->run();

// $db = new Core\Database();
// $db->connect();
// // $db->exec(file_get_contents('schema.sql'));
// $stmt = $db->pdo->prepare("INSERT INTO projects (project_name, user_id) VALUES (:name, :user_id)");
// $stmt->bindValue(':name', 'Test project');
// $stmt->bindValue(':user_id', 1);
// $stmt->execute();

// spl_autoload_register(function ($class_name) {
//     include 'core/' . $class_name . '.php';
// });

// $db = new Database();
// $db->connect();

// $db->select('sqlite_master')
 
// // $pdo = new \PDO('sqlite:sqlite.db');

// // $pdo->exec(file_get_contents('schema.sql'));

// // $stmt = $pdo->query("SELECT name
// //              FROM sqlite_master
// //              WHERE type = 'table'
// //              ORDER BY name");
// // $tables = [];
// // while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
// //   $tables[] = $row['name'];
// // }

// // var_dump($tables);
