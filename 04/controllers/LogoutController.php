<?php

use Registration\Classes\SessionManager;
use Registration\Classes\Redirect;
SessionManager::destroy();
Redirect::redirect('/');
