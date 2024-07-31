<?php

namespace Atom\Theme\Http\Controllers\Api;

use Atom\Core\Models\WebsiteHomeCategory;
use Atom\Theme\Http\Resources\WebsiteHomeCategoryResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class HomeCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResponse
    {
        $categories = WebsiteHomeCategory::with(['children' => fn ($query) => $query->has('items')])
            ->whereNull('website_home_category_id')
            ->get();

        return WebsiteHomeCategoryResource::collection($categories)
            ->response()
            ->setStatusCode(JsonResponse::HTTP_OK);
    }
}