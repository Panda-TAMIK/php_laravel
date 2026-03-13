<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $jsonPath = public_path('articles.json');
        
        if (!file_exists($jsonPath)) {
            $articles = [];
        } else {
            $jsonContent = file_get_contents($jsonPath);
            $articles = json_decode($jsonContent, true) ?? [];
            
            // Добавляем id на основе индекса для каждой статьи
            foreach ($articles as $index => &$article) {
                $article['id'] = $index + 1; // id начинается с 1
                // Приводим поля к единому формату
                $article['title'] = $article['name'] ?? '';
                $article['description'] = $article['shortDesc'] ?? '';
                $article['content'] = $article['desc'] ?? '';
                $article['author'] = $article['author'] ?? 'Неизвестный автор';
                $article['views'] = $article['views'] ?? rand(100, 1000); // Генерируем просмотры если нет
            }
        }
        
        return view('home', compact('articles'));
    }
    
    public function gallery($id = null)
    {
        $jsonPath = public_path('articles.json');
        
        if (!file_exists($jsonPath)) {
            $articles = [];
        } else {
            $jsonContent = file_get_contents($jsonPath);
            $articles = json_decode($jsonContent, true) ?? [];
            
            // Обрабатываем статьи как в index()
            foreach ($articles as $index => &$article) {
                $article['id'] = $index + 1;
                $article['title'] = $article['name'] ?? '';
                $article['description'] = $article['shortDesc'] ?? '';
                $article['content'] = $article['desc'] ?? '';
                $article['author'] = $article['author'] ?? 'Неизвестный автор';
                $article['views'] = $article['views'] ?? rand(100, 1000);
            }
        }
        
        $article = null;
        if ($id !== null) {
            foreach ($articles as $item) {
                if (isset($item['id']) && $item['id'] == $id) {
                    $article = $item;
                    break;
                }
            }
        }
        
        // Если статья не найдена, берем первую
        if (!$article && count($articles) > 0) {
            $article = $articles[0];
            if (isset($articles[0]['id'])) {
                $article['id'] = $articles[0]['id'];
            }
        }
        
        return view('gallery', compact('article', 'articles'));
    }
}
=======
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
>>>>>>> 019e4b8 (finish laravel)
