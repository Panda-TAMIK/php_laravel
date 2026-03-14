<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $articles = json_decode(file_get_contents(public_path('/articles.json')));

        return view('main/article', ['articles'=>$articles]);
    }

    public function show($img) {
        $articles = json_decode(file_get_contents(public_path('/articles.json')));

        $article = collect($articles)->firstWhere('full_image', $img);

        if (!$article) {
            abort(404);
        }

        // Resolve actual existing full image file (supporting different extensions)
        $baseName = pathinfo($article->full_image, PATHINFO_FILENAME);
        $candidates = [
            $article->full_image,
            $baseName.'.webp',
            $baseName.'.jpg',
            $baseName.'.jpeg',
        ];

        $resolvedImage = null;
        foreach ($candidates as $candidate) {
            if (file_exists(public_path($candidate))) {
                $resolvedImage = $candidate;
                break;
            }
        }

        $article->full_image = $resolvedImage ?? $article->full_image;

        return view('main/gallery', ['article' => $article]);
    }
}
