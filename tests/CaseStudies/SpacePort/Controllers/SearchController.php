<?php

namespace IloveCode\Outspoken\Tests\CaseStudies\SpacePort\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use IloveCode\Outspoken\ApiAction;
use IloveCode\Outspoken\ApiController;
use IloveCode\Outspoken\ApiLink;
use IloveCode\Outspoken\Documents\HALDocument;
use IloveCode\Outspoken\Tests\app\Http\Controllers\Controller;

use IloveCode\Outspoken\Tests\CaseStudies\SpacePort\Models\Journey;
use IloveCode\Outspoken\Tests\CaseStudies\SpacePort\Models\Search;

use const DATE_ATOM;

#[ApiController('searches')]
class SearchController extends Controller
{
    #[
        ApiAction(''),
        ApiLink('self')
    ]
    public function create(Request $request): array
    {
        $journeys = [];
        foreach ($request->input('journeys') as $journey) {
            $journeys[] = new Journey(... $journey);
        }
        $search = new Search("1", ['journeys' => $journeys]);

        $document = HALDocument::item($search);

        return [
            ... $document->fields(),
            ... $document->actions( 'create')
        ];
    }

    #[ApiAction('searches/{id}')]
    public function self(Search $search)
    {

    }
}
