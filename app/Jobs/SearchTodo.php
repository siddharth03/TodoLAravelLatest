<?php
namespace App\Jobs;

use App\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SearchTodo 
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle(Todo $todos, Request $request)
    {
        $todos = $todos->where(function ($q) use ($request) 
        {
            return $q = $q->orWhere('title', 'LIKE', '%'.$request->get('searchbycombo').'%')
            ->orWhere('description', 'LIKE', '%'.$request->get('searchbycombo').'%')
            ->orWhere('reference', 'LIKE', '%'.$request->get('searchbycombo').'%');
        });
        if ($request->has('priority')) {
            $todos = $todos->where('priority', $request->get('priority'));
        }
        $todos = $todos->paginate(10); 
        return $todos;
    }
}