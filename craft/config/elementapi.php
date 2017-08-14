<?php
namespace Craft;
return [
    'endpoints' => [
        'api/v1/jobs.json' => function() {
            HeaderHelper::setHeader([
                'Access-Control-Allow-Origin' => '*'
            ]);
            return [
                'elementType' => 'Entry',
                'elementsPerPage' => 300,
                'criteria' => [
                    'section' => 'jobs',
                    'postDate' => '>=' . date('Y-m-d', strtotime("-90 days"))
                ],
                'transformer' => function(EntryModel $entry) {
                    foreach ($entry->jobCategory as $category) {
                        $categoryTitle = $category->title;
                    }
                    return [
                        'title' => $entry->title,
                        'organisation' => $entry->organisation,
                        'categoryTitle' => $categoryTitle,
                        'id' => (int) $entry->id,
                        'slug' => $entry->slug,
                        'type' => $entry->jobType->value,
                        'postDate' => $entry->postDate,
                        'city' => $entry->jobCity
                    ];
                },
            ];
        }
    ]
];