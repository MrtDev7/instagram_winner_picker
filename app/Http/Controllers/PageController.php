<?php

namespace App\Http\Controllers;


use App\Models\Config;
use App\Models\Faq;
use App\Models\Pack;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {

        $config = Config::first();
        $faq = Faq::latest()->get();
        $pack = Pack::latest()->get();

        return view('home', ['config' => $config, 'faq' => $faq, 'packs' => $pack]);
    }

    public function about()
    {

        $page = Page::find(1);
        $config = Config::first();

        if ($page === null) {
            return 'please create about content';
        }
        return view('page', ['config' => $config, 'page' => $page]);
    }

    public function privacy()
    {

        $page = Page::find(2);
        $config = Config::first();

        if ($page === null) {
            return 'please create privacy content';
        }
        return view('page', ['page' => $page, 'config' => $config]);
    }

    public function instagram()
    {
        $config = Config::first();
        return view('instagram', ['config' => $config]);
    }


    public function instagramComments($id): array
    {


        $post_url = 'https://www.instagram.com/p/' . $id . '/?__a=1';

        // send request
        $content = file_get_contents($post_url);


        $json = json_decode($content);


        $comments = $json->graphql->shortcode_media->edge_media_to_parent_comment->edges;


        $has_next_page = $json->graphql->shortcode_media->edge_media_to_parent_comment->page_info->has_next_page;


        $post_img = $json->graphql->shortcode_media->display_url;

        $comments_count = $json->graphql->shortcode_media->edge_media_to_parent_comment->count;

        $end_cursor = $json->graphql->shortcode_media->edge_media_to_parent_comment->page_info->end_cursor;




        return $this->instagramMoreComments('CMOqfiEBBpd'  , 'QVFCZldUZVNyTjhDMENBUVphMEVSalQyOVo1ZUxWN25NTVdocWE4eVYtb0taWjZEMVI1Q2E0QklCWlJIVktZTWpmcTJfTXZJRnF3QzhKcnFZNUhTR0RtYQ==' , '');

    }




    public function instagramMoreComments($post_id, $after, $max_comments_count):array
    {

        $comments_count_per_request = 50;

        $url = 'https://www.instagram.com/graphql/query/?query_hash=bc3296d1ce80a24b1b6e40b1e72903f5&variables={%22shortcode%22:' . $post_id . ',%22first%22:' . $comments_count_per_request . ',%22after%22:' . $after . '}';


        dd($url);
        $content = file_get_contents($url);

        $json = json_decode($content);


        $has_next_page = $json->data->shortcode_media->edge_media_to_parent_comment->page_info->has_next_page;


        $after = $json->data->shortcode_media->edge_media_to_parent_comment->page_info->end_cursor;


        $comments = $json->data->shortcode_media->edge_media_to_parent_comment->edges;


        do {
            $url = 'https://www.instagram.com/graphql/query/?query_hash=bc3296d1ce80a24b1b6e40b1e72903f5&variables={%22shortcode%22:' . $post_id . ',%22first%22:' . $comments_count_per_request . ',%22after%22:' . $after . '}';

            $content = file_get_contents($url);

            $json = json_decode($content);

            $has_next_page = $json->data->shortcode_media->edge_media_to_parent_comment->page_info->has_next_page;

            array_push($comments, $json->data->shortcode_media->edge_media_to_parent_comment->edges);

        } while ($has_next_page);


        # if (count($comments) >= $max_comments_count) {
        #}


        return $comments;
    }
}
