<?php

namespace App\Http\Controllers\Website;

use App\Models\Post;
use App\Models\Category;
use App\Models\HomepageAd;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\FacebookVideo;
use App\Models\ArchivePrintVersion;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $breakingNews   = $this->Get_Category_By_ID(13);
        $moreReadable   = $this->Get_Category_By_ID(14);
        $bangladesh     = $this->Get_Category_By_ID(10);
        $juktorastra    = $this->Get_Category_By_ID(11);
        $international  = $this->Get_Category_By_ID(18);
        $rest_of_world  = $this->Get_Category_By_ID(9);
        $politics       = $this->Get_Category_By_ID(26);
        $community      = $this->Get_Category_By_ID(8);
        $religion       = $this->Get_Category_By_ID(22);
        $art_literature = $this->Get_Category_By_ID(23);
        $technology     = $this->Get_Category_By_ID(24);
        $featured_news  = $this->Get_Category_By_ID(25);
        $entertainment  = $this->Get_Category_By_ID(3);

        $data = [
            'breakingNews'        => $breakingNews,
            'moreReadable'        => $moreReadable,
            'bangladesh'          => $bangladesh,
            'juktorastra'         => $juktorastra,
            'international'       => $international,
            'rest_of_world'       => $rest_of_world,
            'politics'            => $politics,
            'community'           => $community,
            'religion'            => $religion,
            'art_literature'      => $art_literature,
            'technology'          => $technology,
            'featured_news'       => $featured_news,
            'entertainment'       => $entertainment,

            'breakninNewPosts'    => $this->Get_Category_Post($breakingNews->id)->take(4)->get(),
            'moreReadablePosts'   => $this->Get_Category_Post($moreReadable->id)->take(4)->get(),
            'bangladeshPosts'     => $this->Get_Category_Post($bangladesh->id)->take(10)->get(),
            'juktorastraPosts'    => $this->Get_Category_Post($bangladesh->id)->take(6)->get(),
            'internationalPosts'  => $this->Get_Category_Post($international->id)->take(6)->get(),
            'rest_of_worldPosts'  => $this->Get_Category_Post($rest_of_world->id)->take(3)->get(),
            'politicsPosts'       => $this->Get_Category_Post($politics->id)->take(3)->get(),
            'communityPosts'      => $this->Get_Category_Post($community->id)->take(3)->get(),
            'religionPosts'       => $this->Get_Category_Post($religion->id)->take(3)->get(),
            'art_literaturePosts' => $this->Get_Category_Post($art_literature->id)->take(3)->get(),
            'technologyPosts'     => $this->Get_Category_Post($technology->id)->take(3)->get(),
            'featured_newsPosts'  => $this->Get_Category_Post($featured_news->id)->take(3)->get(),
            'entertainmentPosts'  => $this->Get_Category_Post($entertainment->id)->take(5)->get(),

            'headlinePosts'       => Post::where('headline_post', 1)->with('categories')->orderBy('id', 'DESC')->take(10)->get(),
            'recentPosts'         => Post::with('categories')->orderBy('id', 'DESC')->take(10)->get(),

            'archivPrintVersions' => ArchivePrintVersion::orderBy('id', 'DESC')->take(5)->get(),

            'latesPrintVersion'   => ArchivePrintVersion::latest()->first(),
            'advertisements'      => Advertisement::orderBy('id', 'DESC')->take(10)->get(),
            'footerVideo_1'         => VideoGallery::first(),
            'footerVideo_2'         => FacebookVideo::first(),

            'homepageAD'          => HomepageAd::first(),

        ];
        return view('website.video.index',$data);
    }

    protected function Get_Category_By_ID($id) {
        return Category::where(['status' => 1, 'id' => $id])->with('posts')->first();
    }

    public function Get_Category_Post($category_ID) {
        return $this->Get_Category_By_ID($category_ID)->posts()->with('categories')->where('status', 1)->orderBy('id', 'DESC');
    }
}
