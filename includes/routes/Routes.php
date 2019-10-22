<?php

Route::set('index.php', function() {
    Header::CreateView('Header');
    Navbar::CreateView('Navbar');
    Index::CreateView('Index');
    Footer::CreateView('Footer');
});

?>