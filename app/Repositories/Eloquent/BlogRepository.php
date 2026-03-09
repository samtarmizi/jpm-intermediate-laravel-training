<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Repositories\Contracts\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function __construct(
        protected Blog $model
    ) {}

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * {@inheritdoc}
     */
    public function find(int $id): ?Blog
    {
        return $this->model->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): Blog
    {
        return $this->model->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update(Blog $blog, array $data): Blog
    {
        $blog->update($data);
        return $blog->fresh();
    }

    /**
     * {@inheritdoc}
     */
    public function delete(Blog $blog): bool
    {
        return $blog->delete();
    }
}
