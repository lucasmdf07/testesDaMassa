<?php
$url = basename($_SERVER['REQUEST_URI']);

$parts = parse_url($url);
$scheme = isset($parts['scheme']);
$host = isset($parts['host']);
if($scheme == NULL | $host == NULL) {
    $str = '://'.$parts['path'];
} else {
    $str = $parts['scheme'].'://'.$parts['host'].$parts['path'];
}
// $str = $parts['path'];

?>

<header>
    <div class="logo">
        <h1>Ralph Borcherds CS-313 Website</h1>
    </div>
    <nav class="navigation">
        <ul>
            <li <?php if($str == "://index.php" || $str == "://") { echo "class='active'"; } ?> ><a href="index.php" title="Home Page">Home</a></li>
            <li <?php if($str == "://assignments.php") { echo "class='active'"; } ?> ><a href="assignments.php" title="Assignments Page">Class Assignments</a></li>
        </ul>
    </nav>
</header>