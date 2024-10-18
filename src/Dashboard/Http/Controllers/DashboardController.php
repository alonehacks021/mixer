<?php

namespace Nahad\Foundation\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Nahad\Foundation\Dashboard\Http\Requests\BookmarkRequest;
use Nahad\Foundation\Dashboard\Models\Bookmark;
use Nahad\Foundation\Dashboard\Models\Dashboard;
use Illuminate\Http\Request;
use Nahad\Foundation\Dashboard\Support\Alert;

class DashboardController extends Controller {
    public function index(Request $request) {
        $this->authorize('dashboard', Dashboard::class);

        $user = $request->user();
        $bookmarks = Bookmark::where('owner_id', $request->user()->id)
            ->latest('id')
            ->get();
        
        return view('dashboard::index', [
            'bookmarks' => $bookmarks
        ]);
    }
    
    public function handleBookmark(BookmarkRequest $request) {
        $this->authorize('handle', Bookmark::class);

        $owner = $request->user();
        $data = $request->validated();

        if($data['type'] == 'add') {
            $bookmark = Bookmark::updateOrCreate([
                'owner_id' => $owner->id,
                'title' => $data['title'],
            ], [
                'url' => $data['url']
            ]);

            return [
                'id' => $bookmark->id
            ];
        }
        else {
            Bookmark::where([
                'owner_id' => $owner->id,
                'id' => $data['id'],
            ])->delete();
        }
    }

    public function removeBookmark(Request $request, $id) {
        $this->authorize('handle', Bookmark::class);

        $owner = $request->user();
        $bookmark = Bookmark::where([
            'owner_id' => $owner->id,
            'id' => $id
        ])->firstOrFail();

        $bookmark->delete();

        Alert::add('نشانه گزاری با موفقیت حذف شد', Alert::SUCCESS);

        return redirect()->back();
    }
}