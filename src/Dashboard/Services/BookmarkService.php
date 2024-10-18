<?php

namespace Nahad\Foundation\Dashboard\Services;

use Nahad\Foundation\Dashboard\Models\Bookmark;

class BookmarkService {
    public static function currentPageBookmarked() {
        $uri = \Request::getRequestUri();
        $user = \Request::user();

        $bookmark = Bookmark::where([
            'owner_id' => $user->id,
            'url' => $uri
        ])->first();

        return $bookmark;
    } 
}