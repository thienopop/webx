<?php
echo '
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="/web/public/css/style.css">

    <title>' . $data['title'] . '</title>
</head>
<body>
';

$this->View('blocks/header');
echo "<div>";
// $this->View($data['content'], $data['list']);

if (isset($data['list'])) {
    $this->View($data['content'], $data['list']);
} else {
    $this->View($data['content']);
}
echo '</div>';
$this->View('blocks/footer');

echo '
</body>
</html>';
?>
