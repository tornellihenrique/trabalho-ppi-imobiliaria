<?php

Route::set('index.php', function() {
    Header::CreateView('Header');
    Navbar::CreateView('Navbar');
    Index::CreateView('Index');
    Footer::CreateView('Footer');
});

Route::set('search', function() {
    Header::CreateView('Header');
    Navbar::CreateView('Navbar');
    Search::CreateView('Search');
    Footer::CreateView('Footer');
});

Route::set('contact', function() {
    Header::CreateView('Header');
    Navbar::CreateView('Navbar');
    Contact::CreateView('Contact');
    Footer::CreateView('Footer');
});

?>