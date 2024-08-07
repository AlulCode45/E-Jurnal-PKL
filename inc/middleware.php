<?php

if (!$_SESSION['user']) {
    header('Location: /');
}
