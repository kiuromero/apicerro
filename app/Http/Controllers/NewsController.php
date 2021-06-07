<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Authors;
use App\Category;
use App\GalleryImage;
use App\News;
use App\Program;
use App\Streaming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function getNews()
    {
        $news = DB::table('news')
            ->join('categories', 'news.id_category', '=', 'categories.id')
            ->select('news.*', 'categories.nom')
            ->orderBy("news.created_at", "desc")
            ->get();
        return json_encode($news);
    }

    public function getNewsId($id)
    {
        $news = new News;
        $news = News::find($id);
        return json_encode($news);
    }

    public function getUrlStreaming()
    {
        $urlStreaming = new Streaming();
        $urlStreaming = Streaming::get();
        return json_encode($urlStreaming);
    }

    public function getAdress()
    {
        $dataAdress = new Adress();
        $dataAdress = Adress::get();
        return json_encode($dataAdress);
    }

    public function getCategories()
    {
        $categories = new Category();
        $categories = Category::get();
        return json_encode($categories);

    }

    public function getPrograms()
    {
        $programs = new Program();
        $programs = Program::get();
        return json_encode($programs);
    }

    public function getGalleryImages()
    {
        $galleryImages = new GalleryImage();
        $galleryImages = GalleryImage::get();
        return json_encode($galleryImages);
    }

    public function getNewsForCategory($id)
    {
        $newsCategory = new News();
        $newsCategory = News::where("id_category", $id)
            ->orderBy("created_at", "desc")
            ->take(10)
            ->get();
        return json_encode($newsCategory);
    }

    public function create(Request $request)
    {
        $author = new Authors();
        $author = Authors::find($request->author);
     
        $news = new News();
        $news->tittle = $request->tittle;
        $news->content = $request->content;
        $news->short_content = $request->short_content;
        $news->image = $request->image;
        $news->id_category = $request->id_category;
        $news->author = $author->name;
        $news->avatar_author = $author->avatar_author;
        $news->save();

        return response()->json([
            'data' => $news,
            'message' => 'resource created'
        ], 201);
    }

    public function getAllAuthors()
    {
        $authors = new Authors();
        $authors = Authors::get();

        return response()->json([
            'data' => $authors,
            'message' => 'resource lists'
        ], 200);
       
    }
}
