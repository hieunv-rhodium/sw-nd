<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\WidgetQuery;
use App\Queries\GridQueries\MarketingImageQuery;
use App\Queries\GridQueries\UserQuery;
use App\Queries\GridQueries\CategoryQuery;
use App\Queries\GridQueries\SubcategoryQuery;
use App\Queries\GridQueries\LessonQuery;


class ApiController extends Controller
{

    public function widgetData(Request $request)
    {

        return GridQuery::sendData($request, new WidgetQuery);

    }

    public function marketingImageData(Request $request)
    {

        return GridQuery::sendData($request, new marketingImageQuery);

    }

    public function userData(Request $request)
    {

        return GridQuery::sendData($request, new userQuery);

    }

    public function categoryData(Request $request)
    {

        return GridQuery::sendData($request, new categoryQuery);

    }

    public function subcategoryData(Request $request)
    {

        return GridQuery::sendData($request, new subcategoryQuery);

    }

    public function lessonData(Request $request)
    {

        return GridQuery::sendData($request, new lessonQuery);

    }

}