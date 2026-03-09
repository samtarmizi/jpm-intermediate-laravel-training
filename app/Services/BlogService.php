<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Collection;

class BlogService
{
    public function __construct(
        protected Blog $blog
    ) {}

    public function getAll(): Collection
    {
        return $this->blog->orderByDesc('created_at')->get();
    }

    public function find(int $id): Blog
    {
        return $this->blog->findOrFail($id);
    }

    public function create(array $data, int $userId): Blog
    {
        return $this->blog->create([
            'title' => $data['title'],
            'content' => $data['content'] ?? null,
            'user_id' => $userId,
        ]);
    }

    public function update(int $id, array $data): Blog
    {
        $blog = $this->find($id);
        $blog->update([
            'title' => $data['title'],
            'content' => $data['content'] ?? null,
        ]);

        return $blog->fresh();
    }

    public function delete(int $id): bool
    {
        $blog = $this->find($id);

        return $blog->delete();
    }
}
