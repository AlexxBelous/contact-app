<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

function getContacts()
{
    return [
        1 => ['name' => 'Name 1', 'phone' => '1231231231'],
        2 => ['name' => 'Name 2', 'phone' => '2345678901'],
        3 => ['name' => 'Name 3', 'phone' => '0992945545'],
    ];
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
    $companies = [
        1 => ['name' => 'Apple Inc.', 'contacts' => 3],
        2 => ['name' => 'Microsoft Corporation', 'contacts' => 5],
        3 => ['name' => 'Google LLC', 'contacts' => 8],
        4 => ['name' => 'Amazon.com Inc.', 'contacts' => 4],
        5 => ['name' => 'Facebook, Inc.', 'contacts' => 6],
    ];
    $contacts = getContacts();
    return view('contacts.index', compact('contacts', 'companies'));
})->name('contacts.index');

Route::get('/contacts/create', function () {
    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}', function ($id) {
    $contacts = getContacts();
    abort_unless(isset($contacts[$id]), 404);
    $contact = $contacts[$id];
    return view('contacts.show')->with('contact', $contact);
})->name('contacts.show');
