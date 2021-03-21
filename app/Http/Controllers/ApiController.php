<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**

     * @return array
     */

    public function instagramComments($id)
    {
        $post_url = 'https://www.instagram.com/p/' . $id . '/?__a=1';
        $content = file_get_contents($post_url);
        $json = json_decode($content);


        $comments = $json->graphql->shortcode_media->edge_media_to_parent_comment->edges;
        $has_next_page = $json->graphql->shortcode_media->edge_media_to_parent_comment->page_info->has_next_page;
        $post_img = $json->graphql->shortcode_media->display_url;
        $comments_count = $json->graphql->shortcode_media->edge_media_to_parent_comment->count;
        $end_cursor = $json->graphql->shortcode_media->edge_media_to_parent_comment->page_info->end_cursor;

        

        return ['comments' => $comments, 'has_next_page' => $has_next_page, 'post_img' => $post_img, 'end_cursor' => $end_cursor, 'comments_count' => $comments_count];
        
    }




    /**
     * @return  array
     */
    public function instagramMoreComments($id, Request $request)
    {
        $end_cursor  = $request->end_cursor;
        if ($end_cursor === null) {
            return response()->json(['msg' => 'missing parameters']);
        }


        $url = "https://www.instagram.com/graphql/query/?query_hash=bc3296d1ce80a24b1b6e40b1e72903f5&variables={%22shortcode%22:%22$id%22,%22first%22:50,%22after%22:%22$end_cursor%22}";
        $content = file_get_contents($url);
        $json = json_decode($content);


        $has_next_page = $json->data->shortcode_media->edge_media_to_parent_comment->page_info->has_next_page;
        $end_cursor = $json->data->shortcode_media->edge_media_to_parent_comment->page_info->end_cursor;
        $comments = $json->data->shortcode_media->edge_media_to_parent_comment->edges;


        return ['comments' => $comments, 'has_next_page' => $has_next_page,  'end_cursor' => $end_cursor];
    }
}
