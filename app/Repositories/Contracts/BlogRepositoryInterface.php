<?php

namespace App\Repositories\Contracts;

use App\Models\Blog;

interface BlogRepositoryInterface
{
    /**
     * Get all blogs.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Blog>
     */
    public function all();

    /**
     * Find a blog by ID.
     */
    public function find(int $id): ?Blog;

    /**
     * Create a new blog.
     */
    public function create(array $data): Blog;

    /**
     * Update a blog.
     */
    public function update(Blog $blog, array $data): Blog;

    /**
     * Delete a blog.
     */
    public function delete(Blog $blog): bool;
}
