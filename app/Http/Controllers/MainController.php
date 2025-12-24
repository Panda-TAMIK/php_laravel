<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
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