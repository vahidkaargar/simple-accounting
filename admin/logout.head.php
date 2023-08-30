<?php
setcookie(LOGIN_COOKIE, null, -1, '/');
redirect('./admin.php?action=login');