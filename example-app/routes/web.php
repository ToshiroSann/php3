<?php

use App\Models\Post;
use App\Models\Blogg;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    return view('welcome', [
        'posts' => Post::all(),
        'blogg' => Blogg::query()->skip(0)->take(2)->get(),
        'blogg1' => Blogg::all(),
        'search' => Blogg::where("title")->orWhere("%%"),

    ]);
});

Route::get('post/{post}', function ($id) {
    return view('post', [
        'post' => Post::find($id)
    ]);
});

// Route::get('/post', function () {
//     // $files =  File::files(resource_path("posts/"));

//     // $posts = collect($files)
//     //     ->map(function ($file) {
//     //         $document = YamlFrontMatter::parseFile($file);

//     //         return new Post(
//     //             $document->title,
//     //             $document->excerpt,
//     //             $document->date,
//     //             $document->body(),
//     //             $document->slug
//     //         );
//     //     });

//     // foreach ($files as $file) {
//     //     $document = YamlFrontMatter::parseFile($file);

//     //     $posts[] = new Post(
//     //         $document->title,
//     //         $document->excerpt,
//     //         $document->date,
//     //         $document->body(),
//     //         $document->slug
//     //     );
//     // }


// });

Route::get('/post', function () {
    return view('post', [
        'posts' => Post::all()
    ]);
});
