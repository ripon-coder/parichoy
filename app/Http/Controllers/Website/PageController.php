<?php

namespace App\Http\Controllers\Website;

use Validator;
use App\Models\Post;
use App\Models\AboutUs;
use App\Models\Category;
use App\Mail\ContactMail;
use App\Models\PrintAndNews;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\PrintNewsCategory;
use App\Models\ArchivePrintVersion;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller {

    public function SinglePost($slug) {
        $post         = Post::where('slug', $slug)->first();
        $next_id      = Post::where('id', '>', $post->id)->min('id');
        $prev_id      = Post::where('id', '<', $post->id)->max('id');
        $prev_post    = Post::find($prev_id);
        $next_post    = Post::find($next_id);
        $relatedPosts = Post::where([
            ['id', '!=', $post->id],
            ['status', 1],
        ])->inRandomOrder()->distinct()->take(15)->get();

        $categories  = Category::withCount('posts')->orderBy('id', 'DESC')->where('status', 1)->take(21)->get();
        $recentPosts = Post::orderBy('id', 'DESC')->where('status', 1)->take(5)->get();

        $archives = $this->getArchive();

        $comments = Comment::orderBy('id','DESC')->take(5)->get();

        return view('website.pages.single-post', compact('post', 'prev_post', 'next_post', 'relatedPosts', 'categories', 'recentPosts', 'archives', 'comments'));

    }

    public function categoryBasedPosts($slug) {
        $category        = Category::where('slug', $slug)->with('posts')->first();
        $categoryProduct = $category->posts()->paginate(20);
        $categories      = Category::withCount('posts')->orderBy('id', 'DESC')->where('status', 1)->take(21)->get();
        $recentPosts     = Post::orderBy('id', 'DESC')->where('status', 1)->take(5)->get();
        $archives        = $this->getArchive();

        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();

        return view('website.pages.categorized-posts', compact('categoryProduct', 'category', 'categories', 'recentPosts', 'archives', 'comments'));
    }

    public function SearchPost(Request $request) {
        $serchPosts = Post::where(function ($query) {
            $search = request()->search;
            $query->where('title', 'LIKE', '%' . $search . '%');
        });
        $query       = request()->search;
        $serchPosts  = $serchPosts->distinct()->paginate(9);
        $categories  = Category::withCount('posts')->orderBy('id', 'DESC')->where('status', 1)->take(21)->get();
        $recentPosts = Post::orderBy('id', 'DESC')->where('status', 1)->take(5)->get();
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();

        $archives    = $this->getArchive();

        return view('website.pages.search', compact('serchPosts', 'query', 'categories', 'recentPosts', 'archives','comments'));
    }

    public function printMedia() {
        $daily_newspaper   = $this->Get_Print_Media_Category(5);
        $online_magazine   = $this->Get_Print_Media_Category(4);
        $regional_magazine = $this->Get_Print_Media_Category(3);
        $english_daily     = $this->Get_Print_Media_Category(2);
        $television_media  = $this->Get_Print_Media_Category(1);
        $data              = [
            'daily_newspaper'    => $daily_newspaper,
            'online_magazine'    => $online_magazine,
            'regional_magazine'  => $regional_magazine,
            'english_daily'      => $english_daily,
            'television_media'   => $television_media,

            'daily_newspapers'   => $this->Get_Print_Media_News($daily_newspaper->id),
            'online_magazines'   => $this->Get_Print_Media_News($online_magazine->id),
            'regional_magazines' => $this->Get_Print_Media_News($regional_magazine->id),
            'english_dailys'     => $this->Get_Print_Media_News($english_daily->id),
            'television_medias'  => $this->Get_Print_Media_News($television_media->id),

        ];
        return view('website.print-media', $data);
    }

    public function Archive_Print_Version() {
        $archivePrintVersions = ArchivePrintVersion::orderBy('id', 'DESC')->paginate(20);
        return view('website.archive-print-version.all-print-version', compact('archivePrintVersions'));
    }

    public function getAllAdvertisement() {
        $allAdvertisements = Advertisement::orderBy('id', 'DESC')->paginate(20);
        return view('website.pages.all-advertisement', compact('allAdvertisements'));
    }

    public function Single_archive_Print_Version($id) {
        $archivePrintVersion = ArchivePrintVersion::find($id);
        return view('website.archive-print-version.single-archive-print-version', compact('archivePrintVersion'));
    }
    
    public function privacyPolicy() {
        $g_company_data = AboutUs::first();
        return view('website.privacy-policy', compact('g_company_data'));
    }

    public function termOfService() {
        $g_company_data = AboutUs::first();
        return view('website.term-of-service', compact('g_company_data'));
    }

    public function photoGallery() {
        return view('website.photo-gallery');
    }

    public function videoGallery() {
        return view('website.video-gallery');
    }

    public function contactUs() {
        return view('website.contact-us');
    }

    public function contactUsMessage(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'phone'   => 'numeric|required',
            'email'   => 'email|required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $_SESSION['validation_error'] = 'Please Give All Information';
            return back();
        } else {
            $user_name     = $request->name;
            $user_email    = $request->email;
            $user_message  = $request->message;
            $email_from    = $user_email;
            $email_subject = $request->subject;
            // $messageData = "Name: $user_name\n".
            //             "Email Id: $user_email\n".
            //             "User Message: $user_message.\n";

            $to_email = "baac@baacusa.org";
            $headers  = "From: $email_from \r\n";
            $headers  = "Reply-To: $user_email\r\n";

            // $secretKey = "6Lec0MwZAAAAAKpbCf-xAcXAW9UJXAM9otqz6ItJ";
            // $responsekey = $request['g-recaptcha-response'];
            // $UserIP = $_SERVER['REMOTE_ADDR'];
            // $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responsekey&remoteip=$UserIP";

            // $response = file_get_contents($url);
            // $response = json_decode($response);

            // if($response->success){
            Mail::to($to_email)
                ->queue(new ContactMail($request->all()));
            $_SESSION['success'] = 'Mail Send Successfully';
            return back();
            // }else{
            //  $_SESSION['error'] = 'Invalid Captcha, Please Try Again';
            //  header("Location: contact-us.php");
            // }
        }
    }

    protected function Get_Print_Media_Category($category_id) {
        return PrintNewsCategory::find($category_id);
    }

    protected function Get_Print_Media_News($category_id) {
        return PrintAndNews::where('printnewscategory_id', $category_id)->orderBy('id', 'DESC')->get();
    }

    protected function getArchive() {
        $archives = Post::selectRaw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) monthname, count(*) published')->groupBy('year', 'month', 'monthname')->orderByRaw('min(created_at) desc')->get();

        return $archives;
    }

    public function archivePost() {
        $archivposts = Post::latest()
            ->filter(request(['month', 'year']))
            ->paginate(20);

        $categories  = Category::withCount('posts')->orderBy('id', 'DESC')->where('status', 1)->take(21)->get();
        $recentPosts = Post::orderBy('id', 'DESC')->where('status', 1)->take(5)->get();
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();

        $archives    = $this->getArchive();
        return view('website.pages.archive', compact('archivposts', 'categories', 'recentPosts', 'archives', 'comments'));
    }
}
