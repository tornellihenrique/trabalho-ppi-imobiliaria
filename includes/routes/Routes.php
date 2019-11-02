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

Route::set('admin', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    Admin::CreateView('Admin');
    FooterStickyBottom::CreateView('FooterStickyBottom');
});

Route::set('register-employee', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    RegisterEmployee::CreateView('RegisterEmployee');
    FooterStickyBottom::CreateView('FooterStickyBottom');
});

Route::set('register-customer', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    RegisterCustomer::CreateView('RegisterCustomer');
    FooterStickyBottom::CreateView('FooterStickyBottom');
});

Route::set('register-realty', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    RegisterRealty::CreateView('RegisterRealty');
    Footer::CreateView('Footer');
});

Route::set('list-employee', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    ListEmployee::CreateView('ListEmployee');
    Footer::CreateView('Footer');
});

Route::set('list-customer', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    ListCustomer::CreateView('ListCustomer');
    Footer::CreateView('Footer');
});

Route::set('list-realty', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    ListRealty::CreateView('ListRealty');
    Footer::CreateView('Footer');
});

Route::set('list-messages', function() {
    Header::CreateView('Header');
    NavbarAdm::CreateView('NavbarAdm');
    ListMessages::CreateView('ListMessages');
    Footer::CreateView('Footer');
});

?>