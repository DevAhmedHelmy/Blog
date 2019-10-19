<?php 

namespace App\Repositories\Contracts;

use App\Post;

interface PostRepositoryInterface
{
	public function getAll();


	public function get(Post $post);


	public function delete(Post $post);


	public function update(Post $post);

	public function getViews($id);


}
