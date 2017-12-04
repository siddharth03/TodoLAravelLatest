<?php
namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\Request;
use App\Jobs\SearchTodo;
use App\Todo;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;
use Yajra\Datatables\Datatables;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $todo = new Todo();
        $category = Category::pluck('category_name', 'id');
        return view('todo.add', compact('todo', 'category'));
    }
    
    public function show()
    {
        
    }
    
    public function store(CreateTodoRequest $request)
    {
        return DB::transaction(function () use($request)
        {
            if($todo = Todo::create($request->all())) {
                $todo ->categories()->sync($request->get('category'));
            }
            return redirect()
            ->back()
            ->with('message', "Succesfully added in todo.");    
            });
               
            return redirect()
            ->back()
            ->with('error', "Can't be added in Todo.");
    }
       
    public function index(Request $request)
    {
        $todos=Todo::paginate(10)->sortByDesc("priority");
        return view('todo.index', compact('todos', 'request'));
    }
    
    public function data() 
    {
        $todos = Todo::all();
        return Datatables::of($todos)->make(true);
    }
    public function datatable()
    {
        return view('todo.datatable');
    }


    public function search(Request $request)
    {
        $todos = $this->dispatch(new SearchTodo());
        return view('todo.index', compact('todos', 'request'));
    }
    
    public function edit($id)
    {
        $todo = Todo::find($id);
        $category= Category::pluck('category_name', 'id');
        $todoCategoryIds = $todo->categories->pluck('id');
        return view('todo.add', compact('todo', 'category'));
    }
    
    public function update($id, Request $request)
    {
        return DB::transaction(function () use($id, $request)
        {
            if($todo = Todo::find($id)) {
                $todo ->categories()->sync($request->get('category'));
                $todo->update($request->toArray());
                return redirect()
                ->back()
                ->with('message', "Succesfully Updated in Todo.");  
            }
        });
    }
    
    public function destroy($id)
    {
        $todo = Todo::find($id)->delete();
        return redirect()
        ->back()
        ->with('message', "Succesfully deleted in todo.");
    }
    
    public function cancel($id)
    {
        if($todos = Todo::find($id)) {
        DB::table('todos')
            ->where('id', $id)
            ->update(array('status' => 'completed'));
            return redirect()
            ->back();
        }
        else {
            return redirect()
            ->back()
            ->with('message', "Update in status not successfull");
        }
    }
    
    public function normal($id)
    {
        if($todos = Todo::find($id)) {
            DB::table('todos')
            ->where('id', $id)
            ->update(array('status' => 'not completed'));
            return redirect()
            ->back();
        }
        else {
            return redirect()
            ->back()
            ->with('message', "Update in status not successfull");
        }
    }
    
}