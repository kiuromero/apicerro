<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Category;
use App\GalleryImage;
use App\News;
use App\Program;
use App\Streaming;

class NewsController extends Controller
{
    public function getNews()
    {
        $news = new News;
        $news = News::get();
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

}
