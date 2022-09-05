<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
// use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('მთავარი', route('home'));
});
Breadcrumbs::for('question', function ($trail,) {
    $trail->parent('home');
    $trail->push('კითხვარი', route('question'));
});
Breadcrumbs::for('organization', function ($trail,) {
    $trail->parent('home');
    $trail->push('ორგანიზაციის შესახებ', route('organization'));
});

Breadcrumbs::for('interviewer', function ($trail) {
    $trail->push('ინტერვიუვერი', route('home'));
});

// // Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });