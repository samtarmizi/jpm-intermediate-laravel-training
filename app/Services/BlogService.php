<?php

namespace App\Services;

use App\Models\Blog;
use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Support\Collection;

class BlogService
{
    public function __construct(
        protected BlogRepositoryInterface $blogRepository
    ) {}

    /**
     * Get all blogs.
     *
     * @return \Illuminate\Support\Collection<int, Blog>
     */
    public function getAllBlogs(): Collection
    {
        return $this->blogRepository->all();
    }

    /**
     * Get a blog by ID.
     */
    public function getBlogById(int $id): ?Blog
    {
        return $this->blogRepository->find($id);
    }

    /**
     * Create a new blog for the authenticated user.
     */
    public function createBlog(array $data, int $userId): Blog
    {
        $data['user_id'] = $userId;
        return $this->blogRepository->create($data);
    }

    /**
     * Update a blog.
     */
    public function updateBlog(int $id, array $data): ?Blog
    {
        $blog = $this->blogRepository->find($id);
        if (!$blog) {
            return null;
        }
        return $this->blogRepository->update($blog, $data);
    }

    /**
     * Delete a blog.
     */
    public function deleteBlog(int $id): bool
    {
        $blog = $this->blogRepository->find($id);
        if (!$blog) {
            return false;
        }
        return $this->blogRepository->delete($blog);
    }
}
