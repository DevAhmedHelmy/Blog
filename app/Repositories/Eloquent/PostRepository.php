<?php 
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PostRepositoryInterface;

/**
 * summary
 */
use App\Post;

class PostRepository implements PostRepositoryInterface
{
	 public function getAll()
	 {
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

	 }


	 public function get(Post $post)
	 {
	 	return $post;
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