<?php 
namespace App\Repositories\Eloquent;
use Cache;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\Redis;
/**
 * summary
 */
use App\Post;

class PostRepository implements PostRepositoryInterface
{
	 public function getAll()
	 {

	 	$result = Cache::remember('post_blog_cache', 1, function () {
            $posts = Post::paginate(5);
		     if($month = request('month'))
		     {
		         $posts->whereMonth('created_at',$month);
		     }

		     if($year = request('year'))
		     {
		         $posts->whereYear('created_at',$year);
		     }

		     return $posts;        
		 });


        return $result;

		

	 }

	 // to get data
	 public function get(Post $post)
	 {
	 	return $post;
	 	
	 }


	 // to view count of post views
    public function getViews($id)
    {
        $storage = Redis::connection();
        $views = $storage->get('post:'.$id.':views');
        return $views;
    }



	 public function delete(Post $post)
	 {
	 	return $post;
	 }

	 public function update(Post $post)
	 {
	 	return $post;
	 }
}