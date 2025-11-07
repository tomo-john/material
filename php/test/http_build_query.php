<?php
$params = [
  'name' => 'john',
  'email' => 'dog@example.com',
  'tags' => ['php', 'html']
];

echo http_build_query($params);
