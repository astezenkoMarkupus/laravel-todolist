<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;

class TodoListController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('home', [
            'listItems' => ListItem::where('is_complete', 0)->get(),
            'listItemsCompleted' => ListItem::where('is_complete', 1)->get()
        ]);
    }

    public function saveItem(Request $request): Application|Redirector|RedirectResponse
    {
//        Log::info(json_encode($request->all()));
        $newListItem = new ListItem;
        $newListItem->name = $request->input;
        $newListItem->save();

        return redirect('/');
    }

    public function markComplete($id): Application|Redirector|RedirectResponse
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function markUncompleted($id): Application|Redirector|RedirectResponse
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 0;
        $listItem->save();

        return redirect('/');
    }
}
